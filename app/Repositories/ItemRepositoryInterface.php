<?php
// app/Repositories/InvoiceRepositoryInterface.php

namespace App\Repositories;

interface ItemRepositoryInterface
{
    public function all();
    public function find($id);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
}
