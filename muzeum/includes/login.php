<?php
session_start();
include './dbh.php';

$response = array();

$username = $_POST['username'];
$password = $_POST['password'];
$user = false;

$sql = "SELECT * FROM `wanne_users` WHERE `username`= ? AND `password`= ? AND `admin` = 'ja'";

$statement = $conn->prepare($sql);
$statement->bind_param('ss', $username, $password);
$statement->execute();
$result = $statement->get_result();
$row = $result->fetch_assoc();


if ($row && $row['username'] == $username && $row['password'] == $password) {
    $user = true;
    $_SESSION['username'] = $row['username'];
    $_SESSION['password'] = $row['password'];
    $_SESSION['id'] = $row['id'];
}

$response['user'] = $user;
echo json_encode($response);
