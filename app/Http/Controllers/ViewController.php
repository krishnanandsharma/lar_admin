<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Validator;
use DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Employee;
use App\Models\Users;
use Session;
use Exception;


class ViewController extends Controller
{
    public function buttons()
    {
        return view('pages/ui-features/buttons');
    }
    public function typography()
    {
        return view('pages/ui-features/typography');
    }
    public function icon()
    {
        return view('pages/icons/mdi');
    }
    public function form()
    {
        return view('pages/forms/basic_elements');
    }
    public function chart()
    {
        return view('pages/charts/chartjs');
    }
    public function table()
    {
        $emps = Employee::select('id', 'ename', 'email', 'contact', 'dob', 'zipcode', 'gender', 'empimg', 'images')->get();

        return view('pages/tables/basic-table', ['emps' => $emps]);
    }
    public function blankpage()
    {
        return view('pages/samples/blank-page');
    }
    public function login()
    {
        return view('pages/samples/login');
    }
    public function register()
    {
        return view('pages/samples/register');
    }
    public function error404()
    {
        return view('pages/samples/error-404');
    }
    public function error500()
    {
        return view('pages/samples/error-500');
    }
    public function edit_form($id)
    {
        $up_emp = Employee::where('id', $id)->get();
        return view('pages/forms/basic_elements', ['up_emps' => $up_emp]);
    }
    public function delete_form($id)
    {
        Employee::destroy($id);
        return view('pages/forms/basic-table');
    }
    public function sub_edit_form(Request $req, $id)
    {
        $rules = [
            'ename' => 'required|string|min:3|max:255',
            'email' => 'required|string|email|max:255',
            'contact' => 'required|integer',
            'dob' => 'required',
            'zipcode' => 'required',
            'gender' => 'required',
            'empimg' => 'mimes:jpeg,png,jpg',
        ];
        $validator = Validator::make($req->all(), $rules);
        if ($validator->fails()) {
            return redirect('form')
                ->withInput()
                ->withErrors($validator);
        } else {
            $emp_updt = $req->input();
            try {
                $emp_arr = array(
                    'ename' => $emp_updt['ename'],
                    'email' => $emp_updt['email'],
                    'contact' => $emp_updt['contact'],
                    'dob' => $emp_updt['dob'],
                    'zipcode' => $emp_updt['zipcode'],
                    'gender' => $emp_updt['gender'],
                );
                if ($req->hasFile('empimg')) {
                    $emp_img = $_FILES['empimg'];
                    $empimg = time() . '.' . $req->empimg->getClientOriginalName();
                    $req->empimg->move(public_path('employee/profile_image'), $empimg);
                    $emp_arr['empimg'] = $empimg;
                }
                $affected = DB::table('employee')
                    ->where('id', $id)
                    ->update($emp_arr);

                $req->session()->put('emp_success', 'You have enrolled successfully!');
                return redirect('basic-table')->with('status', "Insert successfully");
            } catch (Exception $e) {
                $req->session()->put('emp_error', 'We are facing some problem!  Try again Later.');
                return redirect('form')->with('failed', "operation failed");
            }
        }
    }
    public function edit_profile($id)
    {
        $id = base64_decode($id);
        $users = Users::select('*')->where('id', $id)->get();
        return view('edit-profile', ['users' => $users]);
    }
    public function edit_profile_form(Request $req, $id)
    {
        $users = Users::select('*')->where('id', $id)->get();
        $rules = [
            'username' => 'required|string|min:3|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'same:cnf_password',
            'image' => 'mimes:jpeg,png,jpg',
        ];
        $validator = Validator::make($req->all(), $rules);

        if ($validator->fails()) {
            return redirect('edit-profile/'.$id)
                ->withInput()
                ->withErrors($validator);
        } else {
            $user_updt = $req->input();
            try {
                $user_arr = array(
                    'username' => $user_updt['username'],
                    'email' => $user_updt['email'],
                    'password' => Hash::make($user_updt['password']),
                    'country' => $user_updt['country']
                );
                if ($req->hasFile('image')) {
                    $user_img = $_FILES['image'];
                    $img_name = $req->image->getClientOriginalName();
                    $req->image->move(public_path('uploads/profile_image'), $img_name);
                    $user_arr['image'] = $img_name;
                }
                $affected = DB::table('users')
                    ->where('id', $id)
                    ->update($user_arr);

                $req->session()->put('emp_success', 'You have enrolled successfully!');
                return redirect('my-profile/'.$id)->with('status', "Insert successfully");
            } catch (Exception $e) {
                $req->session()->put('emp_error', 'We are facing some problem!  Try again Later.');
                return redirect('my-profile')->with('failed', "operation failed");
            }
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();
        Session::flush();
        // dd(session()->all());
        return redirect('secure-login');
    }
}
