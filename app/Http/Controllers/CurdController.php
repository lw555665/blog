<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Store\ArticleStore;
use App\Store\UserStore;
use Illuminate\Support\Facades\Session;
use Ramsey\Uuid\Uuid;

class CurdController extends Controller
{
    protected static $article = null;
    protected static $user = null;

    public function __construct(ArticleStore $articleStore, UserStore $userStore)
    {
        self::$article = $articleStore;
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
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('user.add');
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

        //获取用户guid
        $guid = self::$user->getGuid(['email' => $data['email']])->gu_id;



        $id = Uuid::uuid1()->getHex();

        $result = [
            'id' => $id,
            'user_guid' => $guid,
            'title' => $data['title'],
            'category' => $data['category'],
            'content' => $data['content'],
            'published_at' => time()
        ];

        if(self::$article->addArticle($result)){
         return '发布成功<a href="/user">返回个人中心</a>';
        }else{
            return '发布失败<a href="/curd/create">点击返回发布页</a>';
        };



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
