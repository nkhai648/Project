<?php 

    function get_products() {
        return db_fetch_array("select * from products");
    }
    
    function getProductById($id) {
        return db_fetch_row("select * from products where id = {$id}");
    }

    function get_num_product() {
        return db_num_rows("select * from products");
    }

    function get_num_product_by_region($id) {
        return db_num_rows("select * from products where region_id = {$id}");

    }

    function get_regions() {
        return db_fetch_array("select * from regions");
    }

    function limitAllProducts($limit, $offset) {
        return db_query("select * from products LIMIT ".$limit." OFFSET ".$offset);
    }


    function getProductsByRegion($id) {
        return db_fetch_array("select * from products where region_id = {$id} ");
    }


    function limitProductsByRegion($id, $limit, $offset) {
        return db_fetch_array("select * from products where region_id = {$id} LIMIT ".$limit. " OFFSET ".$offset );
    }

    function searchProduct($name) {
        return db_fetch_array("select * from products where name LIKE '%{$name}%'");
    }
?>