<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     3.3.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App;

use Cake\Core\Configure;
use Cake\Core\ContainerInterface;
use Cake\Datasource\FactoryLocator;
use Cake\Error\Middleware\ErrorHandlerMiddleware;
use Cake\Http\BaseApplication;
use Cake\Http\Middleware\BodyParserMiddleware;
use Cake\Http\Middleware\CsrfProtectionMiddleware;
use Cake\Http\MiddlewareQueue;
use Cake\ORM\Locator\TableLocator;
use Cake\Routing\Middleware\AssetMiddleware;
use Cake\Routing\Middleware\RoutingMiddleware;

use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Psr\Http\Message\ServerRequestInterface;

use Authentication\Middleware\AuthenticationMiddleware;

use Authentication\AuthenticationService;
use Authentication\AuthenticationServiceInterface;
use Authentication\Identifier\IdentifierInterface;
use Authentication\AuthenticationServiceProviderInterface;
use Authentication\Identifier\AbstractIdentifier;

//authorization imports
use Authorization\AuthorizationService;
use Authorization\AuthorizationServiceInterface;
use Authorization\AuthorizationServiceProviderInterface;
use Authorization\Middleware\AuthorizationMiddleware;
use Authorization\Policy\OrmResolver;
use Psr\Http\Message\ResponseInterface;


/**
 * Application setup class.
 *
 * This defines the bootstrapping logic and middleware layers you
 * want to use in your application.
 *
 * @extends \Cake\Http\BaseApplication<\App\Application>
 */
class Application extends BaseApplication implements AuthenticationServiceProviderInterface, AuthorizationServiceProviderInterface
{
    /**
     * Load all the application configuration and bootstrap logic.
     *
     * @return void
     */
    public function bootstrap(): void
    {
        // Call parent to load bootstrap from files.
        parent::bootstrap();

        if (PHP_SAPI !== 'cli') {
            FactoryLocator::add(
                'Table',
                (new TableLocator())->allowFallbackClass(false)
            );
        }

        $this->addPlugin('Authentication');
        $this->addPlugin('Authorization');
    }


    /**
     * Setup the middleware queue your application will use.
     *
     * @param \Cake\Http\MiddlewareQueue $middlewareQueue The middleware queue to setup.
     * @return \Cake\Http\MiddlewareQueue The updated middleware queue.
     */
    public function middleware(MiddlewareQueue $middlewareQueue): MiddlewareQueue
    {
        $middlewareQueue
            // Catch any exceptions in the lower layers,
            // and make an error page/response
            ->add(new ErrorHandlerMiddleware(Configure::read('Error'), $this))

            // Handle plugin/theme assets like CakePHP normally does.
            ->add(new AssetMiddleware([
                'cacheTime' => Configure::read('Asset.cacheTime'),
            ]))


            // Add routing middleware.
            // If you have a large number of routes connected, turning on routes
            // caching in production could improve performance.
            // See https://github.com/CakeDC/cakephp-cached-routing


            // Parse various types of encoded request bodies so that they are
            // available as array through $request->getData()
            // https://book.cakephp.org/5/en/controllers/middleware.html#body-parser-middleware
            ->add(new BodyParserMiddleware())

            ->add(new AuthenticationMiddleware($this))
            ->add(new RoutingMiddleware($this))
            ->add(new AuthorizationMiddleware($this,
                [
                    'unauthorizedHandler' => [
                        'className' => 'Authorization.Redirect',
                        'url' => Router::url('/users/unauthorized'), //'/users/unauthorized', // redirect here on failure
                        'queryParam' => 'redirectUrl',   // optional, original URL will be appended
                    ],
                ]
            ));

            // Cross Site Request Forgery (CSRF) Protection Middleware
            // https://book.cakephp.org/5/en/security/csrf.html#cross-site-request-forgery-csrf-middleware
//            ->add(new CsrfProtectionMiddleware([
//                'httponly' => true,
//            ]));
//            ->add(new AssetMiddleware([
//                'cacheTime' => 0,
//                'pathMap' => [
//                    '/adminlte' => ROOT . DS . 'webroot' . DS . 'adminlte',
//                ],
//            ]));


        return $middlewareQueue;
    }

    /**
     * Register application container services.
     *
     * @param \Cake\Core\ContainerInterface $container The Container to update.
     * @return void
     * @link https://book.cakephp.org/5/en/development/dependency-injection.html#dependency-injection
     */
//    public function services(ContainerInterface $container): void
//    {
//        dd("service");
//    }


