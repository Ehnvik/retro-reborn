<?php

include "./classes/seller-model.php";
include "./classes/seller-view.php";

$pdo = require 'partials/connect.php';

$sellerView = new SellerView();
$sellerModel = new SellerModel($pdo);

$sellers = $sellerModel->getAllSellersWithClothesAmount();

include "./partials/header.php";
include "./partials/nav.php";
?>

<main class="container">
    <h2>Alla säljare</h2>
    <?php $sellerView->renderAllSellers($sellers) ?>
</main>

<?php

include "./partials/footer.php";
