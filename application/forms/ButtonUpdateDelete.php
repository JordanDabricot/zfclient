<?php

class Application_Form_ButtonUpdateDelete extends Zend_Form
{

    public function init()
    {

        $this->setMethod('post');

        $this->addElement('button', 'edit', array(
            'label' => 'Click me',
            'class' => 'btn waves-effect waves-light',
            'type' => 'submit',
            'value' => 2
        ));
    }


}

