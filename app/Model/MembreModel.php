<?php
namespace Model;

use \W\Model\Model;
use \W\Model\UsersModel;

class MembreModel extends UsersModel{
    
    public function findBy($nomColonne, $valeurColonne)
		{
			$sql = 'SELECT * FROM ' . $this->table . ' WHERE ' . $nomColonne .'  = :nomColonne LIMIT 1';
			$sth = $this->dbh->prepare($sql);
			$sth->bindValue(':nomColonne', $valeurColonne);
			$sth->execute();

			return $sth->fetch();
		}
    
    public function __construct(){
    	parent::__construct();
    	$this->setPrimaryKey("id");
    }
}

