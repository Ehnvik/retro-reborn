<?php

require "../classes/seller-model.php";
$sellerModel = new SellerModel(require "../partials/connect.php");


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['first_name'], $_POST['last_name'])) {
        $firstName = filter_var($_POST['first_name'], FILTER_SANITIZE_SPECIAL_CHARS);
        $lastName = filter_var($_POST['last_name'], FILTER_SANITIZE_SPECIAL_CHARS);

        $sellerModel->addSeller($firstName, $lastName);

        header("Location: ../index.php");
        exit;
    }
}
