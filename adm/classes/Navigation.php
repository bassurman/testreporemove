<?php
require_once('base/BaseCore.php');
require_once('models/ModelPages.php');
class  Navigation
{
        public $_pageVars = array();
        
        public function initContent()
        {   
            $pageModel =  new ModelPages();
            $this->_pageVars['listPages'] = $pageModel->getCollection();
            include_once('./views/header.phtml');
            include_once('./views/index.phtml');
            include_once('./views/footer.phtml');            
        }
}