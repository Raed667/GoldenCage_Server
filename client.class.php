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

Class client {

	private $idClient; //int(11)
	private $prenomMari; //varchar(100)
	private $prenomEpouse; //varchar(100)
	private $nomDeFamille; //varchar(100)
	private $imgClient; //varchar(250)
	private $emailClient; //varchar(100)
	private $pwdClient; //varchar(500)
	private $cmptValide; //tinyint(1)
	private $villeClient; //varchar(100)
	private $telClient; //varchar(20)
	private $dateDebut; //date
	private $dateFin; //date
	private $budget; //double
	private $connection;

	public function client(){
		$this->connection = new DataBaseMysql();
	}

    /**
     * New object to the class. Don´t forget to save this new object "as new" by using the function $class->Save_Active_Row_as_New(); 
     *
     */
	public function New_client($prenomMari,$prenomEpouse,$nomDeFamille,$imgClient,$emailClient,$pwdClient,$cmptValide,$villeClient,$telClient,$dateDebut,$dateFin,$budget){
		$this->prenomMari = $prenomMari;
		$this->prenomEpouse = $prenomEpouse;
		$this->nomDeFamille = $nomDeFamille;
		$this->imgClient = $imgClient;
		$this->emailClient = $emailClient;
		$this->pwdClient = $pwdClient;
		$this->cmptValide = $cmptValide;
		$this->villeClient = $villeClient;
		$this->telClient = $telClient;
		$this->dateDebut = $dateDebut;
		$this->dateFin = $dateFin;
		$this->budget = $budget;
	}

    /**
     * Load one row into var_class. To use the vars use for exemple echo $class->getVar_name; 
     *
     * @param key_table_type $key_row
     * 
     */
	public function Load_from_key($key_row){
		$result = $this->connection->RunQuery("Select * from client where idClient = \"$key_row\" ");
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			$this->idClient = $row["idClient"];
			$this->prenomMari = $row["prenomMari"];
			$this->prenomEpouse = $row["prenomEpouse"];
			$this->nomDeFamille = $row["nomDeFamille"];
			$this->imgClient = $row["imgClient"];
			$this->emailClient = $row["emailClient"];
			$this->pwdClient = $row["pwdClient"];
			$this->cmptValide = $row["cmptValide"];
			$this->villeClient = $row["villeClient"];
			$this->telClient = $row["telClient"];
			$this->dateDebut = $row["dateDebut"];
			$this->dateFin = $row["dateFin"];
			$this->budget = $row["budget"];
		}
	}

    /**
     * Delete the row by using the key as arg
     *
     * @param key_table_type $key_row
     *
     */
	public function Delete_row_from_key($key_row){
		$this->connection->RunQuery("DELETE FROM client WHERE idClient = $key_row");
	}

    /**
     * Update the active row table on table
     */
	public function Save_Active_Row(){
		$this->connection->RunQuery("UPDATE client set prenomMari = \"$this->prenomMari\", prenomEpouse = \"$this->prenomEpouse\", nomDeFamille = \"$this->nomDeFamille\", imgClient = \"$this->imgClient\", emailClient = \"$this->emailClient\", pwdClient = \"$this->pwdClient\", cmptValide = \"$this->cmptValide\", villeClient = \"$this->villeClient\", telClient = \"$this->telClient\", dateDebut = \"$this->dateDebut\", dateFin = \"$this->dateFin\", budget = \"$this->budget\" where idClient = \"$this->idClient\"");
	}

    /**
     * Save the active var class as a new row on table
     */
	public function Save_Active_Row_as_New(){
		$this->connection->RunQuery("Insert into client (prenomMari, prenomEpouse, nomDeFamille, imgClient, emailClient, pwdClient, cmptValide, villeClient, telClient, dateDebut, dateFin, budget) values (\"$this->prenomMari\", \"$this->prenomEpouse\", \"$this->nomDeFamille\", \"$this->imgClient\", \"$this->emailClient\", \"$this->pwdClient\", \"$this->cmptValide\", \"$this->villeClient\", \"$this->telClient\", \"$this->dateDebut\", \"$this->dateFin\", \"$this->budget\")");
	}

    /**
     * Returns array of keys order by $column -> name of column $order -> desc or acs
     *
     * @param string $column
     * @param string $order
     */
	public function GetKeysOrderBy($column, $order){
		$keys = array(); $i = 0;
		$result = $this->connection->RunQuery("SELECT idClient from client order by $column $order");
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
	 * @return prenomMari - varchar(100)
	 */
	public function getprenomMari(){
		return $this->prenomMari;
	}

	/**
	 * @return prenomEpouse - varchar(100)
	 */
	public function getprenomEpouse(){
		return $this->prenomEpouse;
	}

	/**
	 * @return nomDeFamille - varchar(100)
	 */
	public function getnomDeFamille(){
		return $this->nomDeFamille;
	}

	/**
	 * @return imgClient - varchar(250)
	 */
	public function getimgClient(){
		return $this->imgClient;
	}

	/**
	 * @return emailClient - varchar(100)
	 */
	public function getemailClient(){
		return $this->emailClient;
	}

	/**
	 * @return pwdClient - varchar(500)
	 */
	public function getpwdClient(){
		return $this->pwdClient;
	}

	/**
	 * @return cmptValide - tinyint(1)
	 */
	public function getcmptValide(){
		return $this->cmptValide;
	}

	/**
	 * @return villeClient - varchar(100)
	 */
	public function getvilleClient(){
		return $this->villeClient;
	}

	/**
	 * @return telClient - varchar(20)
	 */
	public function gettelClient(){
		return $this->telClient;
	}

	/**
	 * @return dateDebut - date
	 */
	public function getdateDebut(){
		return $this->dateDebut;
	}

	/**
	 * @return dateFin - date
	 */
	public function getdateFin(){
		return $this->dateFin;
	}

	/**
	 * @return budget - double
	 */
	public function getbudget(){
		return $this->budget;
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
	public function setprenomMari($prenomMari){
		$this->prenomMari = $prenomMari;
	}

	/**
	 * @param Type: varchar(100)
	 */
	public function setprenomEpouse($prenomEpouse){
		$this->prenomEpouse = $prenomEpouse;
	}

	/**
	 * @param Type: varchar(100)
	 */
	public function setnomDeFamille($nomDeFamille){
		$this->nomDeFamille = $nomDeFamille;
	}

	/**
	 * @param Type: varchar(250)
	 */
	public function setimgClient($imgClient){
		$this->imgClient = $imgClient;
	}

	/**
	 * @param Type: varchar(100)
	 */
	public function setemailClient($emailClient){
		$this->emailClient = $emailClient;
	}

	/**
	 * @param Type: varchar(500)
	 */
	public function setpwdClient($pwdClient){
		$this->pwdClient = $pwdClient;
	}

	/**
	 * @param Type: tinyint(1)
	 */
	public function setcmptValide($cmptValide){
		$this->cmptValide = $cmptValide;
	}

	/**
	 * @param Type: varchar(100)
	 */
	public function setvilleClient($villeClient){
		$this->villeClient = $villeClient;
	}

	/**
	 * @param Type: varchar(20)
	 */
	public function settelClient($telClient){
		$this->telClient = $telClient;
	}

	/**
	 * @param Type: date
	 */
	public function setdateDebut($dateDebut){
		$this->dateDebut = $dateDebut;
	}

	/**
	 * @param Type: date
	 */
	public function setdateFin($dateFin){
		$this->dateFin = $dateFin;
	}

	/**
	 * @param Type: double
	 */
	public function setbudget($budget){
		$this->budget = $budget;
	}

    /**
     * Close mysql connection
     */
	public function endclient(){
		$this->connection->CloseMysql();
	}

}