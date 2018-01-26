<?php

class ArticleController extends Zend_Controller_Action
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
            $getArticleDb = new Application_Model_Client();
            $getArticle = $getArticleDb->selectItems($value['idArt']);

            $this->view->getArticle = $getArticle;
        }
    }


}

