<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CampaignLeads Model
 *
 * @method \App\Model\Entity\CampaignLead get($primaryKey, $options = [])
 * @method \App\Model\Entity\CampaignLead newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CampaignLead[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CampaignLead|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CampaignLead patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CampaignLead[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CampaignLead findOrCreate($search, callable $callback = null, $options = [])
 */
class CampaignLeadsTable extends Table
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

        $this->setTable('campaign_leads');
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
            ->requirePresence('id_campaign', 'create')
            ->notEmpty('id_campaign');

        $validator
            ->requirePresence('id_lead', 'create')
            ->notEmpty('id_lead');

        return $validator;
    }
}
