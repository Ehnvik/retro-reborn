<?php

require "../classes/clothes-model.php";
$clothesModel = new ClothesModel(require "../partials/connect.php");


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['clothing'], $_POST['price'], $_POST['seller_id'])) {
        $clothing = $_POST['clothing'];
        $price = $_POST['price'];
        $sellerId = $_POST['seller_id'];

        if (!empty($clothing) && is_numeric($price) && is_numeric($sellerId)) {
            $clothing = filter_var($clothing, FILTER_SANITIZE_SPECIAL_CHARS);
            $price = filter_var($price, FILTER_VALIDATE_FLOAT);
            $sellerId = filter_var($sellerId, FILTER_SANITIZE_NUMBER_INT);

            $clothesModel->addClothes($clothing, $price, $sellerId);

            header("Location: ../index.php");
            exit;
        } else {
            header("Location: ../add-clothes.php");
            exit;
        }
    }
}
