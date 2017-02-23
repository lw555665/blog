<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Store\UserStore;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    protected static $user = null;

    public function __construct(UserStore $userStore)
    {
        self::$user = $userStore;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('login');
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
        $data =$request->all();

        $this->validate($request,[
            'email'    => 'required|email',
            'password' => 'required|min:6'
        ]);

        //获取用户输入密码
        $loginpassword = md5(md5($data['password'].$data['email']));

        $email = self::$user->checkUserEmail(['email' => $data['email']]);

        if(!$email) {
            return  back()->withErrors('用户不存在，请注册');
        }

        $userinfo = self::$user->getUserInfo(['email' => $data['email']]);

        if($loginpassword != $userinfo->password ){
            return  back()->withErrors('密码错误！');
        }

        Session::put('user',$userinfo);

        return redirect('/user');


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
        //
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

    public function logout()
    {
        Session::forget('user');
        return redirect('/login');
    }
}
