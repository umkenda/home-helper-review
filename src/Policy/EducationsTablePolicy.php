<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Table\EducationsTable;
use Authorization\IdentityInterface;

/**
 * EducationsTable policy
 */
class EducationsTablePolicy
{
    /**
     * Check if $identity can add Educations
     */
    public function canAdd(IdentityInterface $identity, EducationsTable $educations): bool
    {
        // Only admins can add
        return $identity->role->name === 'Administrator';
    }

    /**
     * Who can access index (list Educations)?
     */
    public function canIndex(IdentityInterface $identity, EducationsTable $educations): bool
    {
        // Only admins can list
        return $identity->role->name === 'Administrator';
    }


}
