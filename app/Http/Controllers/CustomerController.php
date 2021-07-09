<?php
namespace App\Http\Controllers;
use App\Customer;
use Illuminate\Http\Request;
class CustomerController extends Controller
{
    public function index()
    {
      $customers = Customer::all();
      return response()->json($customers, 200);
    }
    public function store(Request $request)
    {
      $customer = Customer::create($request->all());
      return response()->json($customer, 200);
    }
    public function show(Customer $customer)
    {
        return response()->json($customer, 200);
    }
    public function edit(Customer $customer)
    {
        return response()->json($customer, 200);
    }
    public function update(Request $request, Customer $customer)
    {
      $customer->update($request->all());
      return response()->json($customer, 200);
    }
    public function destroy(Customer $customer)
    {
      $customer->delete();
      return response()->json(null, 204);
    }
}
