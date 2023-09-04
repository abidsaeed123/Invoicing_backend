<?php

namespace App\Repositories;

use App\Models\Invoice;

interface InvoiceRepositoryInterface
{
    public function all();
    public function find($id);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
    public function allWithUserAndTotalPrice();
    public function createAssociateInvoiced(Invoice $invoice, array $invoicedItems);
    // public function updateAssociateInvoiced(Invoice $invoice, array $invoicedItems);
}
