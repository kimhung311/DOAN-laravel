<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class CustomerController extends Controller
{
    //
    public function index(Request $request){
        //echo "day la manager Customer";
        $data = [];
        // get list data of table products
        $users = User::orderBy('id', 'desc')->paginate(4);
        // add new param to search
        // search post name
        if (!empty($request->name)) {
            $users = User::whereDate('created_at', $request->created_at)
                    ->orWhere('name', 'like', '%' . $request->name . '%')
                    ->orderBy('id', 'desc')
                    ->paginate(4);
            // dd($users);
        }

        // search created_at
        // if (!empty($request->created_at)) {
        //     $users = $users->where('created_at', 'like', '%' . $request->created_at . '%');
        // }
        
        // order ID desc
        // $users = User::orderBy('id', 'desc')->get();
        
        // pagination
        // $users = $users->paginate(User::PAGE_LIMIT);

        // $users = User::paginate('4');

        $data['users'] = $users;
        
        return view('admin.customer.index',$data);
    }
    public function search(Request $request)
    {
        // dd($request->name);
        // \DB::enableQueryLog();

        $users = User::where('name', 'like', '%' . $request->name . '%')
                    ->paginate(4);
                    // dd($users);
                    // info(\DB::getQueryLog());
        $data['users'] = $users;
        return view('admin.customer.search',$data);
    }
}
