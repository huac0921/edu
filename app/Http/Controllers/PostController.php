<?php
namespace App\Http\Controllers;
use App\Repositories\PostRepository;

/**
 * Created by PhpStorm.
 * User: huac
 * Date: 16/5/4
 * Time: 下午6:31
 */
class PostController extends Controller{
    public function __construct(PostRepository $post){
        $this->postRepo = $post;
    }
    public function index(){
        return $this->postRepo->findPosts([1,2],0,'desc',5);

    }
}