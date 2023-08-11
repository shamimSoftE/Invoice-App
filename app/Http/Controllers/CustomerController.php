<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function customerList()
    {
        $customers = Customer::orderBy('id', 'asc')->get();
        return response()->json(['customers' => $customers],200);
    }

    public function customerSearch(Request $request)
    {
        $search = $request->get('c');

        if ($search != null) {
            $customers = Customer::where('firstname', 'LIKE', "%$search%")->get();
            return response()->json(['customers' => $customers],200);
        }else{
            return $this->customerList();
        }
    }

    public function customerStore(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'date' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
                // 'error' => $validator->errors()->first()
            ], 422);
        }
        Customer::create($request->all());

        return response()->json(['success', 'Customer Created Successfully']);
    }

    public function customerEdit($id)
    {
        try {
            $customer = Customer::findOrFail($id);
            return response()->json([
                'status' => 200,
                'customer' => $customer
            ],200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 404,
                'message' => "Customer Not Found"
            ],404);
        }
    }


    public function customerUpdate(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'date' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
                // 'error' => $validator->errors()->first()
            ], 422);
        }

       try {
            $customer = Customer::findOrFail($request->id);
            $customer->update($request->all());

            return response()->json(['status' => 200,
                                'message' => 'Customer Updated']);
       } catch (\Throwable $th) {
            return response()->json(['status' => 404,
                                'message' => 'Customer Not Updated']);
       }
    }

    public function customerDelete($id)
    {
        try {
             Customer::findOrFail($id)->delete();
             return response()->json(['status' => 200,
             'message' => 'Customer Deleted']);
        } catch (\Throwable $th) {
            return response()->json(['status' => 404,
            'message' => 'Customer Not Deleted']);
        }
    }

}
