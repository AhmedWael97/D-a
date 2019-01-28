<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.pages.admins')->with('admins', User::get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',

        ]);

        $User = new User();
        $User->name = $request->name;
        $User->email = $request->email;
        $User->password = $request->password;
        $User->isAdmin = 1;
        
        $User->save();
        session()->flash('success', 'added Successfully');

        return redirect('/admins');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',

        ]);
        

        $User = User::find($id);
        $User->name = $request->name;
        $User->email = $request->email;
        if($request->password){
        $User->password = $request->password;
        }

        $User->save();
        session()->flash('success', 'updated Successfully');
        return redirect('admins');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $User = User::find($id);
        $User->delete();
                session()->flash('success', 'deleted Successfully');

        return redirect('admins');
    }


    public function send_email_view()
    {
        return view('dashboard.pages.sendmail')->with('users', User::get());
    }

    public function send_email(Request $request)
    {
        $message = $request->mail;
        foreach($request->ids as $id){
            $user = User::where('id', $id)->first();
            Mail::to($user->email)->send(new SendMailable($message));
        }
        return back();
    }

}
