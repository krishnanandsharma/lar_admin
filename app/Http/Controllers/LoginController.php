<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use \Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
// use Input;
use Auth;

class LoginController extends Controller
{
    public function create(Request $request){
        $rules = [
            'username' => 'required|string|min:5|max:255',
			'email' => 'required|string|email|max:255|unique:users,email',
			'country' => 'required',
			'password' => 'required|string|min:8|max:255',
            'image' => 'required|mimes:jpeg,png,jpg',
            'tnc' => 'required|string'
        ];
		$validator = Validator::make($request->all(),$rules);
		if ($validator->fails()) {
            return redirect('register')
			->withInput()
			->withErrors($validator);
		}
		else{
            $data = $request->input();
            // dd($data['tnc']);
			try{
               
                $user = new Users;

                $imageName = time().'.'.$request->image->extension();
                $request->image->move(public_path('uploads/profile_image'), $imageName);

                // $encrypted = crypt::encryptString($password);    
                $user->username = $data['username'];
                $user->password = Hash::make($data['password']);
				$user->country = $data['country'];
				$user->email = $data['email'];
				$user->image = $imageName;
                
                $user->tnc = $data['tnc'];
				$user->save();
                $request->session()->put('reg_success','You have registered successfully! Now You can Login');
				return redirect('register')->with('status',"Insert successfully");
			}
			catch(Exception $e){
                $request->session()->put('reg_error','We are facing some problem!  Try again Later.');
                return redirect('register')->with('failed',"operation failed");
			}
		}
    }
    
    public function login(Request $request)
    {
        
        $rules = [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8|max:255',
           ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
           
            return redirect('secure-login')
            ->withInput()
            ->withErrors($validator);
        }
        else{
           
            $data = $request->input();
            //  dd($data['tnc']);
            try{
                $userdata = array(
                    'email' => $request->email ,
                    'password' => $request->password
                  );
                  if (Auth::attempt($userdata))
                  {
                     //dd(Auth::user()->id);
                    
                    return redirect('home');
                  }
                  else
                  {
                  $request->session()->put('login_error','Login Credential Invalid');
                  return redirect('secure-login');
                  }
            }
            catch(Exception $e){
                $request->session()->put('login_error','We are facing some problem!  Try again Later.');
                return redirect('register')->with('failed',"operation failed");
            }
        }
    }
}
