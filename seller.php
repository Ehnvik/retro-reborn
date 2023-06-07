<?php

include "./classes/seller-model.php";
include "./classes/seller-view.php";

$pdo = require "./partials/connect.php";

$sellerView = new SellerView();
$sellerModel = new SellerModel($pdo);

$id = $_GET["id"];
$seller = $sellerModel->getSingleSeller($id);

include "./partials/header.php";
include "./partials/nav.php";
?>

<main class="container">
    <h2><?php echo $seller[0]["FirstName"] . " " . $seller[0]["LastName"]; ?></h2>
    <?php $sellerView->renderSingleSeller($seller) ?>
</main>

<?php

include "./partials/footer.php";
