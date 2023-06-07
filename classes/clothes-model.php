<?php

require_once "db.php";

class ClothesModel extends DB
{
    protected $table = "clothes";

    public function getAllClothes()
    {
        return $this->getAll($this->table);
    }

    public function buyClothes(int $clothingId)
    {
        $sql = "UPDATE clothes SET Sold = true, SoldDate = CURRENT_DATE() WHERE ID = :clothingId";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':clothingId', $clothingId);
        $stmt->execute();
    }
}
