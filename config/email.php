<?php 
/*
 * --------------------------------
 * EMAIL
 * --------------------------------
 * Trong phần này chúng ta khai báo các thông số để cấu hình
 * gửi mail bằng php
 * --------------------------------
 * GIẢI THÍCH BIẾN
 * --------------------------------
 * protocol: Giao thức gửi mail
 * smtp_host: Host gửi mail
 * smtp_port: Cổng
 * smtp_user: Tên đăng nhập tài khoản gửi mail
 * smtp_pass: Password tài khoản gửi mail
 * smtp_port: Cổng
 * mailtype: Định dạng nội dung mail
 * charset: Mã ký tự nội dung mail(UTF-8)
 */

 $getMail = [
    'protocol' => 'smtp',
    'host' => 'smtp.gmail.com',
    'smtp_port' => 465,
    'user' => 'daogiakhai648@gmail.com',
    'pass' => 'taokhongnho648',
    'nameFrom' => 'Đào Gia Khải',
    'replyto' => 'Infomation',
    'subject' => 'ADMIN HHT',
    'charset' => 'UTF-8',
    'body' => '<p>Đăng ký thành công tài khoản !</p>',
    // 'smtp_timeout' => '7',
 ]
?>