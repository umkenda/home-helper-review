<?php
declare(strict_types=1);

namespace App\Policy;

use Authorization\IdentityInterface;
use Cake\ORM\Query;
use App\Model\Table\UsersTable;

class UsersTablePolicy
{
    /**
     * Who can access index (list users)?
     */
    public function canIndex(IdentityInterface $identity, UsersTable $users)
    {
        // Admin → can list all users
        if ($identity->role->name === 'Administrator') {
            return true;
        }

        // Agent → can list only own created users
        if ($identity->role->name === 'Agent') {
            return true; // filtering is handled in controller/query
        }

        // Helpers or others → cannot list
        return false;
    }

    /**
     * Who can add a new user?
     */
    public function canAdd(IdentityInterface $identity, UsersTable $users)
    {
        return in_array($identity->role->name, ['Administrator', 'Agent']);
    }
}
