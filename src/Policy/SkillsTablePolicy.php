<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Table\SkillsTable;
use Authorization\IdentityInterface;

/**
 * SkillsTable policy
 */
class SkillsTablePolicy
{

    /**
     * Check if $identity can add Skills
     */
    public function canAdd(IdentityInterface $identity, SkillsTable $skills): bool
    {
        // Only admins can add
        return $identity->role->name === 'Administrator';
    }

    /**
     * Who can access index (list Skills)?
     */
    public function canIndex(IdentityInterface $identity, SkillsTable $skills): bool
    {
        // Only admins can list
        return $identity->role->name === 'Administrator';
    }


}
