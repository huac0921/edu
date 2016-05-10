<?php
/**
 * Created by PhpStorm.
 * User: huac
 * Date: 16/5/4
 * Time: 下午6:42
 */

namespace App\Repositories;

use App\Http\Models\Post;

class PostRepository{

    public function findPosts(Array $cat_id, $is_draft, $order, $take)
    {
        // TODO: Implement findPosts() method.
        $query = Post::whereIn('category_id',$cat_id)->where('is_draft',$is_draft)->orderBy('created_at', $order)->take($take)->get();
        return $query;
    }
}