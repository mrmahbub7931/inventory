<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Carbon\Carbon;
use App\Suppliers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = DB::table('suppliers')->get();
        return view('admin.suppliers.index',compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.suppliers.create');
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
            'shopname' =>  'required',
            'photo' =>  'mimes:jpeg,bmp,png,jpg'
        ]);

        $avatar = $request->file('photo');
        $name = $request->name;
        $supplier_slug = Str::slug($name,'-');
        if (isset($avatar)) {
            $currentDate = Carbon::now()->toDateString();
            $avatarname = $supplier_slug.'-'.$currentDate.uniqid().'.'.$avatar->getClientOriginalExtension();

            if (!Storage::disk('public')->exists('suppliers')) {
                Storage::disk('public')->makeDirectory('suppliers');
            }
            $image = Image::make($avatar)->resize(450, 500)->save($avatarname,80);
            Storage::disk('public')->put('suppliers/'.$avatarname,$image);
        }
        $data = array(
            'name'      =>  $request->name,
            'email'     =>  $request->email,
            'phone'     =>  $request->phone,
            'address'   =>  $request->address,
            'shopname'  =>  $request->shopname,
            'type'      =>  $request->s_type,
            'bank_name'           =>  $request->bank_name,
            'branch_name'         =>  $request->branch_name,
            'account_name'        =>  $request->account_name,
            'account_number'      =>  $request->account_number,
            'account_number'      =>  $request->account_number,
            'routing_number'      =>  $request->routing_number,
            'photo'               =>  $avatarname,
        );

        $suppliers = Suppliers::create($data);
        Toastr::success('Supplier information successfully saved :)', 'Success');
        return redirect()->route('admin.suppliers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Suppliers  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Suppliers $supplier)
    {
        return view('admin.suppliers.show',compact('supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Suppliers  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Suppliers $supplier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Suppliers  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Suppliers $supplier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Suppliers  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Suppliers $supplier)
    {
        if (Storage::disk('public')->exists('suppliers/'.$supplier->photo)) {
            Storage::disk('public')->delete('suppliers/'.$supplier->photo);
        }
        $supplier->delete();
        Toastr::success('Customer information Delete :)', 'Success');
        return redirect()->back();
    }
}
