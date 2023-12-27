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

    public function indexAction()
    {
        // action body
		$cc = new Application_Model_Assesstment();
		$dx = $cc->test_model();
		$prio = $cc->prioritas();
		// Zend_Debug::dump($dx);die('a');
		
		$this->view->prioritas = $prio;
    }
	
	public function ajaxq1Action(){
		// die('a');
		// Zend_Debug::dump($params); die();
		
		
		
		$cc = new Application_Model_Assesstment();
		
				$tmp = $cc->data_q1();
				// Zend_Debug::dump($tmp);die('a');
				foreach($tmp as $k=>$v){
				// Zend_Debug::dump($v);die('a');
				
				// $total = round(($v['TOTAL_SALES']),2);
				
				
				$data['segment'][] = $v['segment'];
				$data['monthname'][] = $v['month_name'];
				$data['totalsales'][] = (int)$v['total_sales'];
				// $data['target'][] = $tgt;
				// $data['realol'][] = $ol;
				// $data['gap'][] = $gap;
				}
		
		header("Access-Control-Allow-Origin: *");
		header('Content-Type: application/json');
		echo json_encode($data);
		die();
		
		
	}
	
	public function ajaxq2Action(){
		// die('a');
		// Zend_Debug::dump($params); die();
		
		
		
		$cc = new Application_Model_Assesstment();
		
				$data = $cc->data_q2();
				// Zend_Debug::dump($tmp);die('a');
				
		
		header("Access-Control-Allow-Origin: *");
		header('Content-Type: application/json');
		echo json_encode($data);
		die();
		
		
	}
	
	public function ajaxq3Action(){
		// die('a');
		// Zend_Debug::dump($params); die();
		
		
		
		$cc = new Application_Model_Assesstment();
		
				$tmp = $cc->data_q3();
				// Zend_Debug::dump($tmp);die('a');
				
				foreach($tmp as $k=>$v){
				// Zend_Debug::dump($v);die('a');
				
				
				$data['country'][] = $v['country'];
				$data['product'][] = $v['product'];
				$data['totalsales'][] = (int)$v['total_sales'];
				// $data['target'][] = $tgt;
				// $data['realol'][] = $ol;
				// $data['gap'][] = $gap;
				}
				
		
		header("Access-Control-Allow-Origin: *");
		header('Content-Type: application/json');
		echo json_encode($data);
		die();
		
		
	}
	
	public function ajaxq4Action(){
		// die('a');
		// Zend_Debug::dump($params); die();
		
		
		
		$cc = new Application_Model_Assesstment();
		
				$tmp = $cc->data_q4();
				// Zend_Debug::dump($tmp);die('a');
				
				foreach($tmp as $k=>$v){
				// Zend_Debug::dump($v);die('a');
				
				
				$data['month_name'][] = $v['month_name'];
				$data['segment'][] = $v['segment'];
				$data['totalsales'][] = (int)$v['total_sales'];
				// $data['target'][] = $tgt;
				// $data['realol'][] = $ol;
				// $data['gap'][] = $gap;
				}
				
		
		header("Access-Control-Allow-Origin: *");
		header('Content-Type: application/json');
		echo json_encode($data);
		die();
		
		
	}

	public function ajaxq5Action(){
		// die('a');
		// Zend_Debug::dump($params); die();
		
			
		$cc = new Application_Model_Assesstment();
		
		$data = $cc->data_q5();
				// Zend_Debug::dump($data); die();
		
		header("Access-Control-Allow-Origin: *");
		header('Content-Type: application/json');
		echo json_encode($data);
		die();
		
		
	}
	
	public function ajaxq6Action(){
		// die('a');
		// Zend_Debug::dump($params); die();
		
			
		$cc = new Application_Model_Assesstment();
		
		$tmp = $cc->data_q6();
			foreach($tmp as $k=>$v){
				// Zend_Debug::dump($v);die('a');
				
				
				$data['month_name'][] = $v['month_name'];
				$data['current'][] = (int)$v['current'];
				$data['prevyear'][] = (int)$v['prevyear'];
				// $data['target'][] = $tgt;
				// $data['realol'][] = $ol;
				// $data['gap'][] = $gap;
				}
				// Zend_Debug::dump($data); die();
		
		header("Access-Control-Allow-Origin: *");
		header('Content-Type: application/json');
		echo json_encode($data);
		die();
		
		
	}
	
	public function ajaxq7Action(){
		// die('a');
		// Zend_Debug::dump($params); die();
		
			
		$cc = new Application_Model_Assesstment();
		
		$tmp = $cc->data_q7();
			foreach($tmp as $k=>$v){
				// Zend_Debug::dump($v);die('a');
				
				
				$data['product'][] = $v['product'];
				$data['current'][] = (int)$v['current'];
				$data['prevyear'][] = (int)$v['prevyear'];
				// $data['target'][] = $tgt;
				// $data['realol'][] = $ol;
				// $data['gap'][] = $gap;
				}
				// Zend_Debug::dump($data); die();
		
		header("Access-Control-Allow-Origin: *");
		header('Content-Type: application/json');
		echo json_encode($data);
		die();
		
		
	}
	


}

