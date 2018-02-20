<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use Illuminate\Http\Request;
use App\ComputerMutation;
use App\Department;
use App\Position;
use App\Religion;
use App\Employee;
use App\Branch;
use App\Duty;

class EmployeeController extends Controller
{
   public function index()
   {
      $employees = Employee::orderBy('name', 'asc')->get();
      return view('employees.index', compact('employees'));
   }

   public function create()
   {
      $religions = Religion::orderBy('name', 'asc')->get();
      return view('employees.create', compact('religions'));
   }

   public function store(Request $request)
   {
      $this->validate($request, [
         'nik'          => 'required',
         'name'         => 'required',
         'placeOfBirth' => 'required',
         'dateOfBirth'  => 'required',
         'blood'        => 'required',
         'sex'          => 'required',
         'religion'     => 'required',
      ]);

      $employee = Employee::create([
         'nik'             => $request->nik,
         'name'            => $request->name,
         'placeOfBirth'    => $request->placeOfBirth,
         'dateOfBirth'     => $request->dateOfBirth,
         'blood'           => $request->blood,
         'sex'             => $request->sex,
         'religion_id'     => $request->religion,
         'email'           => 'test@gmail.com',
         'password'        => bcrypt('123123'),
      ]);

      return back()->with('success', 'Data saved');
   }

   public function detail($id)
   {
      $departments   = Department::orderBy('name', 'asc')->get();
      $positions     = Position::orderBy('name', 'asc')->get();
      $branches      = Branch::orderBy('name', 'asc')->get();
      $duties        = Duty::orderBy('name', 'asc')->get();
      $employee      = Employee::findOrFail($id);
      $computers     = ComputerMutation::whereHas('mutation', function($query) use ($id) {
          $query->where('employee_id', $id);})->get();

      return view('employees.detail', compact('departments', 'positions', 'branches', 'duties', 'employee', 'computers'));
   }

   public function loginForm()
   {
      return view('employees.login');
   }
}
