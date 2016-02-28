<?php
/**
 *  Controls the application
 */
class ProductController extends ProductView {

    //! A constructor.
    /**
    * Constucts a new ProductController object
    * @param $model an instance of the ProductModel class
    * @param $getvars the incoming HTTP GET method variables
    */
    function ProductController ( $model, $getvars=null ) {
        ProductView::ProductView($model);
        $this->header();
        switch ( $getvars['view'] ) {
            case "product":
                $this->productItem($getvars['id']);
                break;
            default:
                if ( empty ($getvars['rownum']) ) {
                    $this->productTable();
                } else {
                    $this->productTable($getvars['rownum']);
                }
                break;
        }
        $this->footer();
    }
}
?>