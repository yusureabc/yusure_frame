<?php
/**
 *  Fetches "products" from the database
 */
class ProductModel {
    /**
    * Private
    * $dao an instance of the DataAccess class
    */
    var $dao;

    //! A constructor.
    /**
    * Constucts a new ProductModel object
    * @param $dbobject an instance of the DataAccess class
    */
    function ProductModel ( $dao ) {
        $this->dao = $dao;
    }

    //! A manipulator
    /**
    * Tells the $dboject to store this query as a resource
    * @param $start the row to start from
    * @param $rows the number of rows to fetch
    * @return void
    */
    function listProducts($start=1,$rows=50) {
        $this->dao->fetch("SELECT * FROM products LIMIT ".$start.", ".$rows);
    }

    //! A manipulator
    /**
    * Tells the $dboject to store this query as a resource
    * @param $id a primary key for a row
    * @return void
    */
    function listProduct($id) {
        $this->dao->fetch("SELECT * FROM products WHERE PRODUCTID='".$id."'");
    }

    //! A manipulator
    /**
    * Fetches a product as an associative array from the $dbobject
    * @return mixed
    */
    function getProduct() {
        if ( $product=$this->dao->getRow() )
            return $product;
        else
            return false;
    }
}
?>