<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Educations Model
 *
 * @property \App\Model\Table\HelperProfilesTable&\Cake\ORM\Association\BelongsToMany $HelperProfiles
 *
 * @method \App\Model\Entity\Education newEmptyEntity()
 * @method \App\Model\Entity\Education newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Education> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Education get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Education findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Education patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Education|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Education saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Education>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Education>|false saveMany(iterable $entities, array $options = [])
 */
class EducationsTable extends Table
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

        $this->setTable('educations');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsToMany('HelperProfiles', [
            'foreignKey' => 'education_id',
            'targetForeignKey' => 'helper_profile_id',
            'joinTable' => 'helper_profiles_educations',
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
            ->scalar('name')
            ->maxLength('name', 100)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        return $validator;
    }
}
