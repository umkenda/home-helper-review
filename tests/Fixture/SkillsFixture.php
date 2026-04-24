<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SkillsFixture
 */
class SkillsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'name' => 'Lorem ipsum dolor sit amet',
                'created' => '2025-10-02 15:48:13',
                'modified' => '2025-10-02 15:48:13',
            ],
        ];
        parent::init();
    }
}
