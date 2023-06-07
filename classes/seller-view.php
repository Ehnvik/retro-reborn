<?php

class SellerView
{
    public function renderAllSellers(array $sellers)
    {
        echo "<div class='all-sellers-container'>";
        echo "<table class='table-container'>";
?>
        <tr>
            <th>Förnamn</th>
            <th>Efternamn</th>
            <th>Osålda</th>
            <th>Sålda</th>
            <th>Totalt Antal</th>
            <th>Totalt Sålt</th>
            <th>Visa Alla Plagg</th>
        </tr>
<?php
        foreach ($sellers as $seller) {
            $firstName = $seller["FirstName"];
            $lastName = $seller["LastName"];
            $sold = $seller["SoldCount"];
            $unsold = $seller["UnsoldCount"];
            $totalSoldAmount = $seller["TotalSoldAmount"];
            $totalClothes = $seller["TotalClothesCount"];
            echo "<tr>";
            echo "<td>$firstName</td>";
            echo "<td>$lastName</td>";
            echo "<td>$unsold st</td>";
            echo "<td>$sold st</td>";
            echo "<td>$totalClothes st</td>";
            echo "<td>$totalSoldAmount kr</td>";
            echo "<td><a href='seller.php'>Klicka</a></td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "</div>";
    }
}
