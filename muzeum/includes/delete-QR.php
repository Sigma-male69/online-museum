<?php
$response=array();
include 'dbh.php';
$id = $_POST['id'];

$sql = "DELETE FROM `wanne_qr-codes` WHERE `id`= ?";
$statement = $conn->prepare($sql);
$statement -> bind_param('s',$id);
$statement->execute();
$result = $statement->get_result();
echo json_encode($response);
?>