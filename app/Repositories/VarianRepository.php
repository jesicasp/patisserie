<?php

namespace App\Repositories;

use App\Models\Varian;


class VarianRepository
{
    protected $model;

    public function __construct(Varian $model)
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
        $varian = $this->find($id);
        $varian->update($data);
        return $varian;
    }

    public function delete($id)
    {
        $varian = $this->find($id);
        $varian->delete();
        return $varian;
    }
}
