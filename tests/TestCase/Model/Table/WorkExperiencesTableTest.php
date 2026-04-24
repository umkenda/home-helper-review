<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\WorkExperiencesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\WorkExperiencesTable Test Case
 */
class WorkExperiencesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\WorkExperiencesTable
     */
    protected $WorkExperiences;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.WorkExperiences',
        'app.HelperProfiles',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('WorkExperiences') ? [] : ['className' => WorkExperiencesTable::class];
        $this->WorkExperiences = $this->getTableLocator()->get('WorkExperiences', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->WorkExperiences);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\WorkExperiencesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\WorkExperiencesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
