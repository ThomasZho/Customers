<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Company;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class CustomersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }
    public function index()
    {
        $customers = Customer::all();
        //Search in the Customer table the tuples where 'active' column has 1 value
        // $activeCustomers = Customer::active()->get();
        // $inactiveCustomers = Customer::inactive()->get();

        return view(
            'customers.index',
            // [
            //     'activeCustomers' => $activeCustomers,
            //     'inactiveCustomers' => $inactiveCustomers
            // ]
            compact('customers')
        );
    }

    public function create()
    {
        $companies = Company::all();
        $customer = new Customer();
        return view('customers.create', compact('companies', 'customer'));
    }

    public function store()
    {
        // $data = request()->validate([
        //     'name' => 'required|min:3',
        //     'email' => 'required|email',
        //     'active' => 'required',
        //     'company_id' => 'required',
        // ]);
        // Customer::create($data);
        Customer::create($this->validateRequest());

        // $customer = new Customer();
        // $customer->name = request('name');
        // $customer->email = request('email');
        // $customer->active = request('active');
        // $customer->save();

        return redirect('customers');
    }

    // public function show($customer)
    // {
    //     //Find by ID
    //     // $customer = Customer::find($customer);

    //     $customer = Customer::where('id', $customer)->firstOrFail();

    //     return view('customers.show', compact('customer'));
    // }

    //Route Model Binding
    public function show(Customer $customer)
    {
        return view('customers.show', compact('customer'));
    }

    public function edit(Customer $customer)
    {
        $companies = Company::all();
        return view('customers.edit', compact('customer', 'companies'));
    }
    public function update(Customer $customer)
    {
        $customer->update($this->validateRequest());

        return redirect('customers/' . $customer->id);
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect('customers');
    }

    private function validateRequest()
    {
        return request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'active' => 'required',
            'company_id' => 'required',
        ]);
    }
}
