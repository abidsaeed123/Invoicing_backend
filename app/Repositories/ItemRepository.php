<?php

namespace App\Repositories;

use App\Models\Item;

class ItemRepository implements ItemRepositoryInterface
{
    protected $model;

    public function __construct(Item $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->all();
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
        $Item = $this->find($id);
        $Item->update($data);
        return $Item;
    }

    public function delete($id)
    {
        $Item = $this->find($id);
        $Item->delete();
    }
}
