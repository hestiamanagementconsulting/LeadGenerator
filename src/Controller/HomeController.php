<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CampaignLabels Controller
 *
 * @property \App\Model\Table\CampaignLabelsTable $CampaignLabels
 */
class HomeController extends AppController
{

    /**
     * home method
     *
     * @return \Cake\Network\Response|null
     */
    public function home()
    {
        null;
    }

	public function importCSV()
    {
        return $this->redirect(array('controller' => 'importCSV', 'action' => 'index'));    
    }

    public function Campaigns()
    {
        return $this->redirect(array('controller' => 'campaigns', 'action' => 'index'));    
    }

    public function Labels()
    {
        return $this->redirect(array('controller' => 'labels', 'action' => 'index'));    
    }

	public function SearchLeads()
    {
        return $this->redirect(array('controller' => 'SearchLeads', 'action' => 'index'));
    }
     
}
