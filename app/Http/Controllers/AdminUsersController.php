<?php

namespace App\Http\Controllers;

use App\User;

use App\Role;
use App\Photo;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\UsersRequest;


class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $roles = Role::lists('name', 'id')->all();
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {

        $input = $request->all();

        if($file = $request->file('photo_id')) {
            
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name); //stores images in public directory, if dir does not exist "move" will create it
            
            $photo = Photo::create(['file'=>$name]);
            
            $input['photo_id'] = $photo->id;

            //return "photo exists";

        }

        $input['password'] = bcrypt($request->password);

        User::create($input);

        return redirect('/admin/users');


        //User::create($request->all()); //updated when file was added
        //return redirect('/admin/users');
     
        
        //return $request->save();
        //
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
        return view('admin.users.show');
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
        return view('admin.users.edit');
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
        //
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
    }
}
