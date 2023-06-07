<?php

include "./classes/clothes-model.php";
include "./classes/clothes-view.php";

$pdo = require 'partials/connect.php';

$clothesView = new ClothesView();
$clothesModel = new ClothesModel($pdo);

$clothes = $clothesModel->getAllClothesWithSeller();

include "./partials/header.php";
include "./partials/nav.php";
?>

<main class="container">
    <h2>Alla kläder</h2>
    <?php $clothesView->renderAllClothes($clothes) ?>
</main>

<?php

include "./partials/footer.php";
