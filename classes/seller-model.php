<?php

require_once "db.php";

class SellerModel extends DB
{
    protected $table = "sellers";

    public function getAllSellers()
    {
        return $this->getAll($this->table);
    }

    public function getAllSellersWithClothesAmount()
    {
        $sql = "SELECT sellers.*,
        COUNT(clothes.ID) AS TotalClothesCount,
        SUM(clothes.Sold = 0) AS UnsoldCount,
        SUM(clothes.Sold = 1) AS SoldCount,
        SUM(CASE WHEN clothes.Sold = 1 THEN clothes.Price ELSE 0 END) AS TotalSoldAmount
    FROM sellers
     JOIN clothes ON sellers.ID = clothes.Seller_ID
    GROUP BY sellers.ID, sellers.FirstName, sellers.LastName;
    
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getSingleSeller(int $id)
    {
        $sql = "SELECT sellers.*, clothes.*
        FROM sellers
        INNER JOIN clothes ON sellers.ID = clothes.Seller_ID
        WHERE sellers.ID = :id";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
