<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Education;
use Authorization\IdentityInterface;

/**
 * Education policy
 */
class EducationPolicy
{

    /**
     * Check if $user can edit Education
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Education $education
     * @return bool
     */
    public function canEdit(IdentityInterface $identity, Education $education)
    {
        if ($identity->role->name === 'Administrator') {
            return true;
        }
        return false;
    }

    /**
     * Check if $user can delete Education
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Education $education
     * @return bool
     */
    public function canDelete(IdentityInterface $identity, Education $education)
    {
        if ($identity->role->name === 'Administrator') {
            return true;
        }
        return false;
    }

    /**
     * Check if $user can view Education
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Education $education
     * @return bool
     */
    public function canView(IdentityInterface $identity, Education $education)
    {
        if ($identity->role->name === 'Administrator') {
            return true;
        }
        return false;
    }
}
