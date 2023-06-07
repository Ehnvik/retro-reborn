<?php

require_once "./partials/connect.php";
require_once "./classes/seller-model.php";

$sellerModel = new SellerModel(connect($host, $db, $user, $password));

include "./partials/header.php";
include "./partials/nav.php";
?>

<main class="container">
    <form action="./form-handlers/add-seller-form.php" method="POST">
        <label for="first_name">Förnamn:</label>
        <input type="text" id="first_name" name="first_name" required>
        <label for="last_name">Efternamn:</label>
        <input type="text" id="last_name" name="last_name" required>


        <input type="submit" value="Lägg till">
    </form>
</main>

<?php

include "./partials/footer.php";
