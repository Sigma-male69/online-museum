<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Edit</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/aebab009a2.js" crossorigin="anonymous"></script>
    <!-- Trumbowyg (Text Editor) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/trumbowyg@2.26.0/dist/ui/trumbowyg.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/trumbowyg@2.26.0/dist/trumbowyg.min.js"></script>
</head>

<body class="container mt-5">
    <h2 class="mb-4 text-center">QR-code Bewerken</h2>
    <?php
    include './includes/dbh.php';
    include './js/main.php';

    $id = $_GET['id'];
    
    
    
    $sql = "SELECT `title`, `content`, `era`, `image` FROM `wanne_qr-codes` WHERE `id`= ?";
    $statement = $conn->prepare($sql);
    $statement -> bind_param('s',$id);
    $statement->execute();
    $result = $statement->get_result();
    $row = $result->fetch_assoc();
    ?>

        <!-- Titel Invoeren -->
        <div class="mb-3">
            <input type="hidden" id="id" value="<?php echo $id ?>">
            <label for="titel" class="form-label">Titel</label>
            <input type="text" class="form-control" id="titel" name="titel" required value="<?php echo htmlspecialchars($row['title']); ?>">
        </div>



        <!-- Tekst Editor -->
        <div class="mb-3">
            <label for="editor" class="form-label">Tekst</label>
            <textarea id="editor" name="tekst" class="form-control"><?php echo htmlspecialchars_decode($row['content']);?></textarea>
        </div>

        <!-- Tijdperk Invoeren -->
        <div class="mb-3">
            <label for="tijdperk" class="form-label">Tijdperk</label>
            <select id="tijdperk" name="tijdperk" class="form-select">
                <option value="<?php echo htmlspecialchars($row['era']);?>"><?php echo htmlspecialchars($row['era']);?></option>
                <option value="Prehistorie">Prehistorie</option>
                <option value="Oude nabije oosten">Oude nabije oosten</option>
                <option value="klassieke oudheid">klassieke oudheid</option>
                <option value="Middeleeuwen">Middeleeuwen</option>
                <option value="Vroegmoderne Tijd">Vroegmoderne Tijd</option>
                <option value="Moderne Tijd">Moderne Tijd</option>
                <option value="Onze Tijd">Onze Tijd</option>
            </select>
        </div>


        <!-- Foto Upload -->
        <div class="mb-3">
            <label for="foto" class="form-label">Foto url</label>
            <input type="text" class="form-control" id="foto" name="foto" accept="image/*" value="<?php echo htmlspecialchars($row['image']);?>">
        </div>

        <!-- Opslaan Knop -->
        <button type="submit" class="btn btn-info w-100" onclick="save()">Opslaan</button>

    <script>
        $(document).ready(function() {
            $('#editor').trumbowyg();
        });
    </script>
</body>

</html>