<?php
$html = '';
include './includes/dbh.php';

$id = $_GET['id'];
$sql = "SELECT * FROM `wanne_qr-codes` WHERE `id`=?";
$statement = $conn->prepare($sql);
$statement->bind_param('s', $id);
$statement->execute();
$result = $statement->get_result();
?>

<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Museumstuk</title>
  <style>
    body {
      background-color: #f9f6f0;
      font-family: 'Georgia', serif;
      margin: 0;
      padding: 30px 20px;
      color: #2f2f2f;
    }

    .museum-card {
      max-width: 900px;
      margin: 40px auto;
      background-color: #fffaf3;
      border: 1px solid #e0dccc;
      border-radius: 12px;
      box-shadow: 0 6px 16px rgba(0,0,0,0.08);
    }

    .museum-image {
      width: 100%;
      max-height: 450px;
      object-fit: cover;
      border-bottom: 1px solid #e0dccc;
    }

    .museum-content {
      padding: 30px 40px;
    }

    .museum-title {
      font-size: 32px;
      margin-bottom: 15px;
      color: #4a3f2b;
      border-bottom: 3px solid #c6a857;
      display: inline-block;
      padding-bottom: 6px;
    }

    .museum-era {
      font-size: 16px;
      color: #6d5c3d;
      margin-bottom: 20px;
      font-style: italic;
    }

    .museum-text {
      font-size: 18px;
      line-height: 1.8;
      color: #3f3f3f;
    }

    .tts-button {
      text-align: center;
      margin: 30px auto 60px;
    }

    .tts-button button {
      background-color: #c6a857;
      color: #fffaf0;
      padding: 12px 24px;
      font-size: 16px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .tts-button button:hover {
      background-color: #b2944d;
    }

    .highlight {
      background-color: #fcf39f;
      font-weight: bold;
    }
  </style>
</head>
<body>

<?php
while ($row = $result->fetch_assoc()) {
    $html .= '
        <div class="museum-card">
            <img src="' . htmlspecialchars($row['image']) . '" alt="Afbeelding van het museumstuk" class="museum-image">
            <div class="museum-content">
                <h2 class="museum-title">' . htmlspecialchars($row['title']) . '</h2>
                <p class="museum-era">Periode: ' . htmlspecialchars($row['era']) . '</p>
                <p id="museum-text" class="museum-text">' . htmlspecialchars_decode($row['content']) . '</p>
            </div>
        </div>';
}
echo $html;
?>


<div class="tts-button">
  <button onclick="startSpeech()">Lees dit museumstuk voor</button>
</div>

<script>
  let utterance;
  let speechInstance = window.speechSynthesis;

  function startSpeech() {
    if (utterance) {
      speechInstance.cancel(); // Stop vorige
    }

    const textContainer = document.getElementById("museum-text");
    const originalText = textContainer.innerText;
    const words = originalText.split(/\s+/);
    textContainer.innerHTML = words.map(word => `<span>${word}</span>`).join(" ");

    const spans = textContainer.querySelectorAll("span");

    utterance = new SpeechSynthesisUtterance(originalText);
    utterance.lang = 'nl-NL';

    utterance.onboundary = function(event) {
      if (event.name === "word") {
        const charIndex = event.charIndex;
        let count = 0;

        for (let i = 0; i < spans.length; i++) {
          const wordLength = spans[i].innerText.length + 1; // spatie
          if (count + wordLength > charIndex) {
            spans.forEach(s => s.classList.remove("highlight"));
            spans[i].classList.add("highlight");
            break;
          }
          count += wordLength;
        }
      }
    };

    utterance.onend = () => {
      spans.forEach(s => s.classList.remove("highlight"));
    };

    speechInstance.speak(utterance);
  }
</script>

</body>
</html>
