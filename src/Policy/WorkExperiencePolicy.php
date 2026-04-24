<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\WorkExperience;
use Authorization\IdentityInterface;

/**
 * WorkExperience policy
 */
class WorkExperiencePolicy
{

    /**
     * Check if $user can edit WorkExperience
     *
     * @param \Authorization\IdentityInterface $identity The user.
     * @param \App\Model\Entity\WorkExperience $workExperience
     * @return bool
     */
    public function canEdit(IdentityInterface $identity, WorkExperience $workExperience)
    {
        return $identity->role->name === 'Administrator';
    }

    /**
     * Check if $user can delete WorkExperience
     *
     * @param \Authorization\IdentityInterface $identity The user.
     * @param \App\Model\Entity\WorkExperience $workExperience
     * @return bool
     */
    public function canDelete(IdentityInterface $identity, WorkExperience $workExperience)
    {
        return $identity->role->name === 'Administrator';
    }

    /**
     * Check if $user can view WorkExperience
     *
     * @param \Authorization\IdentityInterface $identity The user.
     * @param \App\Model\Entity\WorkExperience $workExperience
     * @return bool
     */
    public function canView(IdentityInterface $identity, WorkExperience $workExperience)
    {
        return $identity->role->name === 'Administrator';
    }
}
