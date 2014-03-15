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

Class reclamation {

	private $idRec; //int(11)
	private $mailRec; //varchar(100)
	private $dateRec; //date
	private $objRec; //varchar(200)
	private $texteRec; //varchar(1000)
	private $connection;

	public function reclamation(){
		$this->connection = new DataBaseMysql();
	}

    /**
     * New object to the class. Don´t forget to save this new object "as new" by using the function $class->Save_Active_Row_as_New(); 
     *
     */
	public function New_reclamation($mailRec,$dateRec,$objRec,$texteRec){
		$this->mailRec = $mailRec;
		$this->dateRec = $dateRec;
		$this->objRec = $objRec;
		$this->texteRec = $texteRec;
	}

    /**
     * Load one row into var_class. To use the vars use for exemple echo $class->getVar_name; 
     *
     * @param key_table_type $key_row
     * 
     */
	public function Load_from_key($key_row){
		$result = $this->connection->RunQuery("Select * from reclamation where idRec = \"$key_row\" ");
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			$this->idRec = $row["idRec"];
			$this->mailRec = $row["mailRec"];
			$this->dateRec = $row["dateRec"];
			$this->objRec = $row["objRec"];
			$this->texteRec = $row["texteRec"];
		}
	}

    /**
     * Delete the row by using the key as arg
     *
     * @param key_table_type $key_row
     *
     */
	public function Delete_row_from_key($key_row){
		$this->connection->RunQuery("DELETE FROM reclamation WHERE idRec = $key_row");
	}

    /**
     * Update the active row table on table
     */
	public function Save_Active_Row(){
		$this->connection->RunQuery("UPDATE reclamation set mailRec = \"$this->mailRec\", dateRec = \"$this->dateRec\", objRec = \"$this->objRec\", texteRec = \"$this->texteRec\" where idRec = \"$this->idRec\"");
	}

    /**
     * Save the active var class as a new row on table
     */
	public function Save_Active_Row_as_New(){
		$this->connection->RunQuery("Insert into reclamation (mailRec, dateRec, objRec, texteRec) values (\"$this->mailRec\", \"$this->dateRec\", \"$this->objRec\", \"$this->texteRec\")");
	}

    /**
     * Returns array of keys order by $column -> name of column $order -> desc or acs
     *
     * @param string $column
     * @param string $order
     */
	public function GetKeysOrderBy($column, $order){
		$keys = array(); $i = 0;
		$result = $this->connection->RunQuery("SELECT idRec from reclamation order by $column $order");
			while($row = $result->fetch_array(MYSQLI_ASSOC)){
				$keys[$i] = $row["idRec"];
				$i++;
			}
	return $keys;
	}

	/**
	 * @return idRec - int(11)
	 */
	public function getidRec(){
		return $this->idRec;
	}

	/**
	 * @return mailRec - varchar(100)
	 */
	public function getmailRec(){
		return $this->mailRec;
	}

	/**
	 * @return dateRec - date
	 */
	public function getdateRec(){
		return $this->dateRec;
	}

	/**
	 * @return objRec - varchar(200)
	 */
	public function getobjRec(){
		return $this->objRec;
	}

	/**
	 * @return texteRec - varchar(1000)
	 */
	public function gettexteRec(){
		return $this->texteRec;
	}

	/**
	 * @param Type: int(11)
	 */
	public function setidRec($idRec){
		$this->idRec = $idRec;
	}

	/**
	 * @param Type: varchar(100)
	 */
	public function setmailRec($mailRec){
		$this->mailRec = $mailRec;
	}

	/**
	 * @param Type: date
	 */
	public function setdateRec($dateRec){
		$this->dateRec = $dateRec;
	}

	/**
	 * @param Type: varchar(200)
	 */
	public function setobjRec($objRec){
		$this->objRec = $objRec;
	}

	/**
	 * @param Type: varchar(1000)
	 */
	public function settexteRec($texteRec){
		$this->texteRec = $texteRec;
	}

    /**
     * Close mysql connection
     */
	public function endreclamation(){
		$this->connection->CloseMysql();
	}

}