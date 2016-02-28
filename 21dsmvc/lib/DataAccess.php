<?php
/**
 *  A simple class for querying MySQL
 */
class DataAccess {
    /**
    * Private
    * $db stores a database resource
    */
    var $db;
    /**
    * Private
    * $query stores a query resource
    */
    var $query; // Query resource

    //! A constructor.
    /**
    * Constucts a new DataAccess object
    * @param $host string hostname for dbserver
    * @param $user string dbserver user
    * @param $pass string dbserver user password
    * @param $db string database name
    */
    function DataAccess ($host,$user,$pass,$db) {
        $this->db=mysql_pconnect($host,$user,$pass);
        mysql_select_db($db,$this->db);
        mysql_query( 'set names utf8' );
    }

    //! An accessor
    /**
    * Fetches a query resources and stores it in a local member
    * @param $sql string the database query to run
    * @return void
    */
    function fetch($sql) {
        $this->query=mysql_unbuffered_query($sql,$this->db); // Perform query here
    }

    //! An accessor
    /**
    * Returns an associative array of a query row
    * @return mixed
    */
    function getRow () {
        if ( $row=mysql_fetch_array($this->query,MYSQL_ASSOC) )
            return $row;
        else
            return false;
    }
}
?>