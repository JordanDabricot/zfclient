<?php

class DeleteClientController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        if ($this->getRequest()->isPost()){
            $value = $this->getRequest()->getPost();
            $deleteClient = new Application_Model_Client();
            $deleteClient->deleteClient($value['delete']);
            $r = new Zend_Controller_Action_Helper_Redirector();
            $r->gotoUrl('/')->redirectAndExit();
        }else{
            echo 'avorté';
        }
    }


}

