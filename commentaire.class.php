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

Class commentaire {

	private $idClient; //int(11)
	private $idProd; //int(11)
	private $dateCom; //date
	private $texteCom; //varchar(1000)
	private $connection;

	public function commentaire(){
		$this->connection = new DataBaseMysql();
	}

    /**
     * New object to the class. Don´t forget to save this new object "as new" by using the function $class->Save_Active_Row_as_New(); 
     *
     */
	public function New_commentaire($dateCom,$texteCom){
		$this->dateCom = $dateCom;
		$this->texteCom = $texteCom;
	}

    /**
     * Load one row into var_class. To use the vars use for exemple echo $class->getVar_name; 
     *
     * @param key_table_type $key_row
     * 
     */
	public function Load_from_key($key_row){
		$result = $this->connection->RunQuery("Select * from commentaire where idClient = \"$key_row\" ");
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			$this->idClient = $row["idClient"];
			$this->idProd = $row["idProd"];
			$this->dateCom = $row["dateCom"];
			$this->texteCom = $row["texteCom"];
		}
	}

    /**
     * Delete the row by using the key as arg
     *
     * @param key_table_type $key_row
     *
     */
	public function Delete_row_from_key($key_row){
		$this->connection->RunQuery("DELETE FROM commentaire WHERE idClient = $key_row");
	}

    /**
     * Update the active row table on table
     */
	public function Save_Active_Row(){
		$this->connection->RunQuery("UPDATE commentaire set dateCom = \"$this->dateCom\", texteCom = \"$this->texteCom\" where idClient = \"$this->idClient\"");
	}

    /**
     * Save the active var class as a new row on table
     */
	public function Save_Active_Row_as_New(){
		$this->connection->RunQuery("Insert into commentaire (dateCom, texteCom) values (\"$this->dateCom\", \"$this->texteCom\")");
	}

    /**
     * Returns array of keys order by $column -> name of column $order -> desc or acs
     *
     * @param string $column
     * @param string $order
     */
	public function GetKeysOrderBy($column, $order){
		$keys = array(); $i = 0;
		$result = $this->connection->RunQuery("SELECT idClient from commentaire order by $column $order");
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
	 * @return dateCom - date
	 */
	public function getdateCom(){
		return $this->dateCom;
	}

	/**
	 * @return texteCom - varchar(1000)
	 */
	public function gettexteCom(){
		return $this->texteCom;
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
	public function setdateCom($dateCom){
		$this->dateCom = $dateCom;
	}

	/**
	 * @param Type: varchar(1000)
	 */
	public function settexteCom($texteCom){
		$this->texteCom = $texteCom;
	}

    /**
     * Close mysql connection
     */
	public function endcommentaire(){
		$this->connection->CloseMysql();
	}

}