<?php

class IndexController extends Zend_Controller_Action
{

    public $client = null;
    public $button = null;
    public $edit = null;

    //Initialisation nouvelle instance
    public function init()
    {
        $this->client = new Application_Model_Client();
    }

    //page d'accueil affichage de tous les clients
    public function indexAction()
    {
        //Récupération données de tous les clients pour la page d'accueil
        $getClient = $this->client->selectAllClient();
        $this->view->getClient = $getClient;
    }
}

