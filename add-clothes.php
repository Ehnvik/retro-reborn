<?php

require_once "./partials/connect.php";
require_once "./classes/seller-model.php";

$sellerModel = new SellerModel(connect($host, $db, $user, $password));

include "./partials/header.php";
include "./partials/nav.php";
?>

<main class="container">
    <form action="./form-handlers/add-clothes-form.php" method="POST">
        <label for="clothing">Klädesplagg:</label>
        <input type="text" id="clothing" name="clothing" required>
        <label for="price">Pris:</label>
        <input type="text" id="price" name="price" required>

        <div>
            <label for="seller">Säljare: </label>
            <select name="seller_id" id="seller_id">

                <option value="">-- Välj säljare --</option>
                <?php
                $sellers = $sellerModel->getAllSellers();
                foreach ($sellers as $s) {
                    $firstName = $s['FirstName'];
                    echo "<option value='{$s['ID']}'>$firstName</option>";
                }
                ?>

            </select>
        </div>
        <input type="submit" value="Lägg ut">
    </form>
</main>

<?php

include "./partials/footer.php";
