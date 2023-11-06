<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\InvoiceResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
  $invoices = Invoice::all();
  return (InvoiceResource::collection($invoices));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required',
            'quantity' => 'required',
            
            
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $invoice =Invoice::create([
            'user_id' => Auth::user()->id ,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity
           
        ]);

        return response()->json(["Uspesno dodana narudzba",new InvoiceResource($invoice)]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoice $invoice)
    {
        return new InvoiceResource($invoice);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Invoice $invoice)
    {
        $validator = Validator::make($request->all(), [
            'user_id'=>'required',
            'product_id' => 'required',
            'quantity' => 'required',
            
            
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $invoice->user_id=$request->user_id;
        $invoice->product_id = $request->product_id;
        $invoice->quantity = $request->quantity;
        
       

        $invoice->save();
        return response()->json(["Uspesno izmenjena narudzba!",  new InvoiceResource($invoice)]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice)
    {
        $invoice->delete();
        return response()->json("Narudzba je izbrisana!");
    }
}
