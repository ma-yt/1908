<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
</head>
<body>
	<form>
		<input type="text" name="w_title" value="{{$w_title}}" placeholder="请输入标题....">
		<input type="text" name="w_fl" value="{{$w_fl}}" placeholder="请输入分类....">
		<input type="submit" value="搜索">
	</form>
	<table border=1>
		<tr>
			<td>id</td>
			<td>文章标题</td>
			<td>文章分类</td>
			<td>文章重要性</td>
			<td>是否显示</td>
			<td>文章作者</td>
			<td>作者email</td>
			<td>关键字</td>
			<td>网页描述</td>
			<td>上传文件</td>
			<td>操作</td>
		</tr>
			@foreach($data as $k=>$v)
		<tr>
			<td>{{$v->w_id}}</td>
			<td>{{$v->w_title}}</td>
			<td>{{$v->w_fl}}</td>
			<td>{{$v->w_zyx==1?'普通':'顶置'}}</td>
			<td>{{$v->w_show==1?'√':'×'}}</td>
			<td>{{$v->w_zuozhe}}</td>
			<td>{{$v->w_email}}</td>
			<td>{{$v->w_gjz}}</td>
			<td>{{$v->w_desc}}</td>
			<td><img src="{{env('UPLOAD_URL')}}{{$v->w_img}}" width="60" height="70"></td>
			<td>
				<a href="javascript:void(0)" onclick="destroy({{$v->w_id}})">删除</a>
				<a href="{{url('wenz/edit/'.$v->w_id)}}">编辑</a>
			</td>
		</tr>
		@endforeach

	</table>
	<tr><td colspan="7">{{$data->appends(['w_title'=>$w_title,'w_fl'=>$w_fl])->links()}}</td></tr>
</body>
</html>
<script>
function destroy(id){
	if(!id){
		return;
	}

	if(confirm('是否要删除此条记录')){
		//ajax删除
		$.get('/wenz/destroy/'+id,function(result){
			if(result.code=='00000'){
				location.reload();
			}
		},'json')
	}
}
</script>