<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Store\UserStore;
use Ramsey\Uuid\Uuid;

class RegisterController extends Controller
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
        return view('register');
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
        //
        $data = $request->all();


        if($data['password'] != $data['confirm_password']) return back()->withErrors('两次密码不一致');
        // 在对数据进行校验一次
        $this->validate($request ,[
            'email'     => 'required|email',
            'username'  => 'required|min:2|max:10',
            'password'  => 'required|min:6'
        ]);

        //查询邮箱是否被注册
        $email = self::$user->checkUserEmail(['email' => $data['email']]);

        if($email){
            return back()->withErrors('此邮箱已存在！');
        }

        //加工存入的用户信息
        $datas = [
            'gu_id' => Uuid::uuid1()->getHex(),  //用户唯一id
            'user_name' => $data['username'],
            'email' => $data['email'],
            'password' => md5(md5($data['password'].$data['email'])),    //密码加密
            'create_at' => time()
        ];

        //注册用户
        $result = self::$user->addUser($datas);

        if($result){
            return redirect('/login');
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
}
