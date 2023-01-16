<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Helpers\ResponseHelper;
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
        //query sql
        // $customer = DB::select('select * from customers');

        //query builder
        //model eloquent
        $customer = Customer::all('id', 'first_name', 'last_name', 'id_card_number as ktp', 'date_of_birth as tanggal_lahir', 'hobby');
        return $this->responseHelpers->success(true, "successfully get data customers", $customer);
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
