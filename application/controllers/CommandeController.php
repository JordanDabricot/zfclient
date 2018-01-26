<?php

class CommandeController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        if ($this->getRequest()->isPost())
        {
            $value = $this->getRequest()->getPost();
            $getCommandeDb = new Application_Model_Client();
            $getCommande = $getCommandeDb->selectOrders($value['idCom']);

            $this->view->getCommande = $getCommande;
        }
    }


}

