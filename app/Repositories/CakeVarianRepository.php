<?php

namespace App\Repositories;

use App\Models\CakeVarian;


class CakeVarianRepository
{
    protected $model;

    public function __construct(CakeVarian $model)
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
        $cake_varian = $this->find($id);
        $cake_varian->update($data);
        return $cake_varian;
    }

    public function delete($id)
    {
        $cake_varian = $this->find($id);
        $cake_varian->delete();
        return $cake_varian;
    }

    public function exists($cakeId, $varianId, $id)
    {
        return $this->model->where('cake_id', $cakeId)
                           ->where('varian_id', $varianId)
                           ->where('id', '!=', $id)
                           ->exists();
    }
}
