<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LeadLabelsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LeadLabelsTable Test Case
 */
class LeadLabelsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\LeadLabelsTable
     */
    public $LeadLabels;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.lead_labels'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('LeadLabels') ? [] : ['className' => 'App\Model\Table\LeadLabelsTable'];
        $this->LeadLabels = TableRegistry::get('LeadLabels', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->LeadLabels);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
