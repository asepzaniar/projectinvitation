<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
// ini_set("display_erros", "On");
class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

	public function indexhomeAction()
    {
		// die('a');
        /* Initialize action controller here */
		//  $this->_helper->layout->disableLayout();
    }

	public function indexaboutAction()
    {
		// die('a');
        /* Initialize action controller here */
		//  $this->_helper->layout->disableLayout();
    }

    public function indexAction()
    {
        // action body
		$cc = new Application_Model_Assesstment();
		$dx = $cc->test_model();
		$prio = $cc->prioritas();
		// Zend_Debug::dump($dx);die('a');
		
		$this->view->prioritas = $prio;
    }
	

}

