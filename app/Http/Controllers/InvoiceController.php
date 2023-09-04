<?php

namespace App\Http\Controllers;

use App\Services\InvoiceService;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    protected $invoiceService;

    public function __construct(InvoiceService $invoiceService)
    {
        $this->invoiceService = $invoiceService;
    }

    public function index()
    {
        $invoices = $this->invoiceService->getAllInvoicesWithUserAndTotalPrice();
        return response()->json($invoices, 200);
    }

    // public function show($id)
    // {
    //     $invoice = $this->invoiceService->getInvoiceById($id);
    // }

    public function store(Request $request)
    {
        $data = $request->all();
        $invoice = $this->invoiceService->create($data);

        return response()->json([
            'code' => 200,
            'status' => true,
            'message' => 'Invoice created successfully'
        ]);
    }

    public function show($id)
    {

        $invoice = $this->invoiceService->getInvoiceById($id);
        return response()->json($invoice, 200);
    }

    public function update(Request $request, $id)
    {

        $data = $request->all();
        $this->invoiceService->update($id, $data);

        return response()->json([
            'code' => 200,
            'status' => true,
            'message' => 'Invoice Updated successfully'
        ]);
    }

    public function destroy($id)
    {
        try {
            $this->invoiceService->delete($id);
            return response()->json([
                'code' => 200,
                'status' => true,
                'message' => 'Invoice Updated successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'code' => 500,
                'status' => true,
                'message' => $e->getMessage() . ' ' . $e->getFile() . ':' . $e->getLine(),
            ]);
        }
    }
}
