<?php
include './dbh.php';


$html = '';
$response = array();

$sql = "SELECT * FROM `wanne_qr-codes` ORDER BY `title`";
$statement = $conn->prepare($sql);
$statement->execute();
$result = $statement->get_result();

while ($row = $result->fetch_assoc()) {
    $html .= '<tr>
                <td>
                <a class="btn btn-primary" href="./content_site.php?id='.$row['id'].'"><i class="fa-solid fa-square-up-right"></i></a>
                </td>
                <td>
                <img src="https://api.qrserver.com/v1/create-qr-code/?size=250x250&data=htt/content_site.php?id=' . $row['id'] . '" style="width: 100px; height: 100px; margin-bottom: 5px;" alt="QR Code">
                </td>
                <td>' . htmlspecialchars($row['title']) . '</td>
                <td>' . htmlspecialchars_decode($row['content']) . '</td>
                <td>' . htmlspecialchars($row['era']) . '</td>
                <td><img src="' . htmlspecialchars($row['image']) . '" class="img-fluid" style="max-width: 100px;"></td>
                <td>
                    <button class="btn btn-primary"><i class="fa-solid fa-download"></i></button>
                    <button class="btn btn-primary"><a href="edit-QR-code.php?id='.$row['id'].'" style="color: inherit; text-decoration: none; display: block;"><i class="fa-solid fa-bolt"></i></a></button>
                    <button class="btn btn-primary" onclick="duplicate(\''.$row['title'].'\',\''.$row['era'].'\',\''.$row['image'].'\',\''.$row['content'].'\')"><i class="fa-solid fa-copy"></i></button>
                    <button class="btn btn-danger" onclick="del(\''.$row['id'].'\')"><i class="fa-solid fa-trash"></i></button>
                </td>
              </tr>';
}

$response['html'] = $html;

echo json_encode($response);
?>
