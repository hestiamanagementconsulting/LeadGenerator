<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CampaignLabelsFixture
 *
 */
class CampaignLabelsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'biginteger', 'length' => 20, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'id_label' => ['type' => 'biginteger', 'length' => 20, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_campaign' => ['type' => 'biginteger', 'length' => 20, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'FK_ID_LABEL_LABELS_CAMPAIGN' => ['type' => 'index', 'columns' => ['id_label'], 'length' => []],
            'FK_ID_CAMPAIGN_LABELS_CAMPAIGN' => ['type' => 'index', 'columns' => ['id_campaign'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'FK_ID_CAMPAIGN_LABELS_CAMPAIGN' => ['type' => 'foreign', 'columns' => ['id_campaign'], 'references' => ['campaigns', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'FK_ID_LABEL_LABELS_CAMPAIGN' => ['type' => 'foreign', 'columns' => ['id_label'], 'references' => ['labels', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'id_label' => 1,
            'id_campaign' => 1
        ],
    ];
}
