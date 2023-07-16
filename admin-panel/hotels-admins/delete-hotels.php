<?php require "../config/database/admin_db.php"; ?>
<?php
if (isset($_GET["id"])) {
    $adminDB->delete_hotel($_GET["id"]);
}
?>