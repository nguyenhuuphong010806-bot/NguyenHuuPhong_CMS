<?php
require_once('wordpress/wp-load.php');

$users = [
    [
        'user_login' => 'user1',
        'user_pass'  => '123456',
        'user_email' => 'user1@example.com',
        'role'       => 'administrator'
    ],
    [
        'user_login' => 'user2',
        'user_pass'  => '123456',
        'user_email' => 'user2@example.com',
        'role'       => 'editor'
    ],
    [
        'user_login' => 'user3',
        'user_pass'  => '123456',
        'user_email' => 'user3@example.com',
        'role'       => 'author'
    ],
    [
        'user_login' => 'user4',
        'user_pass'  => '123456',
        'user_email' => 'user4@example.com',
        'role'       => 'contributor'
    ],
    [
        'user_login' => 'user5',
        'user_pass'  => '123456',
        'user_email' => 'user5@example.com',
        'role'       => 'subscriber'
    ]
];

foreach ($users as $u) {
    if (!username_exists($u['user_login'])) {
        $user_id = wp_insert_user($u);
        if (!is_wp_error($user_id)) {
            echo "Đã tạo thành công tài khoản: <b>" . $u['user_login'] . "</b> (Vai trò: " . $u['role'] . ")<br>";
        } else {
            echo "Lỗi khi tạo " . $u['user_login'] . ": " . $user_id->get_error_message() . "<br>";
        }
    } else {
        echo "Tài khoản <b>" . $u['user_login'] . "</b> đã tồn tại.<br>";
    }
}

?>
