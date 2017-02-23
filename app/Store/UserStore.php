<?php

namespace App\Store;

use Illuminate\Support\Facades\DB;

class UserStore
{
    //用户表
    protected static $table = "data_user_info";

    /**
     * 用户注册
     * @param $data
     * @return mixed
     */
    public function addUser($data)
    {
        return DB::table(self::$table)->insert($data);
    }

    /**
     * 查询用户是否已被注册
     * @param $where
     * @return bool
     */
    public function checkUserEmail($where)
    {
        if(empty($where)) return false;

        return DB::table(self::$table)->where($where)->first();
    }

    /**
     * 获取用户的密码
     * @param $where
     * @return mixed
     */
    public function getUserInfo($where)
    {
        return DB::table(self::$table)->where($where)->first();
    }

    /**
     * 获取 用户的guid
     * @param $where
     * @return mixed
     */
    public function getGuid($where)
    {
        return DB::table(self::$table)->select('gu_id')->where($where)->first();
    }

}

