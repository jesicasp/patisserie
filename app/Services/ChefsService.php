<?php
namespace App\Services;

interface ChefsService{
    public function getAllChefPaginated($perPage = 10);

    public function findChef($id);

    public function createChef(array $data);

    public function updateChef($id, array $data);

    public function deleteChef($id);
}

?>