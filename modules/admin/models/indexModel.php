<?php 

    function get_all_products() {
        return db_fetch_array("select * from products");
    }

    function get_name_region_by_id($region_id) {
        return db_fetch_row("SELECT region_name  FROM `regions` where `id` = {$region_id}");
    }

    function get_product_by_id($id) {
        return db_fetch_row("SELECT * FROM `products` where `id` = {$id}");
    }

    function limitProductAdmin($limit, $offset) {
        return db_fetch_array("select * from products LIMIT {$limit} OFFSET {$offset}");
    }

    function totalProduct() {
        return db_num_rows("select * from products");
    }

    function searchProductAdmin($name) {
        return db_fetch_array("select * from products where name LIKE '%{$name}%'");
    }

    function getUsers() {
        return db_fetch_array("select * from users where permission = 'user'");
    }

    function getAdmin($id) {
        return db_fetch_row("select * from users where permission = 'admin' and id_user = '{$id}'");
    }