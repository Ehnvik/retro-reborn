<?php

class SellerView
{
    public function renderAllSellers(array $sellers): void
    {
        echo "<div class='all-sellers-container'>";
        echo "<table class='table-container'>";
?>
        <tr>
            <th>Förnamn</th>
            <th>Efternamn</th>
            <th>Till Salu</th>
            <th>Sålda</th>
            <th>Totalt Antal</th>
            <th>Totalt Sålt</th>
            <th>Alla Plagg</th>
        </tr>
        <?php
        foreach ($sellers as $seller) {
            $firstName = $seller["FirstName"];
            $lastName = $seller["LastName"];
            $sold = $seller["SoldCount"] ?? 0;
            $unsold = $seller["UnsoldCount"] ?? 0;
            $totalSoldAmount = $seller["TotalSoldAmount"];
            $totalClothes = $seller["TotalClothesCount"];

            $id = $seller["ID"];
            echo "<tr>";
            echo "<td>$firstName</td>";
            echo "<td>$lastName</td>";
            echo "<td>$unsold st</td>";
            echo "<td>$sold st</td>";
            echo "<td>$totalClothes st</td>";
            echo "<td>$totalSoldAmount kr</td>";
            if ($totalClothes == null) {
                echo "<td>Tomt</td>";
            } else {
                echo "<td><a class='singleSellerLink' href='seller.php?id=$id'>Visa</a></td>";
            }

            echo "</tr>";
        }
        echo "</table>";
        echo "</div>";
    }

    public function renderSingleSeller(array $seller)
    {
        echo "<div class='all-sellers-container'>";
        echo "<table class='table-container'>";
        ?>
        <tr>
            <th>Klädesplagg</th>
            <th>Publicerad</th>
            <th>Såld</th>
            <th>Pris</th>
            <th>Köp</th>
        </tr>
<?php
        foreach ($seller as $seller) {
            $clothing = $seller["Name"];
            $published = $seller["SubmissionDate"];
            $soldDate = $seller["SoldDate"];
            $sold = $seller["Sold"];
            $price = $seller["Price"];
            $clothingId = $seller["ID"];

            echo "<tr>";
            echo "<td>$clothing</td>";
            echo "<td>$published</td>";
            if ($soldDate == false) {
                echo "<td><strong>Till Salu</strong></td>";
            } else {
                echo "<td>$soldDate</td>";
            }
            echo "<td>$price kr</td>";
            if ($sold == false) {
                echo "<td><form method='POST' action='./form-handlers/buy-clothes-form.php'>
                <input type='hidden' name='clothing_id' value='$clothingId'>
                <input class='buy-button' type='submit' value='Köp'>
            </form></td>";
            } else {
                echo "<td><strong>Såld</strong></td>";
            }

            echo "</tr>";
        }
        echo "</table>";
        echo "</div>";
    }
}
