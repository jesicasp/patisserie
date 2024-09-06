<?php

namespace App\Services;

use App\Repositories\CakeVarianRepository;

class CakeVarianServiceImplement implements CakeVarianService
{
    protected $cakeVarianRepository;

    public function __construct(CakeVarianRepository $cakeVarianRepository)
    {
        $this->cakeVarianRepository = $cakeVarianRepository;
    }

    public function getAllCakeVarianPaginated($perPage = 10)
    {
        return $this->cakeVarianRepository->getAllPaginated($perPage);
    }

    public function findCakeVarian($id)
    {
        return $this->cakeVarianRepository->find($id);
    }

    public function createCakeVarian(array $data)
    {
        return $this->cakeVarianRepository->create($data);
    }

    public function updateCakeVarian($id, array $data)
    {
        return $this->cakeVarianRepository->update($id, $data);
    }

    public function deleteCakeVarian($id)
    {
        return $this->cakeVarianRepository->delete($id);
    }

    public function exists($cakeId, $varianId, $id)
    {
        return $this->cakeVarianRepository->exists($cakeId, $varianId, $id);
    }
}
