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

Class panierproduit {

	private $idClient; //int(11)
	private $idProd; //int(11)
	private $dateAjout; //date
	private $connection;

	public function panierproduit(){
		$this->connection = new DataBaseMysql();
	}

    /**
     * New object to the class. Don´t forget to save this new object "as new" by using the function $class->Save_Active_Row_as_New(); 
     *
     */
	public function New_panierproduit($dateAjout){
		$this->dateAjout = $dateAjout;
	}

    /**
     * Load one row into var_class. To use the vars use for exemple echo $class->getVar_name; 
     *
     * @param key_table_type $key_row
     * 
     */
	public function Load_from_key($key_row){
		$result = $this->connection->RunQuery("Select * from panierproduit where idClient = \"$key_row\" ");
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			$this->idClient = $row["idClient"];
			$this->idProd = $row["idProd"];
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
		$this->connection->RunQuery("DELETE FROM panierproduit WHERE idClient = $key_row");
	}

    /**
     * Update the active row table on table
     */
	public function Save_Active_Row(){
		$this->connection->RunQuery("UPDATE panierproduit set dateAjout = \"$this->dateAjout\" where idClient = \"$this->idClient\"");
	}

    /**
     * Save the active var class as a new row on table
     */
	public function Save_Active_Row_as_New(){
		$this->connection->RunQuery("Insert into panierproduit (dateAjout) values (\"$this->dateAjout\")");
	}

    /**
     * Returns array of keys order by $column -> name of column $order -> desc or acs
     *
     * @param string $column
     * @param string $order
     */
	public function GetKeysOrderBy($column, $order){
		$keys = array(); $i = 0;
		$result = $this->connection->RunQuery("SELECT idClient from panierproduit order by $column $order");
			while($row = $result->fetch_array(MYSQLI_ASSOC)){
				$keys[$i] = $row["idClient"];
				$i++;
			}
	return $keys;
	}

	/**
	 * @return idClient - int(11)
	 */
	public function getidClient(){
		return $this->idClient;
	}

	/**
	 * @return idProd - int(11)
	 */
	public function getidProd(){
		return $this->idProd;
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
	public function setidClient($idClient){
		$this->idClient = $idClient;
	}

	/**
	 * @param Type: int(11)
	 */
	public function setidProd($idProd){
		$this->idProd = $idProd;
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
	public function endpanierproduit(){
		$this->connection->CloseMysql();
	}

}