<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CommentModel;
use App\Models\User;

class CommentController extends Controller
{
    public function index($productID){
        $commentList = CommentModel::where('product_id', $productID)->get();
        return response()->json($this->getImageAndUserName($commentList));
    }

    public function store(Request $request){
        CommentModel::create([
            'content' => $request->content,
            'user_id' => $request->userID,
            'product_id' => $request->productID
        ]);
        return $this->index($request->productID);
    }

    public function getImageAndUserName($commentList){
        foreach($commentList as $comment){
            $customer =  User::where('userID', $comment->user_id)->first();
            $comment->customer_name = $customer->name;
            $comment->image_url = $customer->image_url;
        };
        return $commentList;
    }
}
