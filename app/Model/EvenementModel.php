<?php
namespace Model;

use \W\Model\Model;

class EvenementModel extends Model{
    
    public function find5()
	{
		
		$sql = "SELECT id, nomEvenement, dateEvenement, lieuEvenement FROM evenement WHERE dateEvenement >= NOW() LIMIT 5";
		$sth = $this->dbh->prepare($sql);
		
		$sth->execute();

		return $sth->fetchAll();
	}
    
    
}