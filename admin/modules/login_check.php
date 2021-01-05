<?php 

if (isset($_SESSION['admin'])) {
    if ($_SESSION['admin'] != true) {
        session_unset();
        session_destroy();
        header("Location: ../login/admin");
    }
} else {
    session_unset();
    session_destroy();
    header("Location: ../login/admin");
}

?>