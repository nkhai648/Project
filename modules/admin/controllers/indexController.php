<?php 

    function construct() {
        load_model('index');
    }

    function indexAction() {
        // $data['products'] = get_all_products();

        $data['item_per_page'] = isset($_GET['item_per_page']) ? $_GET['item_per_page'] : 7;
        $data['current_page'] = isset($_GET['current_page']) ? $_GET['current_page'] : 1;
        $data['offset'] = ($data['current_page'] - 1) * $data['item_per_page'];
        $data['products'] = limitProductAdmin($data['item_per_page'], $data['offset']);
        $data['total_products'] = totalProduct();
        
        $data['total_page'] = ceil($data['total_products'] / $data['item_per_page']);
        load_view('index', $data);
    }

    function editAction() {
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            $data['get_product'] = get_product_by_id($id);
            load_view('edit', $data);
        }
    }
    function updateAction() {
        if(isset($_POST['save-edit'])) {
            $id = isset($_POST['id']) ? $_POST['id'] : '';
            $name = isset($_POST['name-product']) ? $_POST['name-product'] : '';
            $img = isset($_POST['img-product']) ? $_POST['img-product'] : '';
            $price = isset($_POST['price-product']) ? $_POST['price-product'] : '';
            $des = isset($_POST['des-product']) ? $_POST['des-product'] : '';
            $content = isset($_POST['content-product']) ? $_POST['content-product'] : '';
            $region = isset($_POST['region-option']) ? $_POST['region-option'] : '';

            if(isset($_FILES['file']) && $_FILES['name'] != null) {

                $fileName = $_FILES['file']['name'];
                $fileType = $_FILES['file']['type'];
                $fileError = $_FILES['file']['error'];
                $fileTmp = $_FILES['file']['tmp_name'];
                $fileSize = $_FILES['file']['size'];
                
                $fileExt = explode('.', $fileName);
                $getTypeFile = strtolower(end($fileExt));
                $arrType = array('jpg', 'png', 'jpeg');
                
                if(in_array($getTypeFile, $arrType)) {
                    if($fileError === 0) {
                        if($fileSize < 1000000) {
                            $target = "public/img/".basename($fileName);
                            move_uploaded_file($fileTmp, $target);
                        }else {
                            echo 'Your file is so big!';
                            exit();
                        }
                    }else {
                        echo 'Image error!';
                        exit();
                    }
                    
                }else {
                    echo 'File do not exist! Please try agian!';
                    exit();
                }
                
            }
            $data = [
                'name' => $name, 
                'price' => $price, 
                'img' => $img,
                'des' => $des, 
                'content' => $content, 
                'region_id' => $region
            ];
            $where = 'id = '.$id;
            db_update('products', $data, $where);
            header("location: ?mod=admin&action=edit&id={$id}");
        }
    }

    function addAction() {
        load_view('add');
    }

    function addProductAction() {
        if(isset($_POST['add'])) {
            $name = isset($_POST['name-product']) ? $_POST['name-product'] : '';
            $img = isset($_POST['img-product']) ? $_POST['img-product'] : '';
            $price = isset($_POST['price-product']) ? $_POST['price-product'] : '';
            $des = isset($_POST['des-product']) ? $_POST['des-product'] : '';
            $content = isset($_POST['content-product']) ? $_POST['content-product'] : '';
            $region = isset($_POST['region-option']) ? $_POST['region-option'] : '1';
            if(isset($_FILES['file'])) {
                $fileName = $_FILES['file']['name'];
                $fileSize = $_FILES['file']['size'];
                $fileTmp = $_FILES['file']['tmp_name'];
                $fileError = $_FILES['file']['error'];
                $fileType = $_FILES['file']['type'];
                
                $fileExt = explode('.', $fileName);
                $getTypeFile = strtolower(end($fileExt));
                $arrType = array('jpg', 'png', 'jpeg');
                
                if(in_array($getTypeFile, $arrType)) {
                    if($fileError === 0) {
                        if($fileSize < 3000000) {
                            $target = "public/img/".basename($fileName);
                            move_uploaded_file($fileTmp, $target);
                        }else {
                            echo 'Your file is so big!';
                            exit();
                        }
                    }else {
                        show_array($_FILES);
                        echo 'Image error!';
                        exit();
                    }
                    
                }else {
                    echo 'File do not exist! Please try agian!';
                    exit();
                }
            }
                
            $data = [
                'name' => $name,
                'price' => $price,
                'img' => $img,
                'des' => $des,
                'content' => $content,
                'region_id' => $region
            ];
            db_insert('products', $data);
            header("location: ?mod=admin&action=index");
        }
    } 

    function searchAction() {
        if(isset($_POST['search'])) {
            $name = $_POST['name'];
            
            $data['list_by_name'] = searchProductAdmin($name);
        }
        load_view('index', $data);
    }

    function deleteAction() {
        if($_GET['id']) {
            $id = $_GET['id'];
            $where = 'id = '.$id;
            db_delete('products', $where);
            header("location: ?mod=admin&action=index");
        }
    }

    function logoutAction() {
        unset($_SESSION['admin']);
        header("location: ?mod=user&action=index");
    }


    function managerUserAction() {
        $data['list_users'] = getUsers();
        load_view('managerUser', $data);
    }

    function deleteUserAction() {
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            $where = 'id_user = '.$id;
            db_delete('users', $where);
            header("location: ?mod=admin&action=managerUser");
        }
    }

    function profileAdminAction() {
        if(isset($_SESSION['admin']['id_user'])) {
            $id = $_SESSION['admin']['id_user'];
            $data['get_admin'] = getAdmin($id);
        }
        load_view('profileAdmin', $data);
    }

    function updateProfileAdminAction() {
        if(isset($_POST['save-profile'])) {
            $id = isset($_POST['id-admin']) ? $_POST['id-admin'] : '';
            $img = isset($_POST['img-admin']) ? $_POST['img-admin'] : '';
            $name = isset($_POST['name-admin']) ? $_POST['name-admin'] : '';
            $email = isset($_POST['email-admin']) ? $_POST['email-admin'] : '';
            $password = isset($_POST['password-admin']) ? $_POST['password-admin'] : '';

            if(isset($_FILES)) {
                $fileName = $_FILES['file']['name'];
                $fileSize = $_FILES['file']['size'];
                $fileError = $_FILES['file']['error'];
                $fileTmp = $_FILES['file']['tmp_name'];
                $fileType = $_FILES['file']['type'];

                $fileExt = explode('.', $fileName);
                $getNameType= strtolower(end($fileExt));
                $arrType = array('jpg', 'png', 'jpeg');

                if(in_array($getNameType, $arrType)) {
                    if($fileError == 0) {
                        if($fileSize <= 3000000) {
                            $target = 'public/img/'.basename($fileName);
                            move_uploaded_file($fileTmp, $target);
                        }else {
                            echo 'File is so big!';
                            exit();
                        }
                    }else {
                        echo 'File error!';
                        exit();
                    }
                }else {
                    echo 'File error!';
                    exit();
                }
            }

            $data = [
                'full_name' => $name,
                'img' => $img,
                'email' => $email,
                'password' => $password,
            ];
            $where = 'id_user = '.$id;
            db_update('users', $data, $where);
            header("location: ?mod=admin&action=profileAdmin");
        }
    }