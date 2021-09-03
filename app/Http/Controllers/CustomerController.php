<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('superAdmin', ['except' => ['index','view','create','store']]);
    // }
    // show all
    public function index()
    {
        $ownCustomers=Customer::where('owner_id',Auth::user()->id)->get();
        $assignCustomers=Customer::where('assigned_id',Auth::user()->id)->get();
        return view('admin.customers.index',compact('ownCustomers','assignCustomers'));
    }
    // view
    public function view(Customer $customer)
    {
        return view('admin.customers.view',compact('customer'));
    }
    // create
    public function create()
    {
        return view('admin.customers.create');
    }
    // store
    public function store(Request $request)
    {

        //Validate
        $request->validate([
            'name' => 'required|min:6',
            'address' => 'required|min:10',
            'assigned_id' => 'required',
        ]);
        $customer=new Customer();
        $customer->name=$request->name;
        $customer->address=$request->address;
        $customer->owner_id=Auth::user()->id;
        $customer->assigned_id=$request->assigned_id;
        $customer->save();
        
        return redirect(route('customers'))->withFlashMessage('تم إضافة العميل بنجاح');
    }
    // edit
    public function edit(Customer $customer)
    {
        return view('admin.customers.edit',compact('customer'));
    }
    // update
    public function update(Request $request,Customer $customer)
    {
         //Validate
        $request->validate([
            'name' => 'required|min:6',
            'address' => 'required|min:10',
            'assigned_id' => 'required',
            
        ]);
        $customer->name=$request->name;
        $customer->address=$request->address;
        $customer->assigned_id=$request->assigned_id;
        
        $customer->save();
        return redirect(route('customers'))->withFlashMessage('تم تعديل العميل بنجاح');
    }
    // delete
    public function delete(Customer $customer)
    {
        $customer->delete();
        return back()->withFlashMessage('تم حذف العميل بنجاح');
    }
    // call
    public function call(Customer $customer)
    {
        $customer->status=1;
        $customer->save();
        
        return back()->withFlashMessage('تم  الاتصال بنجاح');
    }
    // visit
    public function visit(Customer $customer)
    {
        $customer->status=2;
        $customer->save();
       
        return back()->withFlashMessage('تمت المتابعه بنجاح');  
    }
   
}
