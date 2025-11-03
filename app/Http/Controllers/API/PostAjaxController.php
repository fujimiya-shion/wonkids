<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostAjaxController extends Controller
{
    private $postModel;

    public function __construct(Post $postModel) {
        $this->postModel = $postModel;
    }

    public function search(Request $request) {
        $searchQuery = $request->input('search');
        $language = $request->input('language') ?? app()->getLocale();
        $posts = $this->postModel->getPostBySearch($searchQuery, $language);
        return response()->json([
            'statusCode' => 200,
            'message' => 'Success',
            'data' => $posts
        ]);
    }
}
