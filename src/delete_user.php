<?php
include __DIR__ . '/../config/database.php';

$id = $_GET['id'];

$sql = "DELETE FROM users WHERE id = $1";
$result = pg_query_params($conn, $sql, array($id));

if ($result) {
    header("Location: list_user.php");
    exit;
} else {
    echo "Error al eliminar: " . pg_last_error($conn);
}
?>