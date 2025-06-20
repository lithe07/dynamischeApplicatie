<?php
require 'includes/database.php';

// Alle characters ophalen
$stmt = $conn->query("SELECT * FROM characters ORDER BY name ASC");
$characters = $stmt->fetchAll();
$totaal = count($characters);

$pageTitle = 'Alle Characters';
include 'includes/header.php';
?>

<header>
    <h1>Alle <?= $totaal ?> characters uit de database</h1>
</header>

<div id="container">
    <?php foreach ($characters as $char): ?>
        <a class="item" href="character.php?id=<?= $char['id'] ?>">
            <div class="left">
                <img class="avatar" src="vormgeving/resources/images/<?= $char['avatar'] ?>" alt="<?= $char['name'] ?>">
            </div>
            <div class="right">
                <h2><?= $char['name'] ?></h2>
                <div class="stats">
                    <ul class="fa-ul">
                        <li><span class="fa-li"><i class="fas fa-heart"></i></span> <?= $char['health'] ?></li>
                        <li><span class="fa-li"><i class="fas fa-fist-raised"></i></span> <?= $char['attack'] ?></li>
                        <li><span class="fa-li"><i class="fas fa-shield-alt"></i></span> <?= $char['defense'] ?></li>
                    </ul>
                </div>
            </div>
            <div class="detailButton">
                <i class="fas fa-search"></i> bekijk
            </div>
        </a>
    <?php endforeach; ?>
</div>

<?php include 'includes/footer.php'; ?>