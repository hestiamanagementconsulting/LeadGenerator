<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CampaignLeadsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CampaignLeadsTable Test Case
 */
class CampaignLeadsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CampaignLeadsTable
     */
    public $CampaignLeads;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.campaign_leads'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CampaignLeads') ? [] : ['className' => 'App\Model\Table\CampaignLeadsTable'];
        $this->CampaignLeads = TableRegistry::get('CampaignLeads', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CampaignLeads);

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
