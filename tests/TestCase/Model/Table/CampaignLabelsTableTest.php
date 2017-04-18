<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CampaignLabelsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CampaignLabelsTable Test Case
 */
class CampaignLabelsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CampaignLabelsTable
     */
    public $CampaignLabels;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.campaign_labels'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CampaignLabels') ? [] : ['className' => 'App\Model\Table\CampaignLabelsTable'];
        $this->CampaignLabels = TableRegistry::get('CampaignLabels', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CampaignLabels);

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
