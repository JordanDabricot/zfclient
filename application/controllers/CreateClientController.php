<?php

class CreateClientController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $button = new Application_Form_FormCreateClient();
        $this->view->button = $button;

        if (!$button->isValid($_POST)) {
            // Validation en echec
            $this->view->button = $button;
            return $this->render('index');
        }

        // les valeurs sont récupérées
        $values = $button->getValues();

        //ajout du client dans la base
        $registerClient = new Application_Model_Client();
        $registerClient->createClient(array(
            'nom_client' => $values['nom'],
            'prenom_client' => $values['prenom'],
            'email_client' => $values['email'],
            'date_naissance' => $values['dateNaissance']
        ));
        echo 'compte enregistrer';
        $r = new Zend_Controller_Action_Helper_Redirector();
        $r->gotoUrl('/')->redirectAndExit();
    }
}

