<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use \Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Exception;
use Auth;

class EmployeeController extends Controller
{
    public function create(Request $req){
        $rules = [
            'ename' => 'required|string|min:3|max:255',
			'email' => 'required|string|email|max:255|unique:employee,email',
			'password' => 'required_with:cnf_password|same:cnf_password|string|min:8|max:20',
			'cnf_password' => 'string|min:8|max:20',
			'contact' => 'required|integer|unique:employee,contact',
            'dob' => 'required',
            'zipcode' =>'required',
            'gender' => 'required',
            'empimg' => 'required|mimes:jpeg,png,jpg',

        ];
		$validator = Validator::make($req->all(),$rules);
		if ($validator->fails()) {
            return redirect('form')
			->withInput()
			->withErrors($validator);
		}
		else{
            $data = $req->input();
			try{
                
                $emp = new Employee;
                $empimg = time().'.'.$req->empimg->getClientOriginalName();
                $req->empimg->move(public_path('employee/profile_image'), $empimg);
                $images=array();
                if($files=$req->file('images')){
                    foreach($files as $file){
                        $name=$file->getClientOriginalName();
                        $file->move(public_path('employee/gallery'),$name);
                        $images[]=$name;
                    }
                }
                Employee::insert( [
                    'ename'=>$data['ename'],
                    'email'=>$data['email'],
                    'password'=>Hash::make($data['password']),
                    'contact'=>$data['contact'],
                    'dob'=>$data['dob'],
                    'zipcode'=>$data['zipcode'],
                    'gender'=>$data['gender'],
                    'empimg'=>$empimg,
                    'images'=>  implode("|",$images)
                ]);
    
                $req->session()->put('emp_success','You have enrolled successfully!');
				return redirect('form')->with('status',"Insert successfully");
			}
			catch(Exception $e){
                $req->session()->put('emp_error','We are facing some problem!  Try again Later.');
                return redirect('form')->with('failed',"operation failed");
			}
		}
    }
    
}
