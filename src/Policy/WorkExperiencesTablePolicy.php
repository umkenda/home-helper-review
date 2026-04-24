<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Table\WorkExperiencesTable;
use Authorization\IdentityInterface;

/**
 * WorkExperiencesTable policy
 */
class WorkExperiencesTablePolicy
{
    /**
     * Check if $user can add WorkExperiencesTable
     *
     * @param \Authorization\IdentityInterface $identity The user.
     * @param \App\Model\Entity\WorkExperiencesTable $workExperiencesTable
     * @return bool
     */
    public function canAdd(IdentityInterface $identity):bool
    {
        return $identity->role->name === 'Administrator';
    }

    public function canIndex(IdentityInterface $identity):bool
    {
        return $identity->role->name === 'Administrator';
    }
}
