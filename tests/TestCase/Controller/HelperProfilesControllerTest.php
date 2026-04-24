<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use App\Controller\HelperProfilesController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\HelperProfilesController Test Case
 *
 * @uses \App\Controller\HelperProfilesController
 */
class HelperProfilesControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.HelperProfiles',
        'app.Users',
        'app.CreatedByUsers',
        'app.WorkExperiences',
        'app.Educations',
        'app.Services',
        'app.Skills',
        'app.HelperProfilesEducations',
        'app.HelperProfilesServices',
        'app.HelperProfilesSkills',
    ];

    /**
     * Test index method
     *
     * @return void
     * @uses \App\Controller\HelperProfilesController::index()
     */
    public function testIndex(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     * @uses \App\Controller\HelperProfilesController::view()
     */
    public function testView(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     * @uses \App\Controller\HelperProfilesController::add()
     */
    public function testAdd(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     * @uses \App\Controller\HelperProfilesController::edit()
     */
    public function testEdit(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     * @uses \App\Controller\HelperProfilesController::delete()
     */
    public function testDelete(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
