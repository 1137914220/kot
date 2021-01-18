<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GoodController extends Controller
{
    //
    public function good(Request $request){
        $data=$request->file('file')->store('img');
        $data='/'.$data;
        return ['code'=>200,'msg'=>'ok','data'=>$data];
    }
//    添加
    public function save(StoreBlogPost $request){
        $data=$request->except('_token');
        DB::table('data')->insert($data);
        $list=DB::table('data')->get();
        return view('list',compact('list'));
    }
//    删除
    public function delete(Request $request)
    {
       $data=$request->except('_token');
       $lot=DB::table('data')->where('id',$data)->delete();
       return ['msg'=>'删除成功','code'=>200];

    }

}
