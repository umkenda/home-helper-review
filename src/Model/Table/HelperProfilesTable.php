<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * HelperProfiles Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $CreatedByUsers
 * @property \App\Model\Table\WorkExperiencesTable&\Cake\ORM\Association\HasMany $WorkExperiences
 * @property \App\Model\Table\EducationsTable&\Cake\ORM\Association\BelongsToMany $Educations
 * @property \App\Model\Table\ServicesTable&\Cake\ORM\Association\BelongsToMany $Services
 * @property \App\Model\Table\SkillsTable&\Cake\ORM\Association\BelongsToMany $Skills
 *
 * @method \App\Model\Entity\HelperProfile newEmptyEntity()
 * @method \App\Model\Entity\HelperProfile newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\HelperProfile> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\HelperProfile get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\HelperProfile findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\HelperProfile patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 //* @method array<\App\Model\Entity\HelperProfile> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\HelperProfile|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\HelperProfile saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\HelperProfile>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\HelperProfile>|false saveMany(iterable $entities, array $options = [])
 //* @method iterable<\App\Model\Entity\HelperProfile>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\HelperProfile> saveManyOrFail(iterable $entities, array $options = [])
 //* @method iterable<\App\Model\Entity\HelperProfile>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\HelperProfile>|false deleteMany(iterable $entities, array $options = [])
// * @method iterable<\App\Model\Entity\HelperProfile>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\HelperProfile> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class HelperProfilesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('helper_profiles');
        $this->setDisplayField('full_name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('CreatedByUsers', [
            'foreignKey' => 'created_by_user_id',
            'className' => 'Users',
        ]);
        $this->hasMany('WorkExperiences', [
            'foreignKey' => 'helper_profile_id',
        ]);
        $this->belongsToMany('Educations', [
            'foreignKey' => 'helper_profile_id',
            'targetForeignKey' => 'education_id',
            'joinTable' => 'helper_profiles_educations',
        ]);
        $this->belongsToMany('Services', [
            'foreignKey' => 'helper_profile_id',
            'targetForeignKey' => 'service_id',
            'joinTable' => 'helper_profiles_services',
        ]);
        $this->belongsToMany('Skills', [
            'foreignKey' => 'helper_profile_id',
            'targetForeignKey' => 'skill_id',
            'joinTable' => 'helper_profiles_skills',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('user_id')
            ->notEmptyString('user_id')
            ->add('user_id', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->integer('created_by_user_id')
            ->allowEmptyString('created_by_user_id');

        $validator
            ->scalar('full_name')
            ->maxLength('full_name', 255)
            ->requirePresence('full_name', 'create')
            ->notEmptyString('full_name');

        $validator
            ->scalar('contact_email_public')
            ->maxLength('contact_email_public', 255)
            ->allowEmptyString('contact_email_public');

        $validator
            ->scalar('contact_phone_public')
            ->maxLength('contact_phone_public', 20)
            ->allowEmptyString('contact_phone_public');

        $validator
            ->scalar('profile_picture_public')
            ->maxLength('profile_picture_public', 255)
            ->allowEmptyString('profile_picture_public');

        $validator
            ->scalar('professional_summary')
            ->allowEmptyString('professional_summary');

        $validator
            ->scalar('availability')
            ->allowEmptyString('availability');

        $validator
            ->scalar('preferred_locations')
            ->allowEmptyString('preferred_locations');

        $validator
            ->scalar('rate_pricing')
            ->maxLength('rate_pricing', 50)
            ->allowEmptyString('rate_pricing');

        $validator
            ->boolean('is_searchable')
            ->notEmptyString('is_searchable');

        $validator
            ->scalar('resume_path')
            ->maxLength('resume_path', 255)
            ->allowEmptyString('resume_path');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['user_id']), ['errorField' => 'user_id']);
        $rules->add($rules->existsIn(['user_id'], 'Users'), ['errorField' => 'user_id']);
        $rules->add($rules->existsIn(['created_by_user_id'], 'CreatedByUsers'), ['errorField' => 'created_by_user_id']);

        return $rules;
    }
}
