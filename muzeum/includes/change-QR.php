<?php
include 'dbh.php';

$id = $_POST['id'];
$titel = $_POST['titel'];
$editor = $_POST['editor'];
$tijdperk = $_POST['tijdperk'];
$foto = $_POST['foto'];

$sql = "UPDATE `wanne_qr-codes` SET`title`=? ,`content`=?,`era`=?,`image`=? WHERE `id`=?";
$statement = $conn->prepare($sql);
$statement -> bind_param('sssss',$titel,$editor,$tijdperk,$foto,$id);
$statement->execute();
$result = $statement->get_result();

echo json_encode($result);


?>