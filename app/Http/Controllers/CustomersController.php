<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Company;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class CustomersController extends Controller
{
    public function index()
    {
        //Search in the Customer table the tuples where 'active' column has 1 value
        $activeCustomers = Customer::active()->get();
        $inactiveCustomers = Customer::inactive()->get();
        // $customers = Customer::all();

        return view(
            'customers.index',
            // [
            //     'activeCustomers' => $activeCustomers,
            //     'inactiveCustomers' => $inactiveCustomers
            // ]
            compact('activeCustomers', 'inactiveCustomers')
        );
    }

    public function create()
    {
        $companies = Company::all();
        return view('customers.create', compact('companies'));
    }
    public function store()
    {
        $data = request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'active' => 'required',
            'company_id' => 'required',
        ]);

        Customer::create($data);

        // $customer = new Customer();
        // $customer->name = request('name');
        // $customer->email = request('email');
        // $customer->active = request('active');
        // $customer->save();

        return redirect('customers');
    }
}
