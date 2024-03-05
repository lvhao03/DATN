<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class BlogController extends Controller
{
    //

    public function blog() 
    {
        $query = DB::table('posts')
        ->select('*');
        $data=$query->get();

        $query_admin = DB::table('employee')
        ->select('*')->get();

        return view('client.blog',['data'=>$data, 'query_admin'=>$query_admin]);
    }
    public function blogxemnhieu() 
    {
        $query = DB::table('posts')
        ->select('*')
        ->orderBy('luotXem','desc')
        ->limit(10);
        $data=$query->get();
        $query = DB::table('loaitin')
        ->select('*');
        $dataloai=$query->get();
        return view('blog',['data'=>$data,'dataloai'=>$dataloai]);
    }
    public function blogtheoloai($id) 
    {
        $query = DB::table('posts')
        ->select('*')
        ->where('idLT','=',$id)
        ->orderBy('ngayDang','desc')
        ->limit(10);
        $data=$query->get();
        $query = DB::table('loaitin')
        ->select('*');
        $dataloai=$query->get();
        return view('blog',['data'=>$data,'dataloai'=>$dataloai]);
    }
    
    public function blog_detail($id) 
    {
        $query = DB::table('posts')
        ->select('*')
        ->where('postID','=',$id);
        $data=$query->get();
        $querys = DB::table('posts')
        ->select('*');
        $datas=$querys->get();
        return view('client.blog_detail',['data'=>$data, 'datas'=>$datas]);
    }


}
