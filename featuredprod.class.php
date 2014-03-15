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

Class featuredprod {

	private $idFeat; //int(11)
	private $dateFeat; //date
	private $widget; //varchar(100)
	private $idProd; //int(11)
	private $connection;

	public function featuredprod(){
		$this->connection = new DataBaseMysql();
	}

    /**
     * New object to the class. Don´t forget to save this new object "as new" by using the function $class->Save_Active_Row_as_New(); 
     *
     */
	public function New_featuredprod($dateFeat,$widget,$idProd){
		$this->dateFeat = $dateFeat;
		$this->widget = $widget;
		$this->idProd = $idProd;
	}

    /**
     * Load one row into var_class. To use the vars use for exemple echo $class->getVar_name; 
     *
     * @param key_table_type $key_row
     * 
     */
	public function Load_from_key($key_row){
		$result = $this->connection->RunQuery("Select * from featuredprod where idFeat = \"$key_row\" ");
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			$this->idFeat = $row["idFeat"];
			$this->dateFeat = $row["dateFeat"];
			$this->widget = $row["widget"];
			$this->idProd = $row["idProd"];
		}
	}

    /**
     * Delete the row by using the key as arg
     *
     * @param key_table_type $key_row
     *
     */
	public function Delete_row_from_key($key_row){
		$this->connection->RunQuery("DELETE FROM featuredprod WHERE idFeat = $key_row");
	}

    /**
     * Update the active row table on table
     */
	public function Save_Active_Row(){
		$this->connection->RunQuery("UPDATE featuredprod set dateFeat = \"$this->dateFeat\", widget = \"$this->widget\", idProd = \"$this->idProd\" where idFeat = \"$this->idFeat\"");
	}

    /**
     * Save the active var class as a new row on table
     */
	public function Save_Active_Row_as_New(){
		$this->connection->RunQuery("Insert into featuredprod (dateFeat, widget, idProd) values (\"$this->dateFeat\", \"$this->widget\", \"$this->idProd\")");
	}

    /**
     * Returns array of keys order by $column -> name of column $order -> desc or acs
     *
     * @param string $column
     * @param string $order
     */
	public function GetKeysOrderBy($column, $order){
		$keys = array(); $i = 0;
		$result = $this->connection->RunQuery("SELECT idFeat from featuredprod order by $column $order");
			while($row = $result->fetch_array(MYSQLI_ASSOC)){
				$keys[$i] = $row["idFeat"];
				$i++;
			}
	return $keys;
	}

	/**
	 * @return idFeat - int(11)
	 */
	public function getidFeat(){
		return $this->idFeat;
	}

	/**
	 * @return dateFeat - date
	 */
	public function getdateFeat(){
		return $this->dateFeat;
	}

	/**
	 * @return widget - varchar(100)
	 */
	public function getwidget(){
		return $this->widget;
	}

	/**
	 * @return idProd - int(11)
	 */
	public function getidProd(){
		return $this->idProd;
	}

	/**
	 * @param Type: int(11)
	 */
	public function setidFeat($idFeat){
		$this->idFeat = $idFeat;
	}

	/**
	 * @param Type: date
	 */
	public function setdateFeat($dateFeat){
		$this->dateFeat = $dateFeat;
	}

	/**
	 * @param Type: varchar(100)
	 */
	public function setwidget($widget){
		$this->widget = $widget;
	}

	/**
	 * @param Type: int(11)
	 */
	public function setidProd($idProd){
		$this->idProd = $idProd;
	}

    /**
     * Close mysql connection
     */
	public function endfeaturedprod(){
		$this->connection->CloseMysql();
	}

}