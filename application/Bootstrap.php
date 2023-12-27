<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

protected function _initJquery() {
  $this->bootstrap('view');
  $view = $this->getResource('view'); //get the view object
    
  $view->addHelperPath("JQuery/View/Helper", "JQuery_View_Helper");
  $uri = explode('/',$_SERVER['REQUEST_URI']);


}

protected function _initView (){
  
#  $params = $this->getRequest()->getParams();
#Zend_Debug::dump($params);die();
  $view = new Zend_View();
  $view->doctype('XHTML1_STRICT');
  $uri = explode('/',$_SERVER['REQUEST_URI']);
#  Zend_Debug::dump($uri);die();
  
  //$view->skin = 'default';
  $config = new Zend_Config_Ini(APPLICATION_PATH.'/configs/application.ini', 'production');
  $view->setScriptPath(APPLICATION_PATH . '/views/scripts/');
  $viewRenderer = Zend_Controller_Action_HelperBroker::getStaticHelper('ViewRenderer');
  $viewRenderer->setView($view);
  #Zend_Debug::dump($view);#die();
  return $view;
}

protected function _initAutoload (){
   date_default_timezone_set('Asia/Jakarta');
  
   $autoLoader = Zend_Loader_Autoloader::getInstance();
   $autoLoader->registerNamespace('CMS_');
   $resourceLoader = new Zend_Loader_Autoloader_Resource(
      array(
         'basePath' => APPLICATION_PATH , 
         'namespace' => '' , 
         'resourceTypes' => array(
            'form' => array(
               'path' => 'forms/' , 
               'namespace' => 'Form_'
            ) , 
            'model' => array(
               'path' => 'models/' , 
               'namespace' => 'Model_'
            )
         )
      )
   );
   return $autoLoader;
}

}

