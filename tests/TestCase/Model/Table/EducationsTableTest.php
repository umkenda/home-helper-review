<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EducationsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EducationsTable Test Case
 */
class EducationsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EducationsTable
     */
    protected $Educations;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Educations',
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
        $config = $this->getTableLocator()->exists('Educations') ? [] : ['className' => EducationsTable::class];
        $this->Educations = $this->getTableLocator()->get('Educations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Educations);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\EducationsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
