<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Employee;
use App\Payroll;
use App\TimeSheet;
use Illuminate\Support\Facades\Validator;
use DB;
use App;
use PDF;
use Mail;

class ApiController extends Controller
{
    public function getAllEmployees() {
      	// logic to get all employees goes here
      	$employees = Employee::get();

      	foreach ($employees as $key => $value) {
      		$value->employee_image = url('/').'/public/images/'.$value->employee_image;
      	}

      	return response()->json([
	        "data" => $employees
	    ], 200);
    }

    public function createEmployee(Request $request) {

    	// logic to create a employee record goes here

    	//print_r($request->all());die;

	    $validator = Validator::make($request->all(), [
     	   'employee_firstname' => 'required',
     	   'employee_lastname' => 'required',
     	   'employee_email'=>'required|email',
     	   'employee_phone_primary'=>'required|numeric',
     	   'employee_phone_secondary'=>'numeric',
     	   'employee_designation'=>'required',
     	   'employee_reporting_manager'=>'required',
     	   'employee_date_of_join'=>'required'
		]);

	    if ($validator->fails()) {
	    	$msg = $validator->errors();
	    	$code = 500;
	    }else{

    	$employee = new Employee;

    	if ($request->hasFile('employee_image')) {
	        $image = $request->file('employee_image');
	        $name = str_slug($request->employee_firstname).'.'.$image->getClientOriginalExtension();
	        $destinationPath = public_path('/images');
	        $imagePath = $destinationPath. "/".  $name;
	        $image->move($destinationPath, $name);
	        $employee->employee_image = $name;
      	}else{
    		$employee->employee_image = "";
    	}

	    $employee->employee_firstname = $request->employee_firstname;
	    $employee->employee_middlename = $request->employee_middlename;
	    $employee->employee_lastname = $request->employee_lastname;
	    $employee->employee_phone_primary = $request->employee_phone_primary;
	    $employee->employee_phone_secondary = $request->employee_phone_secondary;
	    $employee->employee_email = $request->employee_email;
	    $employee->employee_designation = $request->employee_designation;
	    $employee->employee_reporting_manager = $request->employee_reporting_manager;
	    $employee->employee_date_of_join = $request->employee_date_of_join;
	    $employee->save();

	    $msg = "Employee record created";
	    $code = 201;

		}

		return response()->json([
	        "message" => $msg
	    ], $code);

    }

    public function getEmployee($id) {
      // logic to get a employee record goes here
      if (Employee::where('employee_id', $id)->exists()) {
        $employee = Employee::where('employee_id', $id)->first();
        $employee->employee_image = url('/').'/public/images/'.$employee->employee_image;
        return response($employee, 200);
      } else {
        return response()->json([
          "message" => "Employee not found"
        ], 404);
      }
    }

    public function updateEmployee(Request $request, $id) {
      // logic to update a employee record goes here
      if (Employee::where('employee_id', $id)->exists()) {

      	$validator = Validator::make($request->all(), [
     	   'employee_firstname' => 'required',
     	   'employee_email'=>'required|email',
     	   'employee_phone_primary'=>'numeric',
     	   'employee_phone_secondary'=>'numeric'
		]);

	    if ($validator->fails()) {
	    	return response()->json([
            	"message" => $validator->errors()
        	], 500);
	    }else{

        $employee = Employee::find($id);

        if ($request->hasFile('employee_image')) {
	        $image = $request->file('employee_image');
	        $name = str_slug($request->employee_firstname).'.'.$image->getClientOriginalExtension();
	        $destinationPath = public_path('/images');
	        $imagePath = $destinationPath. "/".  $name;
	        $image->move($destinationPath, $name);
	        $employee->employee_image = $name;
      	}else{
    		$employee->employee_image = $request->employee_image_old;
    	}

	    $employee->employee_firstname = $request->employee_firstname;
	    $employee->employee_middlename = $request->employee_middlename;
	    $employee->employee_lastname = $request->employee_lastname;
	    $employee->employee_phone_primary = $request->employee_phone_primary;
	    $employee->employee_phone_secondary = $request->employee_phone_secondary;
	    $employee->employee_email = $request->employee_email;
	    $employee->employee_designation = $request->employee_designation;
	    $employee->employee_reporting_manager = $request->employee_reporting_manager;
	    $employee->employee_date_of_join = $request->employee_date_of_join;
	    $employee->save();

        return response()->json([
            "message" => "records updated successfully"
        ], 200);
        }
        } else {
        return response()->json([
            "message" => "Employee not found"
        ], 404);
        
    	}
    }

