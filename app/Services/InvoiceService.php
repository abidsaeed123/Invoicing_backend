<?php

// app/Services/InvoiceService.php

namespace App\Services;

use App\Repositories\InvoiceRepositoryInterface;

class InvoiceService
{
    protected $invoiceRepository;

    public function __construct(InvoiceRepositoryInterface $invoiceRepository)
    {
        $this->invoiceRepository = $invoiceRepository;
    }

    public function getAllInvoices()
    {
        return $this->invoiceRepository->all();
    }

    public function getAllInvoicesWithUserAndTotalPrice()
    {
        return $this->invoiceRepository->allWithUserAndTotalPrice();
    }

    public function getInvoiceById($id)
    {
        return $this->invoiceRepository->find($id);
    }

    public function create(array $data)
    {
        // return $this->invoiceRepository->create($data);
        // // Create the Invoice using the repository
        $invoice = $this->invoiceRepository->create($data);
        // // Associate Invoiced items with the Invoice
        return $this->invoiceRepository->createAssociateInvoiced($invoice, $data['invoiced']);
    }

    public function update($id, array $data)
    {
        $invoice = $this->invoiceRepository->update($id, $data);

        return
            $this->invoiceRepository->createAssociateInvoiced($invoice, $data['invoiced']);
    }

    public function delete($id)
    {
        $this->invoiceRepository->delete($id);
    }
}
