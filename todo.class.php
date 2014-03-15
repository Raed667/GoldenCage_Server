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

Class todo {

	private $idToDo; //int(11)
	private $idClient; //int(11)
	private $titreToDo; //varchar(100)
	private $descToDo; //varchar(200)
	private $dateToDo; //datetime
	private $labelUrgent; //tinyint(1)
	private $labelRDV; //tinyint(1)
	private $labelPayement; //tinyint(1)
	private $connection;

	public function todo(){
		$this->connection = new DataBaseMysql();
	}

    /**
     * New object to the class. Don´t forget to save this new object "as new" by using the function $class->Save_Active_Row_as_New(); 
     *
     */
	public function New_todo($idClient,$titreToDo,$descToDo,$dateToDo,$labelUrgent,$labelRDV,$labelPayement){
		$this->idClient = $idClient;
		$this->titreToDo = $titreToDo;
		$this->descToDo = $descToDo;
		$this->dateToDo = $dateToDo;
		$this->labelUrgent = $labelUrgent;
		$this->labelRDV = $labelRDV;
		$this->labelPayement = $labelPayement;
	}

    /**
     * Load one row into var_class. To use the vars use for exemple echo $class->getVar_name; 
     *
     * @param key_table_type $key_row
     * 
     */
	public function Load_from_key($key_row){
		$result = $this->connection->RunQuery("Select * from todo where idToDo = \"$key_row\" ");
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			$this->idToDo = $row["idToDo"];
			$this->idClient = $row["idClient"];
			$this->titreToDo = $row["titreToDo"];
			$this->descToDo = $row["descToDo"];
			$this->dateToDo = $row["dateToDo"];
			$this->labelUrgent = $row["labelUrgent"];
			$this->labelRDV = $row["labelRDV"];
			$this->labelPayement = $row["labelPayement"];
		}
	}

    /**
     * Delete the row by using the key as arg
     *
     * @param key_table_type $key_row
     *
     */
	public function Delete_row_from_key($key_row){
		$this->connection->RunQuery("DELETE FROM todo WHERE idToDo = $key_row");
	}

    /**
     * Update the active row table on table
     */
	public function Save_Active_Row(){
		$this->connection->RunQuery("UPDATE todo set idClient = \"$this->idClient\", titreToDo = \"$this->titreToDo\", descToDo = \"$this->descToDo\", dateToDo = \"$this->dateToDo\", labelUrgent = \"$this->labelUrgent\", labelRDV = \"$this->labelRDV\", labelPayement = \"$this->labelPayement\" where idToDo = \"$this->idToDo\"");
	}

    /**
     * Save the active var class as a new row on table
     */
	public function Save_Active_Row_as_New(){
		$this->connection->RunQuery("Insert into todo (idClient, titreToDo, descToDo, dateToDo, labelUrgent, labelRDV, labelPayement) values (\"$this->idClient\", \"$this->titreToDo\", \"$this->descToDo\", \"$this->dateToDo\", \"$this->labelUrgent\", \"$this->labelRDV\", \"$this->labelPayement\")");
	}

    /**
     * Returns array of keys order by $column -> name of column $order -> desc or acs
     *
     * @param string $column
     * @param string $order
     */
	public function GetKeysOrderBy($column, $order){
		$keys = array(); $i = 0;
		$result = $this->connection->RunQuery("SELECT idToDo from todo order by $column $order");
			while($row = $result->fetch_array(MYSQLI_ASSOC)){
				$keys[$i] = $row["idToDo"];
				$i++;
			}
	return $keys;
	}

	/**
	 * @return idToDo - int(11)
	 */
	public function getidToDo(){
		return $this->idToDo;
	}

	/**
	 * @return idClient - int(11)
	 */
	public function getidClient(){
		return $this->idClient;
	}

	/**
	 * @return titreToDo - varchar(100)
	 */
	public function gettitreToDo(){
		return $this->titreToDo;
	}

	/**
	 * @return descToDo - varchar(200)
	 */
	public function getdescToDo(){
		return $this->descToDo;
	}

	/**
	 * @return dateToDo - datetime
	 */
	public function getdateToDo(){
		return $this->dateToDo;
	}

	/**
	 * @return labelUrgent - tinyint(1)
	 */
	public function getlabelUrgent(){
		return $this->labelUrgent;
	}

	/**
	 * @return labelRDV - tinyint(1)
	 */
	public function getlabelRDV(){
		return $this->labelRDV;
	}

	/**
	 * @return labelPayement - tinyint(1)
	 */
	public function getlabelPayement(){
		return $this->labelPayement;
	}

	/**
	 * @param Type: int(11)
	 */
	public function setidToDo($idToDo){
		$this->idToDo = $idToDo;
	}

	/**
	 * @param Type: int(11)
	 */
	public function setidClient($idClient){
		$this->idClient = $idClient;
	}

	/**
	 * @param Type: varchar(100)
	 */
	public function settitreToDo($titreToDo){
		$this->titreToDo = $titreToDo;
	}

	/**
	 * @param Type: varchar(200)
	 */
	public function setdescToDo($descToDo){
		$this->descToDo = $descToDo;
	}

	/**
	 * @param Type: datetime
	 */
	public function setdateToDo($dateToDo){
		$this->dateToDo = $dateToDo;
	}

	/**
	 * @param Type: tinyint(1)
	 */
	public function setlabelUrgent($labelUrgent){
		$this->labelUrgent = $labelUrgent;
	}

	/**
	 * @param Type: tinyint(1)
	 */
	public function setlabelRDV($labelRDV){
		$this->labelRDV = $labelRDV;
	}

	/**
	 * @param Type: tinyint(1)
	 */
	public function setlabelPayement($labelPayement){
		$this->labelPayement = $labelPayement;
	}

    /**
     * Close mysql connection
     */
	public function endtodo(){
		$this->connection->CloseMysql();
	}

}