<?php

require "../classes/seller-model.php";
$sellerModel = new SellerModel(require "../partials/connect.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['first_name'], $_POST['last_name'])) {
        $firstName = $_POST['first_name'];
        $lastName = $_POST['last_name'];

        if (!empty($firstName) && !empty($lastName)) {
            $firstName = filter_var($firstName, FILTER_SANITIZE_SPECIAL_CHARS);
            $lastName = filter_var($lastName, FILTER_SANITIZE_SPECIAL_CHARS);

            $sellerModel->addSeller($firstName, $lastName);

            header("Location: ../index.php");
            exit;
        }
    }
    header("Location: ../add-seller.php");
    exit;
}
