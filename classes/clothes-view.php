<?php

class ClothesView
{
    public function renderAllClothes(array $clothes): void
    {
        echo "<div class='all-sellers-container'>";
        echo "<table class='table-container'>";
?>
        <tr>
            <th>Säljare</th>
            <th>Klädesplagg</th>
            <th>Publicerad</th>
            <th>Såld</th>
            <th>Pris</th>
            <th>Köp</th>
        </tr>
<?php
        foreach ($clothes as $clothing) {
            $firstName = $clothing["FirstName"];
            $lastName = $clothing["LastName"];
            $clothingName = $clothing["Name"];
            $published = $clothing["SubmissionDate"];
            $soldDate = $clothing["SoldDate"];
            $sold = $clothing["Sold"];
            $price = $clothing["Price"];
            $clothingId = $clothing["ID"];

            echo "<tr>";
            echo "<td>$firstName $lastName</td>";
            echo "<td>$clothingName</td>";
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
