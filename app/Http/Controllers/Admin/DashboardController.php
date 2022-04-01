<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function users()
    {


//        if(Auth::user()->user_type == '1'){
//
//            $users = User::with(['users'])->paginate(2);
//
//            return view('admin.users.index',compact('users'));
//        }
//        $users['users'] = User::where('id','=',Auth::user()->id)->paginate(2);
//        return view('admin.users.index')->with($users);


        if(Auth::user()->role_as == 1){
            $users=  User::all();
        }
        else {

                $users = User::where(['id' => Auth::user()->id])->get();
            return redirect()->route('dashboard')
                ->with('Access Denied', 'You are not a Admin');

        }

        return view('admin.users.index',compact('users'));

    }

    public function viewuser($id)
    {

        $users = User::find($id);
        return view('admin.users.view', compact('users'));
    }

}









