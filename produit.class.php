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

Class produit {

	private $idProd; //int(11)
	private $idPrest; //int(11)
	private $nomProd; //varchar(100)
	private $descProd; //varchar(5000)
	private $shortDescProd; //varchar(200)
	private $categorieProd; //varchar(100)
	private $dateAjoutProd; //date
	private $prixProd; //double
	private $exclusifPaquet; //tinyint(1)
	private $imgProd_P; //varchar(250)
	private $imgProd_1; //varchar(250)
	private $imgProd_2; //varchar(250)
	private $imgProd_3; //varchar(250)
	private $imgProd_4; //varchar(250)
	private $connection;

	public function produit(){
		$this->connection = new DataBaseMysql();
	}

    /**
     * New object to the class. Don´t forget to save this new object "as new" by using the function $class->Save_Active_Row_as_New(); 
     *
     */
	public function New_produit($idPrest,$nomProd,$descProd,$shortDescProd,$categorieProd,$dateAjoutProd,$prixProd,$exclusifPaquet,$imgProd_P,$imgProd_1,$imgProd_2,$imgProd_3,$imgProd_4){
		$this->idPrest = $idPrest;
		$this->nomProd = $nomProd;
		$this->descProd = $descProd;
		$this->shortDescProd = $shortDescProd;
		$this->categorieProd = $categorieProd;
		$this->dateAjoutProd = $dateAjoutProd;
		$this->prixProd = $prixProd;
		$this->exclusifPaquet = $exclusifPaquet;
		$this->imgProd_P = $imgProd_P;
		$this->imgProd_1 = $imgProd_1;
		$this->imgProd_2 = $imgProd_2;
		$this->imgProd_3 = $imgProd_3;
		$this->imgProd_4 = $imgProd_4;
	}

    /**
     * Load one row into var_class. To use the vars use for exemple echo $class->getVar_name; 
     *
     * @param key_table_type $key_row
     * 
     */
	public function Load_from_key($key_row){
		$result = $this->connection->RunQuery("Select * from produit where idProd = \"$key_row\" ");
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			$this->idProd = $row["idProd"];
			$this->idPrest = $row["idPrest"];
			$this->nomProd = $row["nomProd"];
			$this->descProd = $row["descProd"];
			$this->shortDescProd = $row["shortDescProd"];
			$this->categorieProd = $row["categorieProd"];
			$this->dateAjoutProd = $row["dateAjoutProd"];
			$this->prixProd = $row["prixProd"];
			$this->exclusifPaquet = $row["exclusifPaquet"];
			$this->imgProd_P = $row["imgProd_P"];
			$this->imgProd_1 = $row["imgProd_1"];
			$this->imgProd_2 = $row["imgProd_2"];
			$this->imgProd_3 = $row["imgProd_3"];
			$this->imgProd_4 = $row["imgProd_4"];
		}
	}

    /**
     * Delete the row by using the key as arg
     *
     * @param key_table_type $key_row
     *
     */
	public function Delete_row_from_key($key_row){
		$this->connection->RunQuery("DELETE FROM produit WHERE idProd = $key_row");
	}

    /**
     * Update the active row table on table
     */
	public function Save_Active_Row(){
		$this->connection->RunQuery("UPDATE produit set idPrest = \"$this->idPrest\", nomProd = \"$this->nomProd\", descProd = \"$this->descProd\", shortDescProd = \"$this->shortDescProd\", categorieProd = \"$this->categorieProd\", dateAjoutProd = \"$this->dateAjoutProd\", prixProd = \"$this->prixProd\", exclusifPaquet = \"$this->exclusifPaquet\", imgProd_P = \"$this->imgProd_P\", imgProd_1 = \"$this->imgProd_1\", imgProd_2 = \"$this->imgProd_2\", imgProd_3 = \"$this->imgProd_3\", imgProd_4 = \"$this->imgProd_4\" where idProd = \"$this->idProd\"");
	}

    /**
     * Save the active var class as a new row on table
     */
	public function Save_Active_Row_as_New(){
		$this->connection->RunQuery("Insert into produit (idPrest, nomProd, descProd, shortDescProd, categorieProd, dateAjoutProd, prixProd, exclusifPaquet, imgProd_P, imgProd_1, imgProd_2, imgProd_3, imgProd_4) values (\"$this->idPrest\", \"$this->nomProd\", \"$this->descProd\", \"$this->shortDescProd\", \"$this->categorieProd\", \"$this->dateAjoutProd\", \"$this->prixProd\", \"$this->exclusifPaquet\", \"$this->imgProd_P\", \"$this->imgProd_1\", \"$this->imgProd_2\", \"$this->imgProd_3\", \"$this->imgProd_4\")");
	}

    /**
     * Returns array of keys order by $column -> name of column $order -> desc or acs
     *
     * @param string $column
     * @param string $order
     */
	public function GetKeysOrderBy($column, $order){
		$keys = array(); $i = 0;
		$result = $this->connection->RunQuery("SELECT idProd from produit order by $column $order");
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
	 * @return idPrest - int(11)
	 */
	public function getidPrest(){
		return $this->idPrest;
	}

	/**
	 * @return nomProd - varchar(100)
	 */
	public function getnomProd(){
		return $this->nomProd;
	}

	/**
	 * @return descProd - varchar(5000)
	 */
	public function getdescProd(){
		return $this->descProd;
	}

	/**
	 * @return shortDescProd - varchar(200)
	 */
	public function getshortDescProd(){
		return $this->shortDescProd;
	}

	/**
	 * @return categorieProd - varchar(100)
	 */
	public function getcategorieProd(){
		return $this->categorieProd;
	}

	/**
	 * @return dateAjoutProd - date
	 */
	public function getdateAjoutProd(){
		return $this->dateAjoutProd;
	}

	/**
	 * @return prixProd - double
	 */
	public function getprixProd(){
		return $this->prixProd;
	}

	/**
	 * @return exclusifPaquet - tinyint(1)
	 */
	public function getexclusifPaquet(){
		return $this->exclusifPaquet;
	}

	/**
	 * @return imgProd_P - varchar(250)
	 */
	public function getimgProd_P(){
		return $this->imgProd_P;
	}

	/**
	 * @return imgProd_1 - varchar(250)
	 */
	public function getimgProd_1(){
		return $this->imgProd_1;
	}

	/**
	 * @return imgProd_2 - varchar(250)
	 */
	public function getimgProd_2(){
		return $this->imgProd_2;
	}

	/**
	 * @return imgProd_3 - varchar(250)
	 */
	public function getimgProd_3(){
		return $this->imgProd_3;
	}

	/**
	 * @return imgProd_4 - varchar(250)
	 */
	public function getimgProd_4(){
		return $this->imgProd_4;
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
	public function setidPrest($idPrest){
		$this->idPrest = $idPrest;
	}

	/**
	 * @param Type: varchar(100)
	 */
	public function setnomProd($nomProd){
		$this->nomProd = $nomProd;
	}

	/**
	 * @param Type: varchar(5000)
	 */
	public function setdescProd($descProd){
		$this->descProd = $descProd;
	}

	/**
	 * @param Type: varchar(200)
	 */
	public function setshortDescProd($shortDescProd){
		$this->shortDescProd = $shortDescProd;
	}

	/**
	 * @param Type: varchar(100)
	 */
	public function setcategorieProd($categorieProd){
		$this->categorieProd = $categorieProd;
	}

	/**
	 * @param Type: date
	 */
	public function setdateAjoutProd($dateAjoutProd){
		$this->dateAjoutProd = $dateAjoutProd;
	}

	/**
	 * @param Type: double
	 */
	public function setprixProd($prixProd){
		$this->prixProd = $prixProd;
	}

	/**
	 * @param Type: tinyint(1)
	 */
	public function setexclusifPaquet($exclusifPaquet){
		$this->exclusifPaquet = $exclusifPaquet;
	}

	/**
	 * @param Type: varchar(250)
	 */
	public function setimgProd_P($imgProd_P){
		$this->imgProd_P = $imgProd_P;
	}

	/**
	 * @param Type: varchar(250)
	 */
	public function setimgProd_1($imgProd_1){
		$this->imgProd_1 = $imgProd_1;
	}

	/**
	 * @param Type: varchar(250)
	 */
	public function setimgProd_2($imgProd_2){
		$this->imgProd_2 = $imgProd_2;
	}

	/**
	 * @param Type: varchar(250)
	 */
	public function setimgProd_3($imgProd_3){
		$this->imgProd_3 = $imgProd_3;
	}

	/**
	 * @param Type: varchar(250)
	 */
	public function setimgProd_4($imgProd_4){
		$this->imgProd_4 = $imgProd_4;
	}

    /**
     * Close mysql connection
     */
	public function endproduit(){
		$this->connection->CloseMysql();
	}

}