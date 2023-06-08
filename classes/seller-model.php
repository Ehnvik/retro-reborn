<?php

require_once "db.php";

class SellerModel extends DB
{
    protected string $table = "sellers";

    public function getAllSellers(): array
    {
        return $this->getAll($this->table);
    }

    public function getAllSellersWithClothesAmount(): array
    {
        $sql = "SELECT sellers.*,
        COUNT(clothes.ID) AS TotalClothesCount,
        SUM(clothes.Sold = 0) AS UnsoldCount,
        SUM(clothes.Sold = 1) AS SoldCount,
        SUM(CASE WHEN clothes.Sold = 1 THEN clothes.Price ELSE 0 END) AS TotalSoldAmount
    FROM sellers
    LEFT JOIN clothes ON sellers.ID = clothes.Seller_ID
    GROUP BY sellers.ID, sellers.FirstName, sellers.LastName
    ORDER BY sellers.FirstName ASC;";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getSingleSeller(int $id): array
    {
        $sql = "SELECT sellers.*, clothes.*
        FROM sellers
        LEFT JOIN clothes ON sellers.ID = clothes.Seller_ID
        WHERE sellers.ID = :id";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addSeller(string $firstName, string $lastName): void
    {
        $sql = "INSERT INTO {$this->table} (FirstName, LastName) Values (?, ?);";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$firstName, $lastName]);
    }
}
