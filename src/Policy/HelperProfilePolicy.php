<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\HelperProfile;
use Authorization\IdentityInterface;

/**
 * HelperProfile policy
 */
class HelperProfilePolicy
{

    /**
     * Check if $user can edit HelperProfile
     *
     * @param \Authorization\IdentityInterface $identity The user.
     * @param \App\Model\Entity\HelperProfile $helperProfile
     * @return bool
     */
    public function canEdit(IdentityInterface $identity, HelperProfile $helperProfile)
    {
        if ($identity->role->name === 'Administrator') {
            return true;
        }

        if ($identity->role->name === 'Agent') {
            return $identity->created_by === $identity->id;
        }

        return false;
    }

    /**
     * Check if $user can delete HelperProfile
     *
     * @param \Authorization\IdentityInterface $identity The user.
     * @param \App\Model\Entity\HelperProfile $helperProfile
     * @return bool
     */
    public function canDelete(IdentityInterface $identity, HelperProfile $helperProfile)
    {
        if ($identity->role->name === 'Administrator') {
            return true;
        }

        if ($identity->role->name === 'Agent') {
            return $identity->created_by === $identity->id;
        }

        return false;
    }

    /**
     * Check if $user can view HelperProfile
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\HelperProfile $helperProfile
     * @return bool
     */
    public function canView(IdentityInterface $identity, HelperProfile $helperProfile)
    {
        if ($identity->role->name === 'Administrator') {
            return true;
        }

        if ($identity->role->name === 'Agent') {
            return $identity->created_by === $identity->id;
        }

        return false;
    }
}
