<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = [];
        //echo "day la manager User (Crud)";
        $users = User::paginate(8);
        $data['users'] = $users;
        return view('admin.user.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $userInsert = [
            'name' => $request->name,
            'email'=> $request->email,
            'email_verified_at' => now(),
            'password' => $request->password,
            'phone_number'=> $request->phone_number,
            'remember_token' => Str::random(10),
        ];
        DB::beginTransaction();
        try{
            User::create($userInsert);
            DB::commit();
            return redirect()->route('admin.user.index')->with('sucess', 'Insert into data to Category Sucessful.');

        }catch(Exception $ex){
            echo $ex->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $data = [];
        $users = User::find($id);
        
        $data['users'] = $users;
        return view('admin.user.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = [];
        $users = User::find($id);
        
        $data['users'] = $users;
        return view('admin.user.edit',$data);
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($id);
        DB::beginTransaction();
        
        try{
            $users = User::findOrFail($id);
            // $users->name = $request->name;
            // $users->email = $request->email;
            $users->password = $request->password;
            $users->phone_number = $request->phone_number;

            $users->save();
            
            DB::commit();
            return redirect()->route('admin.user.index')->with('success', 'Update User successful!');
        }catch(Exception $ex){
            echo $ex->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        DB::beginTransaction();

        try {
            $users = User::find($id);
            $users->delete();

            DB::commit();

            return redirect()->route('admin.user.index')
                ->with('success', 'Delete Category successful!');
        }  catch (\Exception $ex) {
            echo $ex->getMessage();
            DB::rollBack();
            // have error so will show error message
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }
}
