<?php

namespace App\Services;

use App\Repositories\ChefsRepository;

class ChefsServiceImplement implements ChefsService
{
    protected $chefsRepository;

    public function __construct(ChefsRepository $chefsRepository)
    {
        $this->chefsRepository = $chefsRepository;
    }

    public function getAllChefPaginated($perPage = 10)
    {
        return $this->chefsRepository->getAllPaginated($perPage);
    }

    public function findChef($id)
    {
        return $this->chefsRepository->find($id);
    }

    public function createChef(array $data)
    {
        return $this->chefsRepository->create($data);
    }

    public function updateChef($id, array $data)
    {
        return $this->chefsRepository->update($id, $data);
    }

    public function deleteChef($id)
    {
        return $this->chefsRepository->delete($id);
    }

}