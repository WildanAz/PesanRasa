<?php
include 'koneksi_crud.php';

if (isset($_POST['delete_id'])) {
    $stmt = $conn->prepare("DELETE FROM menu WHERE id = ?");
    $stmt->bind_param("i", $_POST['delete_id']);
    $stmt->execute();
}

header("Location: tabelmenu.php");
exit;
?>
