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
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Authorization\Exception\ForbiddenException;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/5/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('FormProtection');`
     *
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('Flash');
        /*
         * Enable the following component for recommended CakePHP form protection settings.
         * see https://book.cakephp.org/5/en/controllers/components/form-protection.html
         */
        //$this->loadComponent('FormProtection');

        // Load the Authentication component
        $this->loadComponent('Authentication.Authentication'); // <-- This line should be here

        // Load the Authorization component
        $this->loadComponent('Authorization.Authorization');

        // Set which actions are publicly accessible without authentication.
        // You'll need a login action in your UsersController or similar.
        //$this->Authentication->allowUnauthenticated(['login', 'register']); // Adjust as needed
    }

    /**
     * beforeFilter callback.
     *
     * @param \Cake\Event\EventInterface $event The beforeFilter event.
     * @return void
     */
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);

    }

    /**
     * Authorization callback for controllers
     * This method is required by the Authorization plugin for controllers
     *
     * @param \Authorization\IdentityInterface|null $user The user requesting access.
     * @param \Cake\Http\ServerRequest $request The current request.
     * @return bool
     */
    public function isAuthorized(AuthorizationIdentityInterface $user = null, \Cake\Http\ServerRequest $request): bool
    {
        // By default, deny access. Policies will grant it.
        // You can put general rules here (e.g., if a user is 'inactive' deny all)
        return false;
    }
}
