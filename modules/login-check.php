<?php 

if (empty($_SESSION)) {
    session_start();
}
if (isset($_SESSION['login'])) {
    if ($_SESSION['login'] != true) {
        session_unset();
        session_destroy();
        header("Location: ../login/member");
        exit;
    }
} else {
    session_unset();
    session_destroy();
    header("Location: ../login/member");
    exit;
}

?>