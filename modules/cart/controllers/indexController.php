<?php 
    function construct() {
        load_model('index');
    }
    function indexAction() {
        load_view('index');
    }

    function payAction() {
        load_view('pay');
    }


    function infoAction() {
        $total_price = 0;
        $total_num_order = 0;
        if(isset($_SESSION['cart'])) {
            foreach($_SESSION['cart']['buy'] as $value) {
                $total_price += $value['into_money'];
                $total_num_order += $value['quantity'];
            }

            $_SESSION['cart']['info'] = [
                'total_price' => $total_price,
                'total_num_order' => $total_num_order,
            ];
        }
    }

    function addAction() {
        if(isset($_POST['id'])) {
            $id = $_POST['id'];
        }

        $value = getProductById($id);

        $quantity = isset($_POST['num-order']) ? $_POST['num-order'] : 1;

        if(isset($_SESSION['cart']['buy'][$id])) {
            $quantity = $_SESSION['cart']['buy'][$id]['quantity'] += $quantity;
        }

        if($value) {
            $result = [
                'id' => $value['id'],
                'code' => $value['code'],
                'name' => $value['name'],
                'img' => $value['img'],
                'des' => $value['des'],
                'content' => $value['content'],
                'price' => $value['price'],
                'quantity' => $quantity,
                'into_money' => $value['price'] * $quantity,
                'base_url' => "?mod=cart&action=detail&id={$value['id']}",
            ];
        }

        $_SESSION['cart']['buy'][$id] = $result;
        infoAction();
        load_view('index');
    }


    function addNowAction() {
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
        }

        $value = getProductById($id);
        $quantity = 1;
        if(isset($_SESSION['cart']['buy'][$id])) {
            $quantity = $_SESSION['cart']['buy'][$id]['quantity'] += $quantity;
        }
        if($value) {
            $result = [
                'id' => $value['id'],
                'code' => $value['code'],
                'name' => $value['name'],
                'img' => $value['img'],
                'des' => $value['des'],
                'content' => $value['content'],
                'price' => $value['price'],
                'quantity' => $quantity,
                'into_money' => $value['price'] * $quantity,
                'base_url' => "?mod=cart&action=detail&id={$value['id']}",
            ];
            $_SESSION['cart']['buy'][$id] = $result;
        }
        infoAction();
        header("location: ?mod=products&action=index");
    }

    function updateAction() {
        if(isset($_POST)) {
            $data = $_POST;
        }
        foreach($data['id'] as $key => $id){
            $quantity = $data['num-order'][$key];
            $get_price = getProductById($id);

            $_SESSION['cart']['buy'][$id]['quantity'] = $quantity;
            $_SESSION['cart']['buy'][$id]['into_money'] = $_SESSION['cart']['buy'][$id]['price'] * $quantity;
        }
        infoAction();
        load_view('index');
    }

    function deleteAction() {
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
        }
        unset($_SESSION['cart']['buy'][$id]);
        infoAction();
        load_view('index');
    }
    function removeAction() {
        if(isset($_SESSION['cart'])) {
            session_destroy();
            header("location: ?mod=cart&action=index");
            load_view('index');
        }
        
    }
?>