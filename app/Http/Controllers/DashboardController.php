<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\DB;
use Auth;
use Session;

class DashboardController extends Controller
{
    //
    public function __construct()
    {
        $this -> middleware('auth');
    }
    public function index()
    {
        $users = Users::count('*');
        $images = Users::where('image','!=','');
        $img_count = $images->count();
        
        return view('index',['users'=>$users,'no_images'=>$img_count]);
    }
    public function profile($id)
    {
        $users = Users::select('*')->where('id',$id)->get();
        // die($users);
        
        return view("profile",['users'=>$users]);
    }
}
?>