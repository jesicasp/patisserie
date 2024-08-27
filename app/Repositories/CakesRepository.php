<?php

namespace App\Repositories;

use App\Models\Cakes;

class CakesRepository
{
    protected $model;

    public function __construct(Cakes $model)
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
        $cake = $this->find($id);
        $cake->update($data);
        return $cake;
    }

    public function delete($id)
    {
        $cake = $this->find($id);
        $cake->delete();
        return $cake;
    }
}
