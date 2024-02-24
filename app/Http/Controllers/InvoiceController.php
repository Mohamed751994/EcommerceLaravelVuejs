<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvoiceRequest;
use Illuminate\Http\Request;
use App\Traits\MainTrait;
use App\Models\Invoice;
class InvoiceController extends Controller
{
    use MainTrait;
    public function create_new_invoice(InvoiceRequest $request)
    {
        try {
            $data = $request->validated();

            $data['products'] = json_encode($data['products']);
            $data['invoiceID'] = rand(1111111111, 9999999999);
            $invoice = Invoice::create($data);
         //   $invoice['products'] = json_decode($data['products']);
            return $this->successResponse('تم إضافة الفاتورة بنجاح',  $invoice);
        } catch (\Throwable $th) {
            return $this->errorResponse($th->getMessage());
        }
    }


    public function get_all_invoices(Request $request)
    {
        try {
            $invoices =Invoice::latest()->get();
            return $this->successResponse('جميع الفواتير', $invoices);
        } catch (\Throwable $th) {
            return $this->errorResponse($th->getMessage());
        }
    }

    public function get_single_invoice($id)
    {
        try {

            $invoice = Invoice::find($id);
            if(!$invoice)
            {
                return $this->errorResponse('الفاتورة غير موجودة');
            }
            $invoice['products'] = json_decode($invoice['products']);
            return $this->successResponse('بيانات الفاتورة', $invoice);
        } catch (\Throwable $th) {
            return $this->errorResponse($th->getMessage());
        }
    }
}
