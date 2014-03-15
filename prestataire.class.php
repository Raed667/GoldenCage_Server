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

Class prestataire {

	private $idPrest; //int(11)
	private $nomPrest; //varchar(100)
	private $descPrest; //varchar(500)
	private $adrPrest; //varchar(500)
	private $villePrest; //varchar(100)
	private $imgPrest; //varchar(250)
	private $telMobilePrest; //varchar(20)
	private $telFixePrest; //varchar(20)
	private $emailPrest; //varchar(100)
	private $pwdPrest; //varchar(500)
	private $categorie; //varchar(100)
	private $specialite; //varchar(100)
	private $mailValide; //tinyint(1)
	private $compteValide; //tinyint(1)
	private $premium; //tinyint(1)
	private $datePayement; //date
	private $connection;

	public function prestataire(){
		$this->connection = new DataBaseMysql();
	}

    /**
     * New object to the class. Don´t forget to save this new object "as new" by using the function $class->Save_Active_Row_as_New(); 
     *
     */
	public function New_prestataire($nomPrest,$descPrest,$adrPrest,$villePrest,$imgPrest,$telMobilePrest,$telFixePrest,$emailPrest,$pwdPrest,$categorie,$specialite,$mailValide,$compteValide,$premium,$datePayement){
		$this->nomPrest = $nomPrest;
		$this->descPrest = $descPrest;
		$this->adrPrest = $adrPrest;
		$this->villePrest = $villePrest;
		$this->imgPrest = $imgPrest;
		$this->telMobilePrest = $telMobilePrest;
		$this->telFixePrest = $telFixePrest;
		$this->emailPrest = $emailPrest;
		$this->pwdPrest = $pwdPrest;
		$this->categorie = $categorie;
		$this->specialite = $specialite;
		$this->mailValide = $mailValide;
		$this->compteValide = $compteValide;
		$this->premium = $premium;
		$this->datePayement = $datePayement;
	}

    /**
     * Load one row into var_class. To use the vars use for exemple echo $class->getVar_name; 
     *
     * @param key_table_type $key_row
     * 
     */
	public function Load_from_key($key_row){
		$result = $this->connection->RunQuery("Select * from prestataire where idPrest = \"$key_row\" ");
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			$this->idPrest = $row["idPrest"];
			$this->nomPrest = $row["nomPrest"];
			$this->descPrest = $row["descPrest"];
			$this->adrPrest = $row["adrPrest"];
			$this->villePrest = $row["villePrest"];
			$this->imgPrest = $row["imgPrest"];
			$this->telMobilePrest = $row["telMobilePrest"];
			$this->telFixePrest = $row["telFixePrest"];
			$this->emailPrest = $row["emailPrest"];
			$this->pwdPrest = $row["pwdPrest"];
			$this->categorie = $row["categorie"];
			$this->specialite = $row["specialite"];
			$this->mailValide = $row["mailValide"];
			$this->compteValide = $row["compteValide"];
			$this->premium = $row["premium"];
			$this->datePayement = $row["datePayement"];
		}
	}

    /**
     * Delete the row by using the key as arg
     *
     * @param key_table_type $key_row
     *
     */
	public function Delete_row_from_key($key_row){
		$this->connection->RunQuery("DELETE FROM prestataire WHERE idPrest = $key_row");
	}

    /**
     * Update the active row table on table
     */
	public function Save_Active_Row(){
		$this->connection->RunQuery("UPDATE prestataire set nomPrest = \"$this->nomPrest\", descPrest = \"$this->descPrest\", adrPrest = \"$this->adrPrest\", villePrest = \"$this->villePrest\", imgPrest = \"$this->imgPrest\", telMobilePrest = \"$this->telMobilePrest\", telFixePrest = \"$this->telFixePrest\", emailPrest = \"$this->emailPrest\", pwdPrest = \"$this->pwdPrest\", categorie = \"$this->categorie\", specialite = \"$this->specialite\", mailValide = \"$this->mailValide\", compteValide = \"$this->compteValide\", premium = \"$this->premium\", datePayement = \"$this->datePayement\" where idPrest = \"$this->idPrest\"");
	}

    /**
     * Save the active var class as a new row on table
     */
	public function Save_Active_Row_as_New(){
		$this->connection->RunQuery("Insert into prestataire (nomPrest, descPrest, adrPrest, villePrest, imgPrest, telMobilePrest, telFixePrest, emailPrest, pwdPrest, categorie, specialite, mailValide, compteValide, premium, datePayement) values (\"$this->nomPrest\", \"$this->descPrest\", \"$this->adrPrest\", \"$this->villePrest\", \"$this->imgPrest\", \"$this->telMobilePrest\", \"$this->telFixePrest\", \"$this->emailPrest\", \"$this->pwdPrest\", \"$this->categorie\", \"$this->specialite\", \"$this->mailValide\", \"$this->compteValide\", \"$this->premium\", \"$this->datePayement\")");
	}

    /**
     * Returns array of keys order by $column -> name of column $order -> desc or acs
     *
     * @param string $column
     * @param string $order
     */
	public function GetKeysOrderBy($column, $order){
		$keys = array(); $i = 0;
		$result = $this->connection->RunQuery("SELECT idPrest from prestataire order by $column $order");
			while($row = $result->fetch_array(MYSQLI_ASSOC)){
				$keys[$i] = $row["idPrest"];
				$i++;
			}
	return $keys;
	}

	/**
	 * @return idPrest - int(11)
	 */
	public function getidPrest(){
		return $this->idPrest;
	}

	/**
	 * @return nomPrest - varchar(100)
	 */
	public function getnomPrest(){
		return $this->nomPrest;
	}

	/**
	 * @return descPrest - varchar(500)
	 */
	public function getdescPrest(){
		return $this->descPrest;
	}

	/**
	 * @return adrPrest - varchar(500)
	 */
	public function getadrPrest(){
		return $this->adrPrest;
	}

	/**
	 * @return villePrest - varchar(100)
	 */
	public function getvillePrest(){
		return $this->villePrest;
	}

	/**
	 * @return imgPrest - varchar(250)
	 */
	public function getimgPrest(){
		return $this->imgPrest;
	}

	/**
	 * @return telMobilePrest - varchar(20)
	 */
	public function gettelMobilePrest(){
		return $this->telMobilePrest;
	}

	/**
	 * @return telFixePrest - varchar(20)
	 */
	public function gettelFixePrest(){
		return $this->telFixePrest;
	}

	/**
	 * @return emailPrest - varchar(100)
	 */
	public function getemailPrest(){
		return $this->emailPrest;
	}

	/**
	 * @return pwdPrest - varchar(500)
	 */
	public function getpwdPrest(){
		return $this->pwdPrest;
	}

	/**
	 * @return categorie - varchar(100)
	 */
	public function getcategorie(){
		return $this->categorie;
	}

	/**
	 * @return specialite - varchar(100)
	 */
	public function getspecialite(){
		return $this->specialite;
	}

	/**
	 * @return mailValide - tinyint(1)
	 */
	public function getmailValide(){
		return $this->mailValide;
	}

	/**
	 * @return compteValide - tinyint(1)
	 */
	public function getcompteValide(){
		return $this->compteValide;
	}

	/**
	 * @return premium - tinyint(1)
	 */
	public function getpremium(){
		return $this->premium;
	}

	/**
	 * @return datePayement - date
	 */
	public function getdatePayement(){
		return $this->datePayement;
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
	public function setnomPrest($nomPrest){
		$this->nomPrest = $nomPrest;
	}

	/**
	 * @param Type: varchar(500)
	 */
	public function setdescPrest($descPrest){
		$this->descPrest = $descPrest;
	}

	/**
	 * @param Type: varchar(500)
	 */
	public function setadrPrest($adrPrest){
		$this->adrPrest = $adrPrest;
	}

	/**
	 * @param Type: varchar(100)
	 */
	public function setvillePrest($villePrest){
		$this->villePrest = $villePrest;
	}

	/**
	 * @param Type: varchar(250)
	 */
	public function setimgPrest($imgPrest){
		$this->imgPrest = $imgPrest;
	}

	/**
	 * @param Type: varchar(20)
	 */
	public function settelMobilePrest($telMobilePrest){
		$this->telMobilePrest = $telMobilePrest;
	}

	/**
	 * @param Type: varchar(20)
	 */
	public function settelFixePrest($telFixePrest){
		$this->telFixePrest = $telFixePrest;
	}

	/**
	 * @param Type: varchar(100)
	 */
	public function setemailPrest($emailPrest){
		$this->emailPrest = $emailPrest;
	}

	/**
	 * @param Type: varchar(500)
	 */
	public function setpwdPrest($pwdPrest){
		$this->pwdPrest = $pwdPrest;
	}

	/**
	 * @param Type: varchar(100)
	 */
	public function setcategorie($categorie){
		$this->categorie = $categorie;
	}

	/**
	 * @param Type: varchar(100)
	 */
	public function setspecialite($specialite){
		$this->specialite = $specialite;
	}

	/**
	 * @param Type: tinyint(1)
	 */
	public function setmailValide($mailValide){
		$this->mailValide = $mailValide;
	}

	/**
	 * @param Type: tinyint(1)
	 */
	public function setcompteValide($compteValide){
		$this->compteValide = $compteValide;
	}

	/**
	 * @param Type: tinyint(1)
	 */
	public function setpremium($premium){
		$this->premium = $premium;
	}

	/**
	 * @param Type: date
	 */
	public function setdatePayement($datePayement){
		$this->datePayement = $datePayement;
	}

    /**
     * Close mysql connection
     */
	public function endprestataire(){
		$this->connection->CloseMysql();
	}

}