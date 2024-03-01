<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\User;

class CommentController extends Controller
{
    public function index($productID){
        $commentList = Comment::where('product_id', $productID)->get();
        return response()->json($this->getImageAndUserName($commentList));
    }

    public function store(Request $request){
        Comment::create([
            'content' => $request->content,
            'customer_id' => $request->customerID,
            'product_id' => $request->productID
        ]);
        return $this->index($request->productID);
    }

    public function getImageAndUserName($commentList){
        foreach($commentList as $comment){
            $customer =  User::where('customerID', $comment->customer_id)->first();
            $comment->customer_name = $customer->name;
            $comment->image_url = $customer->image_url;
        };
        return $commentList;
    }
}
