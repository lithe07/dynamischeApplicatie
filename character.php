<?php
require 'includes/database.php';

$id = ($_GET['id'] ?? 0);

$stmt = $conn->prepare("SELECT * FROM characters WHERE id = ?");
$stmt->execute([$id]);
$char = $stmt->fetch();

if (!$char) {
    die("Character niet gevonden.");
}

$pageTitle = 'Character - ' . $char['name'];
include 'includes/header.php';
?>

<header>
    <h1><?= $char['name'] ?></h1>
    <a class="backbutton" href="index.php"><i class="fas fa-long-arrow-alt-left"></i> Terug</a>
</header>

<div id="container">
    <div class="detail">
        <div class="left">
            <img class="avatar" src="vormgeving/resources/images/<?= $char['avatar'] ?>" alt="<?= $char['name'] ?>">
            <div class="stats" style="background-color: <?= $char['color'] ?>">
                <ul class="fa-ul">
                    <li><span class="fa-li"><i class="fas fa-heart"></i></span> <?= $char['health'] ?></li>
                    <li><span class="fa-li"><i class="fas fa-fist-raised"></i></span> <?= $char['attack'] ?></li>
                    <li><span class="fa-li"><i class="fas fa-shield-alt"></i></span> <?= $char['defense'] ?></li>
                </ul>
                <ul class="gear">
                    <?php if (!empty($char['weapon'])): ?>
                        <li><b>Weapon</b>: <?= $char['weapon'] ?></li> 
                    <?php endif; ?>
                    <?php if (!empty($char['armor'])): ?>
                        <li><b>Armor</b>: <?= $char['armor'] ?></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
        <div class="right">
            <?php if (!empty($char['bio'])): ?>
                <p><?= nl2br($char['bio']) ?></p>
            <?php endif; ?>
        </div>
        <div style="clear: both;"></div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>