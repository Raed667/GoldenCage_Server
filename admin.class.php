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

Class admin {

	private $idAdmin; //int(11)
	private $nomAdmin; //varchar(100)
	private $mailAdmin; //varchar(100)
	private $pwdAdmin; //varchar(500)
	private $connection;

	public function admin(){
		$this->connection = new DataBaseMysql();
	}

    /**
     * New object to the class. Don´t forget to save this new object "as new" by using the function $class->Save_Active_Row_as_New(); 
     *
     */
	public function New_admin($nomAdmin,$mailAdmin,$pwdAdmin){
		$this->nomAdmin = $nomAdmin;
		$this->mailAdmin = $mailAdmin;
		$this->pwdAdmin = $pwdAdmin;
	}

    /**
     * Load one row into var_class. To use the vars use for exemple echo $class->getVar_name; 
     *
     * @param key_table_type $key_row
     * 
     */
	public function Load_from_key($key_row){
		$result = $this->connection->RunQuery("Select * from admin where idAdmin = \"$key_row\" ");
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			$this->idAdmin = $row["idAdmin"];
			$this->nomAdmin = $row["nomAdmin"];
			$this->mailAdmin = $row["mailAdmin"];
			$this->pwdAdmin = $row["pwdAdmin"];
		}
	}

    /**
     * Delete the row by using the key as arg
     *
     * @param key_table_type $key_row
     *
     */
	public function Delete_row_from_key($key_row){
		$this->connection->RunQuery("DELETE FROM admin WHERE idAdmin = $key_row");
	}

    /**
     * Update the active row table on table
     */
	public function Save_Active_Row(){
		$this->connection->RunQuery("UPDATE admin set nomAdmin = \"$this->nomAdmin\", mailAdmin = \"$this->mailAdmin\", pwdAdmin = \"$this->pwdAdmin\" where idAdmin = \"$this->idAdmin\"");
	}

    /**
     * Save the active var class as a new row on table
     */
	public function Save_Active_Row_as_New(){
		$this->connection->RunQuery("Insert into admin (nomAdmin, mailAdmin, pwdAdmin) values (\"$this->nomAdmin\", \"$this->mailAdmin\", \"$this->pwdAdmin\")");
	}

    /**
     * Returns array of keys order by $column -> name of column $order -> desc or acs
     *
     * @param string $column
     * @param string $order
     */
	public function GetKeysOrderBy($column, $order){
		$keys = array(); $i = 0;
		$result = $this->connection->RunQuery("SELECT idAdmin from admin order by $column $order");
			while($row = $result->fetch_array(MYSQLI_ASSOC)){
				$keys[$i] = $row["idAdmin"];
				$i++;
			}
	return $keys;
	}

	/**
	 * @return idAdmin - int(11)
	 */
	public function getidAdmin(){
		return $this->idAdmin;
	}

	/**
	 * @return nomAdmin - varchar(100)
	 */
	public function getnomAdmin(){
		return $this->nomAdmin;
	}

	/**
	 * @return mailAdmin - varchar(100)
	 */
	public function getmailAdmin(){
		return $this->mailAdmin;
	}

	/**
	 * @return pwdAdmin - varchar(500)
	 */
	public function getpwdAdmin(){
		return $this->pwdAdmin;
	}

	/**
	 * @param Type: int(11)
	 */
	public function setidAdmin($idAdmin){
		$this->idAdmin = $idAdmin;
	}

	/**
	 * @param Type: varchar(100)
	 */
	public function setnomAdmin($nomAdmin){
		$this->nomAdmin = $nomAdmin;
	}

	/**
	 * @param Type: varchar(100)
	 */
	public function setmailAdmin($mailAdmin){
		$this->mailAdmin = $mailAdmin;
	}

	/**
	 * @param Type: varchar(500)
	 */
	public function setpwdAdmin($pwdAdmin){
		$this->pwdAdmin = $pwdAdmin;
	}

    /**
     * Close mysql connection
     */
	public function endadmin(){
		$this->connection->CloseMysql();
	}

}