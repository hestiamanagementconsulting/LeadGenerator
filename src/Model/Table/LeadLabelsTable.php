<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * LeadLabels Model
 *
 * @method \App\Model\Entity\LeadLabel get($primaryKey, $options = [])
 * @method \App\Model\Entity\LeadLabel newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\LeadLabel[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\LeadLabel|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\LeadLabel patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\LeadLabel[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\LeadLabel findOrCreate($search, callable $callback = null, $options = [])
 */
class LeadLabelsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('lead_labels');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('id_label', 'create')
            ->notEmpty('id_label');

        $validator
            ->requirePresence('Id_lead', 'create')
            ->notEmpty('Id_lead');

        return $validator;
    }
}
