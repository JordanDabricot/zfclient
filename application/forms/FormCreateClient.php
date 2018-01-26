<?php

class Application_Form_FormCreateClient extends Zend_Form
{
    public function init()
    {
        $this->setMethod('post');

        $this->addElement('text', 'nom',array(
            'label' => 'Nom :',
            'required' => true,
            'class' => 'validate'
        ));

        $this->addElement('text', 'prenom',array(
            'label' => 'Prenom :',
            'required' => true,
            'class' => 'validate'
        ));

        $this->addElement('text', 'email',array(
            'label' => 'Email :',
            'required' => true,
            'class' => 'validate'
        ));

        $this->addElement('text', 'dateNaissance',array(
            'label' => 'Date de naissance :',
            'required' => true,
            'class' => 'validate',
            'placeholder' => 'jj/mm/aaaa'
        ));

        $this->addElement('submit', 'submit',array(
            'label' => 'Valider',
            'required' => true,
            'class' => 'btn waves-effect waves-light',
        ));
    }
}

