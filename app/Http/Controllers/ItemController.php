<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::get();

        // $response = [
        //     'status' => true,
        //     'code' => $code,
        //     'message' => $message,
        //     'payload'    => $result,
        // ];
        return response()->json($items, 200);
        // $invoices = $this->invoiceService->getAllInvoices();
    }
}
