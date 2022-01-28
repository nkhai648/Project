<?php 

    function construct() {
        load_model('index');
    }
    function indexAction() {
        load_view('index');
    }

    function loginAction() {
        if(isset($_GET['token'])) {
            $token = $_GET['token'];
            $dataField = [
                'status' => 1,
                'token' => NULL
            ];
            updateUser('users', $dataField, "token = '{$token}'");
            echo "<script>
                window.location.href = '?mod=user&action=checkVerifyMail'
            </script>";
        }
        if(isset($_POST['login'])) {
            $data['email'] = isset($_POST['email']) ? $_POST['email'] : null;
            $data['password'] = isset($_POST['password']) ? $_POST['password'] : null;

            $get_row_user =  get_row_user($data['email'], $data['password']);
            $checkInvalidUser = checkInvalidUser($data['email']);
            $user = get_user($data['email'], $data['password']);
            
            if($get_row_user > 0) {
                if($data['email'] == $user['email'] && $data['password'] == $user['password']) {
                    if($user['status'] == 1) {
                        if($user['permission'] == 'user') {
                            $_SESSION['user'] = $user;
                            header('location: ?mod=home');
                        }
                        if($user['permission'] == 'admin') {
                            $_SESSION['admin'] = $user;
                            header('location: ?mod=admin');
                        }
                    }
                    if($user['status'] == 0) {
                        $data['not_verified'] = 'This account is not verified!' ;
                    }
                }
            }else if($checkInvalidUser < 1) {
                $data['not_exist'] = 'Email does not exist!';
            }else {
                $data['wrong'] ='Wrong email or password!';
            }
            load_view('index', $data);
        }
    }

    function randomToken() {
        $code = "1234567QWERTYOUILJKHMGNGA";
        return substr(str_shuffle($code), 0, 10);
    }

    function signupAction() {
        if(isset($_POST['sign-up'])) {
            $data['full_name'] = isset($_POST['fullname']) ? $_POST['fullname'] : null;
            $data['password'] = isset($_POST['password']) ? $_POST['password'] : null;
            $data['email'] = isset($_POST['email']) ? $_POST['email'] : null;
            $data['permission'] = 'user';
            $confirm_password = isset($_POST['confirm-password']) ? $_POST['confirm-password'] : null;

            $checkUserInvalid = checkInvalidUser($data['email']);

            if($data['full_name'] && $data['password'] && $data['email']) {
                
                if($data['password'] == $confirm_password) {

                    if($checkUserInvalid < 1) {

                        $data['token'] = randomToken();
                        
                        $mailContent = [
                            'subject' => 'Tasty Food',
                            'body' => "
                            Xin chào bạn! Rất vui khi được bạn tin tưởng và sự dụng dịch vụ của chúng tôi. Việc đăng ký đã thành công. Bạn cần xác thực email để chúng tôi biết bạn tồn tại...
                            <a href='http://localhost:5000/?mod=user&action=login&token={$data['token']}'>Nhấn vào đây</a> để thực hiện xác thực. Xin cảm ơn <3
                            ",
                            'altbody' => 'Hello guy!'
                        ];

                        $verify_mail = new VerifyEmail();
                        $verify_mail->setStreamTimeoutWait(0);
                        if($verify_mail->check($data['email'])){
                            objMailer::setMail($data['email'], $mailContent);
                            objMailer::toSendMail();
                            insertUser('users', $data);
                            header('location: ?mod=user&action=mailSended');
                        }else {
                            $data['verify_email'] = 'This email account does not exist!';
                        }
                    }

                    if($checkUserInvalid > 0) {
                        $data['invalid_user'] = 'Email already exists in database!';
                    }
                }else {
                    $data['error_pass'] = 'Password incorrect!';
                }
            }
            load_view('index', $data);
        }
    }

    function logoutAction() {
        unset($_SESSION['user']);
        header("location: ?mod=user&action=index");
    }


    function checkVerifyMailAction() {
        load_view('checkVerifyMail');
    }

    function mailSendedAction() {
        load_view('mailSended');
    }

    function detailUserAction() {
        $get_id_user = isset($_SESSION['user']) ? $_SESSION['user']['id_user'] : '';
        $data['get_user'] = getProfileUser($get_id_user);
        load_view('detailUser', $data);
    }

    function updateProfileAction() {
        if(isset($_POST['update'])) {
            $id = $_POST['id_user'];
            $full_name = $_POST['full_name'];
            $img = isset($_POST['img-user']) ? $_POST['img-user'] : '';
            $password = $_POST['password'];

            if(isset($_FILES['file'])) {
                $fileName = $_FILES['file']['name'];
                $fileTmp = $_FILES['file']['tmp_name'];
                $fileSize = $_FILES['file']['size'];
                $fileError = $_FILES['file']['error'];

                $fileExt = explode('.', $fileName);
                $getTypeFile = strtolower(end($fileExt));
                $arrType = array('jpg', 'png', 'jpeg');

                if(in_array($getTypeFile, $arrType)) {
                    if($fileError === 0) {
                        if($fileSize < 1000000) {
                            $target = "public/upload/".basename($fileName);
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
                'full_name' => $full_name,
                'img' => $img,
                'password' => $password,
            ];

            $where = "id_user = {$id}";
            updateProfile('users', $data, $where);
            header("location: ?mod=user&action=detailUser");
        }
    }
?>