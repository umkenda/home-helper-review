<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * HelperProfile Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int|null $created_by_user_id
 * @property string $full_name
 * @property string|null $contact_email_public
 * @property string|null $contact_phone_public
 * @property string|null $profile_picture_public
 * @property string|null $professional_summary
 * @property string|null $availability
 * @property string|null $preferred_locations
 * @property string|null $rate_pricing
 * @property bool $is_searchable
 * @property string|null $resume_path
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\User $created_by_user
 * @property \App\Model\Entity\WorkExperience[] $work_experiences
 * @property \App\Model\Entity\Education[] $educations
 * @property \App\Model\Entity\Service[] $services
 * @property \App\Model\Entity\Skill[] $skills
 */
class HelperProfile extends Entity
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
        'user_id' => true,
        'created_by_user_id' => true,
        'full_name' => true,
        'contact_email_public' => true,
        'contact_phone_public' => true,
        'profile_picture_public' => true,
        'professional_summary' => true,
        'availability' => true,
        'preferred_locations' => true,
        'rate_pricing' => true,
        'is_searchable' => true,
        'resume_path' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'created_by_user' => true,
        'work_experiences' => true,
        'educations' => true,
        'services' => true,
        'skills' => true,
    ];
}
