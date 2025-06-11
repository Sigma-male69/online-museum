<?php
$response=array();
include 'dbh.php';

$title = $_POST['title'];
$era = $_POST['era'];
$image = $_POST['image'];
$content = $_POST['content'];
$id = generate_uuid_v4();

$sql = "INSERT INTO `wanne_qr-codes`(`id`, `title`, `content`, `era`, `image`) VALUES (?,?,?,?,?)";
$statement = $conn->prepare($sql);
$statement -> bind_param('sssss',$id,$title,$content,$era,$image);
$statement->execute();
$result = $statement->get_result();

echo json_encode($response);

?>