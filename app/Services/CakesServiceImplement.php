<?php

namespace App\Services;
use App\Repositories\CakesRepository;


class CakesServiceImplement implements CakesService{

    protected $cakesRepository;

    public function __construct(CakesRepository $cakesRepository)
    {
        $this->cakesRepository = $cakesRepository;
    }

    public function getAllCakesPaginated($perPage = 10)
    {
        return $this->cakesRepository->getAllPaginated($perPage);
    }

    public function findCake($id)
    {
        return $this->cakesRepository->find($id);
    }

    public function createCake(array $data)
    {
    return $this->cakesRepository->create($data);
    }

public function updateCake($id, array $data)
{
    $cake = $this->cakesRepository->find($id);

    if (isset($data['image']) && $data['image'] !== $cake->image) {
        if ($cake->image) {
            $oldImagePath = storage_path('app/public/' . $cake->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }

        // Jika 'image' adalah instance dari UploadedFile, simpan file baru
        // Jika tidak, berarti 'image' adalah path yang sudah ada
        if ($data['image'] instanceof \Illuminate\Http\UploadedFile) {
            $data['image'] = $data['image']->store('images', 'public');
        }
    } else {
        // Tetapkan gambar lama jika tidak ada gambar baru
        $data['image'] = $cake->image;
    }

    return $this->cakesRepository->update($id, $data);
}


    public function deleteCake($id)
    {
        $cake = $this->cakesRepository->find($id);
        if ($cake->image) {
            $oldImagePath = storage_path('app/public/' . $cake->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }
        return $this->cakesRepository->delete($id);
    }

}

?>