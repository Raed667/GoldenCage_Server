<?php
/*
 * Author: Rafael Rocha - www.rafaelrocha.net - info@rafaelrocha.net
 * 
 * Create Date: 15-03-2014
 * 
 * Version of MYSQL_to_PHP: 1.1
 * 
 * License: LGPL 
 * 
 */
require_once 'DataBaseMysql.class.php';

Class produitpaquet {

	private $idProd; //int(11)
	private $idPaquet; //int(11)
	private $dateAjout; //date
	private $connection;

	public function produitpaquet(){
		$this->connection = new DataBaseMysql();
	}

    /**
     * New object to the class. Don´t forget to save this new object "as new" by using the function $class->Save_Active_Row_as_New(); 
     *
     */
	public function New_produitpaquet($dateAjout){
		$this->dateAjout = $dateAjout;
	}

    /**
     * Load one row into var_class. To use the vars use for exemple echo $class->getVar_name; 
     *
     * @param key_table_type $key_row
     * 
     */
	public function Load_from_key($key_row){
		$result = $this->connection->RunQuery("Select * from produitpaquet where idProd = \"$key_row\" ");
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			$this->idProd = $row["idProd"];
			$this->idPaquet = $row["idPaquet"];
			$this->dateAjout = $row["dateAjout"];
		}
	}

    /**
     * Delete the row by using the key as arg
     *
     * @param key_table_type $key_row
     *
     */
	public function Delete_row_from_key($key_row){
		$this->connection->RunQuery("DELETE FROM produitpaquet WHERE idProd = $key_row");
	}

    /**
     * Update the active row table on table
     */
	public function Save_Active_Row(){
		$this->connection->RunQuery("UPDATE produitpaquet set dateAjout = \"$this->dateAjout\" where idProd = \"$this->idProd\"");
	}

    /**
     * Save the active var class as a new row on table
     */
	public function Save_Active_Row_as_New(){
		$this->connection->RunQuery("Insert into produitpaquet (dateAjout) values (\"$this->dateAjout\")");
	}

    /**
     * Returns array of keys order by $column -> name of column $order -> desc or acs
     *
     * @param string $column
     * @param string $order
     */
	public function GetKeysOrderBy($column, $order){
		$keys = array(); $i = 0;
		$result = $this->connection->RunQuery("SELECT idProd from produitpaquet order by $column $order");
			while($row = $result->fetch_array(MYSQLI_ASSOC)){
				$keys[$i] = $row["idProd"];
				$i++;
			}
	return $keys;
	}

	/**
	 * @return idProd - int(11)
	 */
	public function getidProd(){
		return $this->idProd;
	}

	/**
	 * @return idPaquet - int(11)
	 */
	public function getidPaquet(){
		return $this->idPaquet;
	}

	/**
	 * @return dateAjout - date
	 */
	public function getdateAjout(){
		return $this->dateAjout;
	}

	/**
	 * @param Type: int(11)
	 */
	public function setidProd($idProd){
		$this->idProd = $idProd;
	}

	/**
	 * @param Type: int(11)
	 */
	public function setidPaquet($idPaquet){
		$this->idPaquet = $idPaquet;
	}

	/**
	 * @param Type: date
	 */
	public function setdateAjout($dateAjout){
		$this->dateAjout = $dateAjout;
	}

    /**
     * Close mysql connection
     */
	public function endproduitpaquet(){
		$this->connection->CloseMysql();
	}

}