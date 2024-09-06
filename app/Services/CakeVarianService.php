<?php
namespace App\Services;

interface CakeVarianService {
    public function getAllCakeVarianPaginated($perPage = 10);

    public function findCakeVarian($id);

    public function createCakeVarian(array $data);

    public function updateCakeVarian($id, array $data);

    public function deleteCakeVarian($id);

    public function exists($cakeId, $varianId, $id);
}

?>