<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * LeadLabelsFixture
 *
 */
class LeadLabelsFixture extends TestFixture
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
        'Id_lead' => ['type' => 'biginteger', 'length' => 20, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'FK_ID_LABEL_LEAD' => ['type' => 'index', 'columns' => ['id_label'], 'length' => []],
            'FK_ID_LEAD_LEAD' => ['type' => 'index', 'columns' => ['Id_lead'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'FK_ID_LABEL_LEAD' => ['type' => 'foreign', 'columns' => ['id_label'], 'references' => ['labels', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'FK_ID_LEAD_LEAD' => ['type' => 'foreign', 'columns' => ['Id_lead'], 'references' => ['leads', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'Id_lead' => 1
        ],
    ];
}
