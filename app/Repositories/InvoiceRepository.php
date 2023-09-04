<?php

// app/Repositories/InvoiceRepository.php

namespace App\Repositories;

use App\Models\Invoice;

class InvoiceRepository implements InvoiceRepositoryInterface
{
    protected $model;

    public function __construct(Invoice $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function allWithUserAndTotalPrice()
    {
        return Invoice::withUserAndTotalPrice()->get();
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function create(array $data)
    {
        return Invoice::create($data);
    }

    public function createAssociateInvoiced(Invoice $invoice, array $invoicedItems)
    {
        $invoice->invoiced()->delete();
        return $invoice->invoiced()->createMany($invoicedItems);
    }

    public function update($id, array $data)
    {
        $invoice = $this->find($id);
        $invoice->update($data);
        return $invoice;
    }

    public function delete($id)
    {
        $invoice = $this->find($id);
        if ($invoice) {
            $invoice = $this->find($id);
            $invoice->invoiced()->delete();
            $invoice->delete();
        }
    }
}
