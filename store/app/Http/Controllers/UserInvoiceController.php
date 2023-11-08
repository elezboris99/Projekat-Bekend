<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\InvoiceResource;
use App\Models\Invoice;

class UserInvoiceController extends Controller
{
    
public function index ($user_id){

    $invoices = Invoice::get()->where('user_id', $user_id);
if(is_null($invoices))
return response()->json("Data not found!");
return response()->json(InvoiceResource::collection($invoices));
}



}
