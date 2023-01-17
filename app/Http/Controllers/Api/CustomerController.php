<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Helpers\ResponseHelper;
use App\Models\Address;
use App\Models\Customer;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    private $responseHelpers;
    function __construct(ResponseHelper $responseHelper)
    {
        $this->responseHelpers = $responseHelper;
    }
    public function getCustomers()
    {
        //all, perlu olahan data
        $customers = Customer::all();
        //with, langsung parse variable ke dalam response
        // $customers = Customer::with('address')->get();
        $resp = [];
        foreach ($customers as $customer) {
            $resp[] = [
                'id' => $customer->id,
                'first_name' => $customer->first_name,
                'last_name' => $customer->last_name,
                'id_card_number' => $customer->id_card_number,
                'date_of_birth' => $customer->date_of_birth,
                'hobby' => $customer->hobby,
                'address' => [
                    'country' => $customer->address->country,
                    'city' => $customer->address->city
                ]
            ];
        }
        return $this->responseHelpers->success(true, "successfully get data customers", $resp);
    }
    public function getCustomerById($id)
    {
        if ($id == 1) {
            $customer = [
                'id' => 1,
                'name' => 'allyvio mahardhika',
                'email' => 'allyviomahardhika@mail.com'
            ];
        } elseif ($id == 2) {
            $customer = [
                'id' => 2,
                'name' => 'ghany ersa',
                'email' => 'ghanyersa@mail.com'
            ];
        } else {
            return $this->responseHelpers->error(false, "not found !", 404);
        }
        return $this->responseHelpers->success(true, "successfully get data customer", $customer);
    }

    public function addresBelongsToCustomers()
    {
        $address = Address::find(1);
        return $address->customer;
    }

    public function storeCustomer(Request $request)
    {
        $data = $request->all();
        $rules = [
            'first_name' => 'required',
            'last_name' => 'required|max:128',
            'id_card_number' => 'required|unique:customers',
            'address' => 'required',
            'date_of_birth' => 'required|date_format:Y-m-d',
        ];
        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            return $this->responseHelpers->error(false, $validator->errors(), 400);
        }
        $customer = Customer::create($data);
        return $this->responseHelpers->success(true, "successfully stored data customer", $customer, 201);
    }
}
