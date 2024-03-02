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

        return view('client.blog',['data'=>$data]);
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
    
    public function chitietblog($id) 
    {
        $query = DB::table('posts')
        ->select('*')
        ->where('id','=',$id);
        $data=$query->get();
        return view('chitietblog',['data'=>$data]);
    }


}
