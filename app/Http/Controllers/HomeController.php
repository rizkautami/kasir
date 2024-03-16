<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index()
    {
     $data = array(
         'title' => 'Data User',
         'data_user' => User::all(),
 
     );
         return view('admin.master.user.list',$data);
    }
   
}
