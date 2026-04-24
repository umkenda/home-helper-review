<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Skill;
use Authorization\IdentityInterface;

/**
 * Skill policy
 */
class SkillPolicy
{

    public function canEdit(IdentityInterface $identity, Skill $skill)
    {
        return $identity->role->name === 'Administrator';
    }


    public function canDelete(IdentityInterface $identity, Skill $skill)
    {
        return $identity->role->name === 'Administrator';
    }


    public function canView(IdentityInterface $identity, Skill $skill)
    {
        return $identity->role->name === 'Administrator';
    }

}
