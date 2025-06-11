<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Museum Login</title>

  <!-- jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <style>
    body {
      background: linear-gradient(to bottom, #f3e8dc, #e9d8c0);
      font-family: 'Georgia', serif;
      color: #3b2f2f;
    }

    .login-container {
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .card {
      background-color: #fffaf0;
      border: 1px solid #d6c7a9;
      border-radius: 12px;
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 420px;
    }

    .card-title {
      font-weight: bold;
      color: #5e4630;
    }

    .form-label {
      font-weight: 500;
    }

    .btn-museum {
      background-color: #8b5e3c;
      color: #fff;
      border: none;
    }

    .btn-museum:hover {
      background-color: #6f4329;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <div class="card p-4">
      <div class="card-body">
        <h4 class="card-title text-center mb-4">🎨 Toegang tot het Archief</h4>
          <div class="mb-3">
            <label for="username" class="form-label">Gebruikersnaam</label>
            <input type="text" class="form-control" id="username" name="username" required />
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Wachtwoord</label>
            <input type="password" class="form-control" id="password" name="password" required />
          </div>
          <button type="submit" class="btn btn-museum w-100" onclick="login()">Betreed Museum</button>
      </div>
    </div>
  </div>


</body>
</html>

<?php
include './js/main.php';
?>