    /**
     * Defines the routes for your application.
     *
     * @param \Cake\Routing\RouteBuilder $routes The route builder to define routes.
     * @return void
     */
    public function routes(RouteBuilder $routes): void
    {
        /*
         * The default class to use for all routes
         *
         * The following route classes are supplied with CakePHP and are appropriate
         * to set as the default:
         *
         * - Route
         * - InflectedRoute
         * - DashedRoute
         *
         * If no call is made to `Router::defaultRouteClass()`, the class used is
         * `Route` (`Cake\Routing\Route\Route`)
         *
         * Note that `Route` does not do any inflections on URLs which will result in
         * inconsistently cased URLs when used with `{plugin}`, `{controller}` and
         * `{action}` markers.
         */
        $routes->setRouteClass(\Cake\Routing\Route\DashedRoute::class);

        $routes->scope('/', function (RouteBuilder $builder) {
            /*
             * Here, we are connecting '/' (base path) to a controller called 'Pages',
             * its action called 'display', and we pass a param to select the view file
             * to use (in this case, templates/Pages/home.php)
             */
            $builder->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);

            /*
             * ...and connect the rest of 'Pages' controller's URLs.
             */
            $builder->connect('/pages/*', 'Pages::display');

            // ----------------------------------------------------------------------
            // THIS IS THE ROUTE YOU NEED TO ADD/CONFIRM FOR ADMIN DASHBOARD
            // ----------------------------------------------------------------------
            $builder->connect(
                '/admin-dashboard', // The URL path you want to match
                ['controller' => 'Pages', 'action' => 'display', 'admin_dashboard'] // Controller, Action, and the view template name
            );
            // ----------------------------------------------------------------------

            $builder->connect('/login', ['controller' => 'Users', 'action' => 'login']);
            $builder->connect('/logout', ['controller' => 'Users', 'action' => 'logout']);

            /*
             * Connect catchall routes for all controllers.
             *
             * The `fallbacks` method is a shortcut for
             *
             * ```
             * $builder->connect('/{controller}', ['action' => 'index']);
             * $builder->connect('/{controller}/{action}/*', []);
             * ```
             *
             * It is NOT recommended to use fallback routes after your initial prototyping phase!
             * See https://book.cakephp.org/5/en/development/routing.html#fallbacks-method for more information
             */
            $builder->fallbacks();
        });

        /*
         * If you need a different set of middleware or none at all,
         * open new scope and define routes there.
         *
         * `setExtensions()` will also work with `scope()`
         */
    }



    /**
     * Returns a service provider instance.
     *
     * @param \Psr\Http\Message\ServerRequestInterface $request Request
     * @return \Authentication\AuthenticationServiceInterface
     */
    public function getAuthenticationService(ServerRequestInterface $request): AuthenticationServiceInterface
    {
        $service = new AuthenticationService();

        // Define where users should be redirected to when they are not authenticated
        $service->setConfig([
            'unauthenticatedRedirect' => Router::url('/users/login'),
            'queryParam' => 'redirect',
        ]);

        // Define identifiers
        $fields = [
            AbstractIdentifier::CREDENTIAL_USERNAME => 'email',
            AbstractIdentifier::CREDENTIAL_PASSWORD => 'password'
        ];
        $passwordIdentifier = [
            'Authentication.Password' => [
                'fields' => $fields,
            ],
        ];

        $service->loadIdentifier('Authentication.Password', [
            'fields' => [
                'username' => 'email',   // change to 'username' if needed
                'password' => 'password',
            ],
            'resolver' => [
                'className' => 'Authentication.Orm',
                'userModel' => 'Users',
                'finder' => 'withRole',   // 🔥 Use our finder
                'options' => [
                    'returnEntity' => true, // ✅ force entities instead of arrays
                ]
            ],
        ]);

        // Load the authenticators. Session should be first.
        $service->loadAuthenticator('Authentication.Session', [
            'identifier' => $passwordIdentifier,
        ]);

        $service->loadAuthenticator('Authentication.Form', [
            'fields' => [
                'username' => 'email',
                'password' => 'password',
            ],
            'loginUrl' => Router::url('/users/login'),
        ]);

        return $service;
    }

    public function getAuthorizationService(ServerRequestInterface $request): AuthorizationServiceInterface
    {
        $resolver = new OrmResolver();

        return new AuthorizationService($resolver);
    }

}
