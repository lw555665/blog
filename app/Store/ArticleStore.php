<?php

namespace App\Store;

use Illuminate\Support\Facades\DB;

class ArticleStore
{
    protected static $table = 'data_article_info';

    /**
     * 发表文章
     * @param $data
     * @return mixed
     */
    public function addArticle($data)
    {
        return DB::table(self::$table)->insert($data);
    }

    /**
     *
     * 查找对应用户的博客
     * @param $where
     * @return mixed
     */
    public function getArticleList($where)
    {
        return DB::table(self::$table)->where($where)->paginate(1);

    }


    /**
     *  获取首页的所有列表
     * @return mixed
     */
    public function getAll()
    {
        return DB::table(self::$table)->orderBy('published_at')->paginate(10);
    }

    /**
     *
     * 获取文章详情页信息
     * @param $where
     * @return mixed
     */
    public function getOneData($where)
    {
        return DB::table(self::$table)->where($where)->first();
    }
}