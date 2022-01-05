<?php 

    function getProductById($id) {
        return db_fetch_row("select * from products where id = {$id}");
    } 

    function limitProductAtCart($limit, $offset) {
        return db_fetch_array("select * from products where at_cart = 1 LIMIT {$limit} OFFSET {$offset}");
    }

    function getNumProductByAtCart() {
        return db_num_rows("select * from products where at_cart = 1");
    }

    function updateAtCart($table, $data, $where) {
        return db_update($table, $data, $where);
    }

?>