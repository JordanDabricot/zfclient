<?php

class Application_Form_FormUpdateClient extends Zend_Form
{
    private $dataDb;

    public function __construct($dataDb)
    {
        $this->dataDb = $dataDb;

        parent::__construct();
    }

    public function init()
    {
        $this->setMethod('post');
        $this->setAction('/update-lient/process-update');

        $this->addElement('text', 'id_client', array(
            'allowEmpty' => true,
            'value' => $this->dataDb['id_client'],
            'hidden' => true
        ));

        $this->addElement('text', 'nom', array(
            'label' => 'Nom :',
            'allowEmpty' => true,
            'class' => 'validate',
            'value' => $this->dataDb['nom_client']
        ));

        $this->addElement('text', 'prenom', array(
            'label' => 'Prenom :',
            'allowEmpty' => true,
            'value' => $this->dataDb['prenom_client'],
            'class' => 'validate'
        ));

        $this->addElement('text', 'email', array(
            'label' => 'Email :',
            'allowEmpty' => true,
            'value' => $this->dataDb['email_client'],
            'class' => 'validate'
        ));

        $this->addElement('text', 'dateNaissance', array(
            'label' => 'Date de naissance :',
            'allowEmpty' => true,
            'class' => 'validate',
            'value' => $this->dataDb['date_naissance'],
            'placeholder' => 'jj/mm/aaaa'
        ));

        $this->addElement('submit', 'submit', array(
            'label' => 'Valider',
            'allowEmpty' => true,
            'class' => 'btn waves-effect waves-light',
        ));
    }


}

