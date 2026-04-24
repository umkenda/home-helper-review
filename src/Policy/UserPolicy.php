<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\User;
use Authorization\IdentityInterface;

class UserPolicy
{
    /**
     * Agents can only view users they created.
     * Admins can view anyone.
     */
    public function canView(IdentityInterface $identity, User $user)
    {

        if ($identity->role->name === 'Administrator') {
            return true;
        }

        if ($identity->role->name === 'Agent') {
            return $user->created_by === $identity->id;
        }

        return false;
    }

    /**
     * Agents can only edit users they created.
     * Admins can edit anyone.
     */
    public function canEdit(IdentityInterface $identity, User $user)
    {
        if ($identity->role->name === 'Administrator') {
            return true;
        }

        if ($identity->role->name === 'Agent') {
            return $user->created_by === $identity->id;
        }

        return false;
    }

    /**
     * Agents can only delete users they created.
     * Admins can delete anyone.
     */
    public function canDelete(IdentityInterface $identity, User $user)
    {
        if ($identity->role->name === 'Administrator') {
            return true;
        }

        if ($identity->role->name === 'Agent') {
            return $user->created_by === $identity->id;
        }

        return false;
    }
}
