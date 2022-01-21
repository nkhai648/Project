<?php 

defined('APPPATH') OR exit('Không có quyền truy cập phần này!');


// ! Import các file để chạy

//FOLDER CONFIG
require CONFIGPATH . DIRECTORY_SEPARATOR . 'database.php';

require CONFIGPATH . DIRECTORY_SEPARATOR . 'config.php';

require CONFIGPATH . DIRECTORY_SEPARATOR . 'autoload.php';

require CONFIGPATH . DIRECTORY_SEPARATOR . 'email.php';

//FOLDER CORE DATBASE
require LIBPATH . DIRECTORY_SEPARATOR . 'database.php';

require COREPATH . DIRECTORY_SEPARATOR . 'base.php';
/*
 * ------------------------------------------------------------------
 * Giải thích cấu trúc điều kiện , foreach
 * ------------------------------------------------------------------
 * B1: Kiểm tra $autoload = array
 * B2: Duyệt mảng $autoload lấy ra Key và Value;
 * Ví dụ:
 *         $autoload = [
 *              'helper' => [
 *                  'data', 'string'  
 *              ]
 *          ]
 * B3: Nếu tồn tại các giá trị trong mảng thì duyệt tất cả giá trị.
 * B4: Gọi hoàn load() rồi truyền các đối số : Key và Value.
 * $autoload['lib'] = array('validation', 'pagging');
 */

if(is_array($autoload)) {
    foreach($autoload as $type => $list_auto) {
        if(!empty($list_auto)) {
            foreach($list_auto as $name) {
                load($type, $name);
            }
        }
    }
}



db_connect($db);

new objMailer($email);

require COREPATH . DIRECTORY_SEPARATOR . 'router.php';
?>