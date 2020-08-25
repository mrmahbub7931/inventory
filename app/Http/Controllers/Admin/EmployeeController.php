<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Carbon\Carbon;
use App\Employee;
use App\Education;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $employee = Employee::get();
        $employees = DB::table('employees')
                    ->select('id','name','email','phone','department_name','designation')
                    ->get();
        return view('admin.employee.index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.employee.create');
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
            'email' => 'required|email|unique:employees',
            'phone' => 'required|unique:employees',
            'address'   =>  'required',
            'age'   => 'required',
            'birth_date' => 'required',
            'hired_date' => 'required',
            'designation' => 'required',
            'department_name' => 'required',
            'experience' => 'required',
            'salary' => 'required',
            'yearly_holiday' => 'required',
            'photo' =>  'mimes:jpeg,bmp,png,jpg'
        ]);

        $avatar = $request->file('photo');
        $name = $request->name;
        $employee_slug = Str::slug($name,'-');
        if (isset($avatar)) {
            $currentDate = Carbon::now()->toDateString();
            $avatarname = $employee_slug.'-'.$currentDate.uniqid().'.'.$avatar->getClientOriginalExtension();

            if (!Storage::disk('public')->exists('employees')) {
                Storage::disk('public')->makeDirectory('employees');
            }
            $image = Image::make($avatar)->resize(450, 500)->save($avatarname,80);
            Storage::disk('public')->put('employees/'.$avatarname,$image);
        }


        $data = array(
            'name'  =>  $name,
            'name_slug' => $employee_slug,
            'phone'  =>  $request->phone,
            'age'  =>  $request->age,
            'email'  =>  $request->email,
            'address'  =>  $request->address,
            'experience'  =>  $request->experience,
            'birth_date'  =>  $request->birth_date,
            'hired_date'  =>  $request->hired_date,
            'national_id'  =>  $request->national_id,
            'department_name'  =>  $request->department_name,
            'designation'  =>  $request->designation,
            'salary'  =>  $request->salary,
            'yearly_holiday'  =>  $request->yearly_holiday,
            'photo'  =>  $avatarname,
        );

        $employee = Employee::create($data);

        $education_level = $request->education_level;
        $major = $request->major;
        $board = $request->board;
        $institute_name = $request->institute_name;
        $cgpa = $request->cgpa;
        $scale_of_cgpa = $request->scale_of_cgpa;
        $year_of_passing = $request->year_of_passing;
        $duration = $request->duration;

        $employee_slug = $request->name;
        $employee_name = Str::slug($employee_slug,'-');
        // dump($education_level);
        for ($count=0; $count < count($education_level); $count++) { 
            
            $employee_data = array(
                'education_level' => $education_level[$count],
                'employee_id' =>  $employee->id,
                'major' => $major[$count],
                'board' => $board[$count],
                'institute_name' => $institute_name[$count],
                'cgpa' => $cgpa[$count],
                'scale_of_cgpa' => $scale_of_cgpa[$count],
                'year_of_passing' => $year_of_passing[$count],
                'duration' => $duration[$count],
            );

            $education = Education::insert($employee_data);
        }
        Toastr::success('Employee information successfully saved :)', 'Success');
        return redirect()->route('admin.employee.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return view('admin.employee.show',compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        return view('admin.employee.edit',compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        if (Storage::disk('public')->exists('employees/'.$employee->photo)) {
            Storage::disk('public')->delete('employees/'.$employee->photo);
        }
        $employee->delete();
        Toastr::success('Employee information Delete :)', 'Success');
        return redirect()->back();
    }
}
