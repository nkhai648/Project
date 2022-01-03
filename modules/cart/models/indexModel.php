<?php 

    function getProductById($id) {
        return db_fetch_row("select * from products where id = {$id}");
    } 
?>