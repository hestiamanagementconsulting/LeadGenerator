<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CampaignLeadsFixture
 *
 */
class CampaignLeadsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'biginteger', 'length' => 20, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'id_campaign' => ['type' => 'biginteger', 'length' => 20, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_lead' => ['type' => 'biginteger', 'length' => 20, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'FK_ID_CAMPAIGN_CAMPAIGN_LEAD' => ['type' => 'index', 'columns' => ['id_campaign'], 'length' => []],
            'FK_ID_LEAD_CAMPAIGN_LEAD' => ['type' => 'index', 'columns' => ['id_lead'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'FK_ID_CAMPAIGN_CAMPAIGN_LEAD' => ['type' => 'foreign', 'columns' => ['id_campaign'], 'references' => ['campaigns', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'FK_ID_LEAD_CAMPAIGN_LEAD' => ['type' => 'foreign', 'columns' => ['id_lead'], 'references' => ['leads', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_spanish_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'id_campaign' => 1,
            'id_lead' => 1
        ],
    ];
}
