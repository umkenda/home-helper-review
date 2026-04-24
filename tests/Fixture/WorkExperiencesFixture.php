<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * WorkExperiencesFixture
 */
class WorkExperiencesFixture extends TestFixture
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
                'helper_profile_id' => 1,
                'company_name' => 'Lorem ipsum dolor sit amet',
                'role' => 'Lorem ipsum dolor sit amet',
                'start_date' => '2025-10-03',
                'end_date' => '2025-10-03',
                'responsibilities' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'created' => '2025-10-03 09:26:44',
                'modified' => '2025-10-03 09:26:44',
            ],
        ];
        parent::init();
    }
}
