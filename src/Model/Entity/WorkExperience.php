<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * WorkExperience Entity
 *
 * @property int $id
 * @property int $helper_profile_id
 * @property string|null $company_name
 * @property string|null $role
 * @property \Cake\I18n\Date|null $start_date
 * @property \Cake\I18n\Date|null $end_date
 * @property string|null $responsibilities
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 *
 * @property \App\Model\Entity\HelperProfile $helper_profile
 */
class WorkExperience extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'helper_profile_id' => true,
        'company_name' => true,
        'role' => true,
        'start_date' => true,
        'end_date' => true,
        'responsibilities' => true,
        'created' => true,
        'modified' => true,
        'helper_profile' => true,
    ];
}
