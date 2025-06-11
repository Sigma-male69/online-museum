
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/aebab009a2.js" crossorigin="anonymous"></script>
</head>

<?php
// include './includes/login.php';


if (!isset($_SESSION['id'])) {
    header("Location: index.php");
    exit();
}
echo '
<body class="container mt-5">
    <h2 class="mb-4 text-center">Alle QR-codes</h2>
    
    <div class="table-responsive">
        <table class="table table-bordered table-striped text-center">
            <thead class="table-dark">
                <tr>
                    <th>web pagina</th>
                    <th>QR-code</th>
                    <th>Naam</th>
                    <th>Beschrijving</th>
                    <th>era</th>
                    <th>image</th>
                    <th>Acties</th>
                </tr>
            </thead>
            <tbody id="content">
                
            </tbody>
        </table>
    </div>

</body>'
?>
<button class="btn text-info"><a href="./edit-QR-code.php">Nieuwe QR-code</a></button>


</html>
<?php
include './js/main.php';
?>