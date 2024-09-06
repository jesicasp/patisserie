<?php
namespace App\Services;

interface VarianService {
    public function getAllVarianPaginated($perPage = 10);

    public function findVarian($id);

    public function createVarian(array $data);

    public function updateVarian($id, array $data);

    public function deleteVarian($id);
}

?>