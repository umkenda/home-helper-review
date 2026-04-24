<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HelperProfilesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HelperProfilesTable Test Case
 */
class HelperProfilesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\HelperProfilesTable
     */
    protected $HelperProfiles;

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
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('HelperProfiles') ? [] : ['className' => HelperProfilesTable::class];
        $this->HelperProfiles = $this->getTableLocator()->get('HelperProfiles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->HelperProfiles);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\HelperProfilesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\HelperProfilesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
