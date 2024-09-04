<?php

namespace App\Repositories;

use App\Models\Chefs;

class ChefsRepository
{
    protected $model;

    public function __construct(Chefs $model)
    {
        $this->model = $model;
    }

    public function getAllPaginated($perPage = 10)
    {
        return $this->model->paginate($perPage);
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        $chef = $this->find($id);
        $chef->update($data);
        return $chef;
    }

    public function delete($id)
    {
        $chef = $this->find($id);
        $chef->delete();
        return $chef;
    }
}
