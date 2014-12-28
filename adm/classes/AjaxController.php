<?php
require_once('base/BaseCore.php');
require_once('models/ModelPages.php');

class AjaxController
{
    public function generateRespohse()
    {
        $answer = 'no action set';
        $pageModel =  new ModelPages((int)$_REQUEST['id_page']);
        
        if ($_REQUEST['action'] == 'get') {
            $answer = $pageModel->getOnePage(false)->toJson();
        }
        if ($_REQUEST['action'] == 'save') { 
            $answer = $pageModel->setData($_REQUEST)->save();
        }
        echo $answer; die();
    }
}

$controller = new AjaxController();
$controller->generateRespohse();