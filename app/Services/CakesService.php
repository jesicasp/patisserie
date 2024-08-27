<?php
namespace App\Services;

interface CakesService{
    public function getAllCakesPaginated($perPage = 10);

    public function findCake($id);

    public function createCake(array $data);

    public function updateCake($id, array $data);

    public function deleteCake($id);
}

?>