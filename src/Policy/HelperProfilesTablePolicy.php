<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Table\HelperProfilesTable;
use Authorization\IdentityInterface;

/**
 * HelperProfilesTable policy
 */
class HelperProfilesTablePolicy
{
    /**
     * Check if $user can add HelperProfilesTable
     *
     * @param \Authorization\IdentityInterface $identity The user.
     * @param \App\Model\Entity\HelperProfilesTable $helperProfilesTable
     * @return bool
     */
    public function canAdd(IdentityInterface $identity, HelperProfilesTable $helperProfilesTable) : bool
    {
        return in_array($identity->role->name, ['Administrator', 'Agent']);
    }

    public function canIndex(IdentityInterface $identity, HelperProfilesTable $helperProfilesTable) : bool
    {
        if ($identity->role->name === 'Administrator') {
            return true;
        }

        if ($identity->role->name === 'Agent')
        {
            return $identity->created_by === $identity->id;
        }

        return false;
    }

}
