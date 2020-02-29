<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wenzhang;

class WenzController extends Controller
{
    
    public function create(){
    	return view('wenz.create');
    }

    public function store(Request $request){
    	$data = $request->except('_token');

    	//判断有没有文件上传
    	if($request->hasFile('w_img')){
    		$data['w_img'] = upload('w_img');
    	}
    	$res = Wenzhang::insert($data);
    	if($res){
    		return redirect('/wenz');
    	}
    }


    public function checkOnly(){
    	$w_title = request()->w_title;
    	$where = [];
    	if($w_title){
    		$where[]=['w_title','=',$w_title];
    	}

    	$w_id = request()->w_id;
    	if($w_id){
    		$where[]=['w_id','!=',$w_id];
    	}
    	// \DB::connection()->enableQueryLog();
    	$count = Wenzhang::where($where)->count();
        // $logs = \DB::getQueryLog();
        // dd($logs);
    	echo json_encode(['code'=>'00000','msg'=>'ok','count'=>$count]);
    }


    public function index(){
    	$w_title = request()->w_title??'';
    	$w_fl = request()->w_fl??'';
    	$where = [];
    	if($w_title){
    		$where[] = ['w_title','like',"%$w_title%"];
    	}

    	if($w_fl){
    		$where[] = ['w_fl','=',$w_fl];
    	}

    	$pagesize = config('app.pageSize');
    	$data = Wenzhang::where($where)->orderby('w_id','desc')->paginate($pagesize);
    	return view('wenz.index',['data'=>$data,'w_title'=>$w_title,'w_fl'=>$w_fl]);
    }


    public function edit($id){
    	$res = Wenzhang::find($id);
    	return view('wenz.edit',['res'=>$res]);
    }


    public function update(Request $request, $id){
    	$data = $request->except('_token');

    	if($request->hasFile('w_img')){
    		$data['w_img'] = $this->upload('w_img');
    	}
    	$res = Wenzhang::where('w_id',$id)->update($data);
    	if($res){
    		return redirect('/wenz');
    	}
    }


    public function destroy($id){
    	$res = Wenzhang::where('w_id',$id)->delete();
    	if($res){
    		echo json_encode(['code'=>'00000','msg'=>'ok']);
    	}
    }
}
