<?php

require_once "db.php";

class ClothesModel extends DB
{
    protected $table = "clothes";

    public function getAllClothes()
    {
        return $this->getAll($this->table);
    }

    public function getAllClothesWithSeller()
    {
        $sql = "SELECT sellers.*, clothes.*
        FROM clothes
        JOIN sellers ON sellers.ID = clothes.Seller_ID;";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buyClothes(int $clothingId)
    {
        $sql = "UPDATE clothes SET Sold = true, SoldDate = CURRENT_DATE() WHERE ID = :clothingId";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':clothingId', $clothingId);
        $stmt->execute();
    }

    public function addClothes(string $clothing, float $price, int $sellerId)
    {
        $submissionDate = date('Y-m-d');

        $sql = "INSERT INTO {$this->table} (Name, SubmissionDate, Price, Seller_ID) VALUES (?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$clothing, $submissionDate, $price, $sellerId]);
    }
}
