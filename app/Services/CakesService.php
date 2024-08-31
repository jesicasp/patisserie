<?php
namespace App\Services;
use Illuminate\Http\UploadedFile;

interface CakesService{
    public function getAllCakesPaginated($perPage = 10);

    public function findCake($id);

    public function createCake(array $data, UploadedFile $image = null);

    public function updateCake($id, array $data, UploadedFile $image = null);

    public function deleteCake($id);
}

?>