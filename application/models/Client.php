<?php

class Application_Model_Client
{
    private $_dbTableClient;
    private $_dbTableCommande;

    public function __construct()
    {
        $this->_dbTableClient = new Application_Model_DbTable_Client();
        $this->_DbTableCommande = new Application_Model_DbTable_Commande();
        $this->_dbTableArticle = new Application_Model_DbTable_Article();
    }

    public function createClient($array){
        $this->_dbTableClient->insert($array);
    }

    public function updateClient($array, $idClient){
        $this->_dbTableClient->update($array, "id_client = $idClient");
    }

    public function selectAllClient(){
        $sql = $this->_dbTableClient->select()
            ->from(array('c' => 'client'))
            ->joinleft(array('co' => 'commande'), 'c.id_client = co.client_id',
                       array('count(co.id_commande) as nbCommande', 'SUM(co.prix) as sommeCommande', 'MAX(co.date_commande) as maxDate'))
            ->group(array('c.id_client','c.nom_client', 'c.prenom_client', 'c.email_client', 'c.date_naissance'))
            ->setIntegrityCheck(false);



        $rows = $this->_dbTableClient->fetchAll($sql);
        return $rows;
    }

    public function selectTheClient($idClient)
    {
        $sql = $this->_dbTableClient->select()
            ->from(array('client'))
            ->where('id_client = ?', $idClient);

        $rows = $this->_dbTableClient->fetchAll($sql);
        return $rows;
    }

    public function deleteClient($idClient)
    {
        $whereCommande = $this->_DbTableCommande->getAdapter()->quoteInto('client_id IN (?)', $idClient);
        $this->_DbTableCommande->delete($whereCommande);
        $whereClient = $this->_dbTableClient->getAdapter()->quoteInto('id_client IN (?)', $idClient);
        $this->_dbTableClient->delete($whereClient);
    }

    public function selectOrders($idClient)
    {
        $sql = $this->_dbTableClient->select()
            ->from(array('c' => 'client'), 'c.id_client')
            ->joinleft(array('co' => 'commande'), 'c.id_client = co.client_id',
                array('co.id_commande', 'co.prix', 'co.date_commande', 'co.nombre_article'))
            ->where('c.id_client = ?', $idClient)
            ->group(array('c.id_client', 'co.id_commande'))
            ->setIntegrityCheck(false);

        $rows = $this->_dbTableClient->fetchAll($sql);
        return $rows;
    }

    public function selectItems($idCommande)
    {
        $sql = $this->_dbTableClient->select()
            ->from(array('co' => 'commande'), array('co.id_commande', 'co.client_id'))
            ->joinleft(array('a' => 'article'), 'co.article_id = a.id_article',
                array('a.id_article', 'a.nom_article', 'a.quantite_article', 'a.prix_unitaire'))
            ->where('co.id_commande = ?', $idCommande)
            ->group(array('a.id_article', 'co.id_commande', 'a.nom_article', 'a.quantite_article', 'a.prix_unitaire', 'co.client_id'))
            ->setIntegrityCheck(false);
        $rows = $this->_dbTableClient->fetchAll($sql);
        return $rows;
    }
}

