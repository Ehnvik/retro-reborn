<?php

require "../classes/clothes-model.php";
$clothesModel = new ClothesModel(require "../partials/connect.php");


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['clothing'], $_POST['price'], $_POST['seller_id'])) {
        $clothing = filter_var($_POST['clothing'], FILTER_SANITIZE_SPECIAL_CHARS);
        $price = filter_var($_POST['price'], FILTER_VALIDATE_FLOAT);
        $sellerId = filter_var($_POST['seller_id'], FILTER_SANITIZE_NUMBER_INT);

        $clothesModel->addClothes($clothing, $price, $sellerId);

        header("Location: ../index.php");
        exit;
    }
}
