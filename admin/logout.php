<?php
session_start();

if (! isset($_SESSION['log']) || $_SESSION['log'] != 1) {
    header('Location:skip.php?url=index.php&info=注销失败，请稍后重试！');
} else {
    session_unset(); // Free all session variables
    session_destroy(); // 销毁一个会话中的全部数据
    setcookie(session_name(), '', time() - 3600, '/'); // 销毁保存在客户端的卡号（session id）
    header('Location:skip.php?url=index.php&info=注销成功，正在跳转中！');
}
?>