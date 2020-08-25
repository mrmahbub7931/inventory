<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Carbon\Carbon;
use App\Customers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = DB::table('customers')->get();
        return view('admin.customers.index',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'phone' => 'required|unique:employees',
            'address'   =>  'required',
            'photo' =>  'mimes:jpeg,bmp,png,jpg'
        ]);

        $avatar = $request->file('photo');
        $name = $request->name;
        $customer_slug = Str::slug($name,'-');
        if (isset($avatar)) {
            $currentDate = Carbon::now()->toDateString();
            $avatarname = $customer_slug.'-'.$currentDate.uniqid().'.'.$avatar->getClientOriginalExtension();

            if (!Storage::disk('public')->exists('customers')) {
                Storage::disk('public')->makeDirectory('customers');
            }
            $image = Image::make($avatar)->resize(450, 500)->save($avatarname,80);
            Storage::disk('public')->put('customers/'.$avatarname,$image);
        }
        $data = array(
            'name'  =>  $request->name,
            'phone'  =>  $request->phone,
            'address'  =>  $request->address,
            'shopname'  =>  $request->shopname,
            'photo'  =>  $avatarname,
        );

        $customers = Customers::create($data);
        Toastr::success('Customers information successfully saved :)', 'Success');
        return redirect()->route('admin.customers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customers  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customers $customer)
    {
        return view('admin.customers.show',compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customers  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customers $customer)
    {
        return $customer;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customers  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customers $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customers  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customers $customer)
    {
        if (Storage::disk('public')->exists('customers/'.$employee->photo)) {
            Storage::disk('public')->delete('customers/'.$employee->photo);
        }
        $employee->delete();
        Toastr::success('Customer information Delete :)', 'Success');
        return redirect()->back();
    }
}
