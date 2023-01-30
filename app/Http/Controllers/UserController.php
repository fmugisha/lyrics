<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Session\SessionManager;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('accounts.user', compact('users'));
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function login()
    {
        return view('accounts.login');
    }

    public function loginUser(Request $request)
    {
        $errors = ['mail' => '', 'passw' => ''];
        $user = User::where('email', $request->email)->orWhere('username', $request->email)->first();

        if($user) {
            if(Hash::check($request->password, $user->password)) {
                auth()->login($user);
                return redirect('dashboard');
            } else {
                $errors['passw'] = 'Wrong password!';
                return redirect()->back()->withInput()->with(['errors' => $errors]);
            }
        } else {
            $errors['mail'] = 'This user is not registered';
            return view('accounts.login', compact('errors'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('accounts.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$request->validate([
            'first_name' => 'required',
            'second_name' => 'required',
            'username' => 'required|unique:users',
            'phone_number' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
        ]);*/

        $errors = ['username' => '', 'email' => '', 'passw' => ''];
        $user_email = DB::select('select * from users where email = ?', [$request->email]);
        $user_uname = DB::select('select * from users where username = ?', [$request->uname]);

        if ($user_email) {
            $errors['email'] = 'This email is taken!';
            return redirect()->back()->withInput()->with(['errors' => $errors]);
        } elseif ($user_uname) {
            $errors['username'] = 'This username is taken!';
            return redirect()->back()->withInput()->with(['errors' => $errors]);
        } elseif ($request->password != $request->passw2) {
            $errors['passw'] = 'Passwords are not match!';
            return redirect()->back()->withInput()->with(['errors' => $errors]);
        }

        $user = new User([
            'first_name' => $request->fname,
            'second_name' => $request->sname,
            'username' => $request->uname,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->save();
        
        return redirect()->route('login');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        Session::flush();
        Auth::logout();

        return redirect()->route('login');
    }
}
