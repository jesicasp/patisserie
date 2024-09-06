<?php

namespace App\Services;

use App\Repositories\VarianRepository;

class VarianServiceImplement implements VarianService
{
    protected $varianRepository;

    public function __construct(VarianRepository $varianRepository)
    {
        $this->varianRepository = $varianRepository;
    }

    public function getAllVarianPaginated($perPage = 10)
    {
        return $this->varianRepository->getAllPaginated($perPage);
    }

    public function findVarian($id)
    {
        return $this->varianRepository->find($id);
    }

    public function createVarian(array $data)
    {
        return $this->varianRepository->create($data);
    }

    public function updateVarian($id, array $data)
    {
        return $this->varianRepository->update($id, $data);
    }

    public function deleteVarian($id)
    {
        return $this->varianRepository->delete($id);
    }

}