<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * WorkExperiences Model
 *
 * @property \App\Model\Table\HelperProfilesTable&\Cake\ORM\Association\BelongsTo $HelperProfiles
 *
 * @method \App\Model\Entity\WorkExperience newEmptyEntity()
 * @method \App\Model\Entity\WorkExperience newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\WorkExperience> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\WorkExperience get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\WorkExperience findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\WorkExperience patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
  * @method \App\Model\Entity\WorkExperience|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\WorkExperience saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\WorkExperience>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\WorkExperience>|false saveMany(iterable $entities, array $options = [])
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class WorkExperiencesTable extends Table
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

        $this->setTable('work_experiences');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('HelperProfiles', [
            'foreignKey' => 'helper_profile_id',
            'joinType' => 'INNER',
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
            ->integer('helper_profile_id')
            ->notEmptyString('helper_profile_id');

        $validator
            ->scalar('company_name')
            ->maxLength('company_name', 255)
            ->allowEmptyString('company_name');

        $validator
            ->scalar('role')
            ->maxLength('role', 255)
            ->allowEmptyString('role');

        $validator
            ->date('start_date')
            ->allowEmptyDate('start_date');

        $validator
            ->date('end_date')
            ->allowEmptyDate('end_date');

        $validator
            ->scalar('responsibilities')
            ->allowEmptyString('responsibilities');

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
        $rules->add($rules->existsIn(['helper_profile_id'], 'HelperProfiles'), ['errorField' => 'helper_profile_id']);

        return $rules;
    }

    public function findWithProfiles(\Cake\ORM\Query $query, array $options)
    {
        return $query->contain(['HelperProfiles']);
    }
}
