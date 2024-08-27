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
    if (isset($data['image'])) {
        $data['image'] = $data['image']->store('images', 'public');
    }

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