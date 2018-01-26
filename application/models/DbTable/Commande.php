<?php
/**
 * Created by PhpStorm.
 * User: jdabricot
 * Date: 30/01/18
 * Time: 16:26
 */

class Application_Model_DbTable_Commande extends Zend_Db_Table_Abstract
{

    protected $_name = 'commande';
    protected $_primary = 'id_commande';
}
