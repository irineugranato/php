<?php

$id = $_GET['id'];
$conn = mysqli_connect("localhost", "root", "", "pontozdg");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// sql to delete a record
$sql = "DELETE FROM colaborador WHERE colaborador.id = $id"; 

if (mysqli_query($conn, $sql)) {
    mysqli_close($conn);
    header('Location: index.php');
    exit;
} else {
    echo "Error deleting record";
}

?>