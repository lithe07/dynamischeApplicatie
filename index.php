<?php
require 'includes/database.php';

// Alle characters ophalen
$stmt = $conn->query("SELECT * FROM characters ORDER BY name ASC");
$characters = $stmt->fetchAll();

// Aantal characters
$totaal = count($characters);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>All Characters</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" 
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" 
        crossorigin="anonymous">
  <link rel="stylesheet" href="vormgeving/resources/css/style.css">
</head>
<body>

<header>
  <h1>Alle <?= $totaal ?> characters uit de database</h1>
</header>

<div id="container">
  <?php foreach ($characters as $char): ?>
    <a class="item" href="character.php?id=<?= $char['id'] ?>">
      <div class="left">
        <img class="avatar" src="resources/images/<?= htmlspecialchars($char['avatar']) ?>" 
             alt="<?= htmlspecialchars($char['name']) ?>">
      </div>
      <div class="right">
        <h2><?= htmlspecialchars($char['name']) ?></h2>
        <div class="stats">
          <ul class="fa-ul">
            <li><span class="fa-li"><i class="fas fa-heart"></i></span> <?= $char['health'] ?></li>
            <li><span class="fa-li"><i class="fas fa-fist-raised"></i></span> <?= $char['attack'] ?></li>
            <li><span class="fa-li"><i class="fas fa-shield-alt"></i></span> <?= $char['defense'] ?></li>
          </ul>
        </div>
      </div>
    </a>
  <?php endforeach; ?>
</div>

<footer>
  <p>&copy; <?= date("Y") ?> Lithe</p>
</footer>

</body>
</html>