    public function deleteEmployee ($id) {
      // logic to delete a employee record goes here
      if(Employee::where('employee_id', $id)->exists()) {
        $employee = Employee::find($id);
        $employee->delete();

        return response()->json([
          "message" => "Records deleted"
        ], 202);
      } else {
        return response()->json([
          "message" => "Employee not found"
        ], 404);
      }
    }

    // Payroll API
    public function createPayroll(Request $request) {

    	// logic to create a payroll record goes here

    	//print_r($request->all());die;

	    $validator = Validator::make($request->all(), [
     	   'p_employee_id' => 'required',
     	   'p_basic_salary'=>'required'
		]);

	    if ($validator->fails()) {
	    	$msg = $validator->errors();
	    	$code = 500;
	    }else{

    	$payroll = new Payroll;

		$payroll->p_employee_id = $request->p_employee_id;
		$payroll->p_basic_salary = $request->p_basic_salary;
		$payroll->p_hra = $request->p_hra;
		$payroll->p_fix_convevance = $request->p_fix_convevance;
		$payroll->p_medical_allowance = $request->p_medical_allowance;
		$payroll->p_internet_allowance = $request->p_internet_allowance;
		$payroll->p_telephone = $request->p_telephone;
		$payroll->p_prof_development = $request->p_prof_development;
		$payroll->p_special_allowance = $request->p_special_allowance;
		$payroll->p_employee_provident_fund = $request->p_employee_provident_fund;
		$payroll->p_employer_provident_fund = $request->p_employer_provident_fund;
		$payroll->p_tds = $request->p_tds;
		$payroll->p_prof_tax = $request->p_prof_tax;
		$payroll->p_other = $request->p_other;
	    $payroll->save();

	    $msg = "Payroll added successfully";
	    $code = 201;

		}

		return response()->json([
	        "message" => $msg
	    ], $code);

    }

    public function getPayroll($id) {
      // logic to get a payroll record goes here
      if (Employee::where('employee_id', $id)->exists()) {
        $pay = Employee::with('payroll','timesheet')->where('employee_id', $id)->get()->toArray();
        return response($pay, 200);
      } else {
        return response()->json([
          "message" => "Pay Slip not found"
        ], 404);
      }
    }

    public function addEmployeeWorkingDays(Request $request){

    	$validator = Validator::make($request->all(), [
     	   'employee_id' => 'required',
     	   'month' => 'required',
     	   'year' => 'required',
     	   'working_days'=>'required|numeric',
     	   'leave_days'=>'required|numeric'
		]);

	    if ($validator->fails()) {
	    	$msg = $validator->errors();
	    	$code = 500;
	    }else{

    	$times = new TimeSheet;
    	$times->t_employee_id = $request->employee_id;
    	$times->month = $request->month;
    	$times->year = $request->year;
    	$times->working_days = $request->working_days;
    	$times->leave_days = $request->leave_days;
	    $times->save();

	    $msg = "TimeSheet record created";
	    $code = 201;

	    }

	    return response()->json([
	        "message" => $msg
	    ], $code);

    }

    public function downloadPDF($id){
      $user = Employee::where('employee_id', $id)->first()->toArray();
      $pdf = PDF::loadView('pdf', $user);
      return $pdf->download('invoice.pdf');

    }

    public function sendEmailPDF($id){
    	$user = Employee::where('employee_id', $id)->first()->toArray();
    	$pdf = PDF::loadView('pdf', $user)->setPaper('a4'); 
    	Mail::send('pdf', $user, function($message) use ($user,$pdf){
            $message->from('ubaid5402@gmail.com');
            $message->to($user['employee_email']);
            $message->subject('PaySlip');
            //Attach PDF doc
            $message->attachData($pdf->output(),'payslip.pdf');
        });

        return response()->json([
	        "message" => "Sent"
	    ], 200);
    }
}
