<?php
class Connection{
    static private $instance = NULL;
    public $Link = NULL;
    public $Lnk = NULL;
    public $resultSet = NULL;
    public $resultSetB = NULL;
    public $rstSet = NULL;
    public $rsltSet = NULL;
    
    private function __construct(){
        $this->Link = @mysql_pconnect("localhost", "aquolity_root", "Infinito2015");
        if(!$this->Link) throw new Exception("Could not connect to server: ".$this->error());
        if(!mysql_select_db("aquolity_itech", $this->Link)) throw new Exception("Could not connect to database: ".$this->error());
        $this->query("SET NAMES utf8");
    }
    /*
    private function __construct(){
        $this->Link = @mysql_pconnect("localhost", "root", "");
        if(!$this->Link) throw new Exception("Could not connect to server: ".$this->error());
        if(!mysql_select_db("vmall", $this->Link)) throw new Exception("Could not connect to database: ".$this->error());
        $this->query("SET NAMES utf8");
    }*/
    
    static public function getInstance(){
        if(self::$instance == NULL) self::$instance = new Connection();
        return self::$instance;
    }

    function error(){
        return mysql_error();
    }

    function scape($string){
        return mysql_real_escape_string($string);
    }

    function query($query, $save = true){
        $resultSet = mysql_query($query, $this->Link) or die("Invalid Query: ".$this->error());
        if($save) $this->resultSet = $resultSet;
        return $resultSet;
    }

    function insert_id(){
        return mysql_insert_id($this->Link);
    }

    function fetch($resultSet = ""){
        if(empty($resultSet)) $resultSet = $this->resultSet;
        return mysql_fetch_array($resultSet);
    }

    function result($field){
        if($this->numrows()) return mysql_result($this->resultSet, 0, $field);
    }

    function queryB($queryB, $saveB = true){
        $resultSetB = mysql_query($queryB, $this->Link) or die("Invalid Query: ".$this->error());
        if($saveB) $this->resultSetB = $resultSetB;
        return $resultSetB;
    }

    function fetchB($resultSetB = ""){
        if(empty($resultSetB)) $resultSetB = $this->resultSetB;
        return mysql_fetch_array($resultSetB);
    }

    function resultB($fieldB){
        if($this->numrows()) return mysql_result($this->resultSetB, 0, $fieldB);
    }
    
    function qry($qry, $save = true){
        $rstSet = mysql_query($qry, $this->Link) or die("Invalid Query: ".$this->error());
        if($save) $this->rstSet = $rstSet;
        return $rstSet;
    }

    function fch($rstSet = ""){
        if(empty($rstSet)) $rstSet = $this->rstSet;
        return mysql_fetch_array($rstSet);
    }

    function rst($fld){
        if($this->numrows()) return mysql_result($this->rstSet, 0, $fld);
    }

    function qury($qury, $save = true){
        $rsltSet = mysql_query($qury, $this->Link) or die("Invalid Query: ".$this->error());
        if($save) $this->rsltSet = $rsltSet;
        return $rsltSet;
    }

    function ftch($rsltSet = ""){
        if(empty($rsltSet)) $rsltSet = $this->rsltSet;
        return mysql_fetch_array($rsltSet);
    }

    function rslt($feld){
        if($this->numrows()) return mysql_result($this->rsltSet, 0, $feld);
    }
    
    function numrows(){
        return mysql_num_rows($this->resultSet);
    }

    function getField($query){
        $resultSet = $this->query($query, false);
        return ($row = $this->fetch($resultSet)) ? $row[0] : '';
    }

    function __destruct(){
        mysql_close($this->Link);
    }
}
?>