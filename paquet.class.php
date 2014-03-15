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

Class paquet {

	private $idPaquet; //int(11)
	private $idPrest; //int(11)
	private $nomPaquet; //varchar(100)
	private $descPaquet; //varchar(1000)
	private $shortDescPaquet; //varchar(500)
	private $imgPaquet; //varchar(250)
	private $prixPaquet; //double
	private $connection;

	public function paquet(){
		$this->connection = new DataBaseMysql();
	}

    /**
     * New object to the class. Don´t forget to save this new object "as new" by using the function $class->Save_Active_Row_as_New(); 
     *
     */
	public function New_paquet($idPrest,$nomPaquet,$descPaquet,$shortDescPaquet,$imgPaquet,$prixPaquet){
		$this->idPrest = $idPrest;
		$this->nomPaquet = $nomPaquet;
		$this->descPaquet = $descPaquet;
		$this->shortDescPaquet = $shortDescPaquet;
		$this->imgPaquet = $imgPaquet;
		$this->prixPaquet = $prixPaquet;
	}

    /**
     * Load one row into var_class. To use the vars use for exemple echo $class->getVar_name; 
     *
     * @param key_table_type $key_row
     * 
     */
	public function Load_from_key($key_row){
		$result = $this->connection->RunQuery("Select * from paquet where idPaquet = \"$key_row\" ");
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			$this->idPaquet = $row["idPaquet"];
			$this->idPrest = $row["idPrest"];
			$this->nomPaquet = $row["nomPaquet"];
			$this->descPaquet = $row["descPaquet"];
			$this->shortDescPaquet = $row["shortDescPaquet"];
			$this->imgPaquet = $row["imgPaquet"];
			$this->prixPaquet = $row["prixPaquet"];
		}
	}

    /**
     * Delete the row by using the key as arg
     *
     * @param key_table_type $key_row
     *
     */
	public function Delete_row_from_key($key_row){
		$this->connection->RunQuery("DELETE FROM paquet WHERE idPaquet = $key_row");
	}

    /**
     * Update the active row table on table
     */
	public function Save_Active_Row(){
		$this->connection->RunQuery("UPDATE paquet set idPrest = \"$this->idPrest\", nomPaquet = \"$this->nomPaquet\", descPaquet = \"$this->descPaquet\", shortDescPaquet = \"$this->shortDescPaquet\", imgPaquet = \"$this->imgPaquet\", prixPaquet = \"$this->prixPaquet\" where idPaquet = \"$this->idPaquet\"");
	}

    /**
     * Save the active var class as a new row on table
     */
	public function Save_Active_Row_as_New(){
		$this->connection->RunQuery("Insert into paquet (idPrest, nomPaquet, descPaquet, shortDescPaquet, imgPaquet, prixPaquet) values (\"$this->idPrest\", \"$this->nomPaquet\", \"$this->descPaquet\", \"$this->shortDescPaquet\", \"$this->imgPaquet\", \"$this->prixPaquet\")");
	}

    /**
     * Returns array of keys order by $column -> name of column $order -> desc or acs
     *
     * @param string $column
     * @param string $order
     */
	public function GetKeysOrderBy($column, $order){
		$keys = array(); $i = 0;
		$result = $this->connection->RunQuery("SELECT idPaquet from paquet order by $column $order");
			while($row = $result->fetch_array(MYSQLI_ASSOC)){
				$keys[$i] = $row["idPaquet"];
				$i++;
			}
	return $keys;
	}

	/**
	 * @return idPaquet - int(11)
	 */
	public function getidPaquet(){
		return $this->idPaquet;
	}

	/**
	 * @return idPrest - int(11)
	 */
	public function getidPrest(){
		return $this->idPrest;
	}

	/**
	 * @return nomPaquet - varchar(100)
	 */
	public function getnomPaquet(){
		return $this->nomPaquet;
	}

	/**
	 * @return descPaquet - varchar(1000)
	 */
	public function getdescPaquet(){
		return $this->descPaquet;
	}

	/**
	 * @return shortDescPaquet - varchar(500)
	 */
	public function getshortDescPaquet(){
		return $this->shortDescPaquet;
	}

	/**
	 * @return imgPaquet - varchar(250)
	 */
	public function getimgPaquet(){
		return $this->imgPaquet;
	}

	/**
	 * @return prixPaquet - double
	 */
	public function getprixPaquet(){
		return $this->prixPaquet;
	}

	/**
	 * @param Type: int(11)
	 */
	public function setidPaquet($idPaquet){
		$this->idPaquet = $idPaquet;
	}

	/**
	 * @param Type: int(11)
	 */
	public function setidPrest($idPrest){
		$this->idPrest = $idPrest;
	}

	/**
	 * @param Type: varchar(100)
	 */
	public function setnomPaquet($nomPaquet){
		$this->nomPaquet = $nomPaquet;
	}

	/**
	 * @param Type: varchar(1000)
	 */
	public function setdescPaquet($descPaquet){
		$this->descPaquet = $descPaquet;
	}

	/**
	 * @param Type: varchar(500)
	 */
	public function setshortDescPaquet($shortDescPaquet){
		$this->shortDescPaquet = $shortDescPaquet;
	}

	/**
	 * @param Type: varchar(250)
	 */
	public function setimgPaquet($imgPaquet){
		$this->imgPaquet = $imgPaquet;
	}

	/**
	 * @param Type: double
	 */
	public function setprixPaquet($prixPaquet){
		$this->prixPaquet = $prixPaquet;
	}

    /**
     * Close mysql connection
     */
	public function endpaquet(){
		$this->connection->CloseMysql();
	}

}