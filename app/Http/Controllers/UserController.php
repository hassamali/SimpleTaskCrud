<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\CreateUser;
use App\Http\Requests\UpdateUser;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        //  get all the active records
        $users = User::where('status', 'active')->get();

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        // return user to the view page for creating record
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUser $request)
    {
        // Query array of inputs 
       $query = [
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'email_address' => $request->email_address,
        'marks' => $request->marks,
        'status' => $request->status,
        'profile_picture' => $request->file('profile_picture')->store('public/upload')
       ];

       // Create new user with query input array
       User::create($query);

       // return user back to homepage/viewpage
       return redirect('user')->with('status', 'User Created');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where('id', $id)->first();

        if($user){
            return view('users.edit', compact('user'));
        }

        return redirect()->route('user.index')->with('status', 'User not found');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUser $request, $id)
    {   
        // Query array of inputs 
        $query = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email_address' => $request->email_address,
            'marks' => $request->marks,
            'status' => $request->status,
        ];

        // check if user also updating the profile image
        if ($request->has('profile_picture')) {
            $query['profile_picture'] = $request->file('profile_picture')->store('public/upload');            
        }

        //update the final available query
        User::where('id', $id)->update($query);

        //return back user to edit page
        return back()->with('status', 'User Updated');
    }

    //manage method to show all recoreds
    public function manage(){
        
        // get all users from db
        $users = User::get();

        // return users to user manage page
        return view('users.manage', compact('users'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);

        return back()->with('status', 'User Deleted');
    }
}
