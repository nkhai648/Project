<?php 

    function get_row_user($email, $password) {
        return db_num_rows("select * from users where email = '{$email}' and password = '{$password}'");
    }
    function get_user($email, $password) {
        return db_fetch_row("select * from users where email = '{$email}' and password = '{$password}'");
    }
    function insertUser($table, $data) {
        return db_insert($table, $data);
    }

    function updateUser($table, $data, $where) {
        return db_update($table, $data, $where);
    }

    function checkInvalidUser($email) {
        return db_num_rows("select * from users where email = '{$email}'");
    }

    function updateProfile($table, $data, $where) {
        return db_update($table, $data, $where);
    }

    function getProfileUser($id) {
        return db_fetch_row("select * from users where id_user = {$id}");
    }
?>