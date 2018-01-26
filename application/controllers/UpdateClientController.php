<?php

class UpdateClientController extends Zend_Controller_Action
{
    public $formUpdate;
    public $datadb;

    public function init()
    {
    }

    public function indexAction()
    {
        $datas = $this->getRequest()->getParams();
        $client = new Application_Model_Client();
        $getClient = $client->selectTheClient($datas['edit']);
        $this->dataDb = array("id_client" => $getClient[0]->id_client,
            "nom_client" => $getClient[0]->nom_client,
            "prenom_client" => $getClient[0]->prenom_client,
            "email_client" => $getClient[0]->email_client,
            "date_naissance" => $getClient[0]->date_naissance);
        $this->formUpdate = new Application_Form_FormUpdateClient($this->dataDb);
        $this->formUpdate->populate($this->dataDb);
        $this->view->formUpdate = $this->formUpdate;
    }

    public function processUpdateAction()
    {
        if ($this->getRequest()->isPost()){
            $values = $this->getRequest()->getPost();
            $updateClient = new Application_Model_Client();
            $updateClient->updateClient(array(
                'nom_client' => $values['nom'],
                'prenom_client' => $values['prenom'],
                'email_client' => $values['email'],
                'date_naissance' => $values['dateNaissance'],
            ), $values['id_client']);
            $r = new Zend_Controller_Action_Helper_Redirector();
            $r->gotoUrl('/')->redirectAndExit();
        }else{
            echo 'problème';
        }
    }
}

