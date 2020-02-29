<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
	<form action="{{url('/wenz/update/'.$res->w_id)}}" method="post" enctype="multipart/form-data">
	@csrf
		<table border=1>
			<tr>
				<td>文章标题</td>
				<td>
					<input type="text" name="w_title" value="{{$res->w_title}}">
					<b style="color:red">{{$errors->first('w_title')}}</b>
				</td>
			</tr>
			<tr>
				<td>文章分类</td>
				<td><input type="text" name="w_fl" value="{{$res->w_fl}}"></td>
			</tr>
			<tr>
				<td>文章重要性</td>
				<td>
					<input type="radio" name="w_zyx" value="1" @if($res->w_zyx==1) checked @endif>普通
					<input type="radio" name="w_zyx" value="2" @if($res->w_zyx==2) checked @endif>顶置
				</td>
			</tr>
			<tr>
				<td>是否显示</td>
				<td>
					<input type="radio" name="w_show" value="1" @if($res->w_show==1) checked @endif>显示
					<input type="radio" name="w_show" value="2" @if($res->w_show==2) checked @endif>不显示
				</td>
			</tr>
			<tr>
				<td>文章作者</td>
				<td>
					<input type="text" name="w_zuozhe" value="{{$res->w_zuozhe}}">
					<b style="color:red">{{$errors->first('w_zuozhe')}}</b>
				</td>
			</tr>
			<tr>
				<td>作者email</td>
				<td><input type="text" name="w_email" value="{{$res->w_email}}"></td>
			</tr>
			<tr>
				<td>关键字</td>
				<td><input type="text" name="w_gjz" value="{{$res->w_gjz}}"></td>
			</tr>
			<tr>
				<td>网页描述</td>
				<td><textarea width="" height="" name="w_desc">{{$res->w_desc}}</textarea></td>
			</tr>
			<tr>
				<td>上传文件</td>
				<td>
					<img src="{{env('UPLOAD_URL')}}{{$res->w_img}}" width="60" height="70">
					<input type="file" name="w_img">
				</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="编辑"></td>
			</tr>
		</table>
	</form>
</body>
</html>
<script type="text/javascript">

$.ajaxSetup({ headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')}});
//定义全局变量
var w_id='{{$res->w_id}}';
$('input[type="button"]').click(function(){
	var w_titleflag = true;
	$('input[name="w_title"]').next().html('');
	//标题验证
	var w_title = $('input[name="w_title"]').val();
	var reg = /^[\u4e00-\u9fa50-9A-Za-z_]+$/;
	if(!reg.test(w_title)){
		$('input[name="w_title"]').next().html('文章标题由中文字母数字组成切不能为空');
		return;
	}

	//验证唯一性
	 $.ajax({
	 	type:'post',
	 	url:"/wenz/checkOnly",
	 	data:{w_title:w_title,w_id:w_id},
	 	async:false,
	 	dataType:'json',
	 	success:function(result){
        	if(result.count>0){
        		$('input[name="w_title"]').next().html('标题已存在');
        		w_titleflag = false;
        	}
    	}
	});
	if(!w_titleflag){
		return;
	}

	//作者验证
	var w_zuozhe = $('input[name="w_zuozhe"]').val();
	var reg = /^[\u4e00-\u9fa50-9A-Za-z_]{2,8}$/;
	if(!reg.test(w_zuozhe)){
		$('input[name="w_zuozhe"]').next().html('文章作者必须是中文数字字母组成长度2-8位不能为空');
		return;
	}
	//form提交
	$('form').submit();

})


$('input[name="w_zuozhe"]').blur(function(){
	$(this).next().html('');
	
	var w_zuozhe = $(this).val();
	var reg = /^[\u4e00-\u9fa50-9A-Za-z_]{2,8}$/;
	if(!reg.test(w_zuozhe)){
		$(this).next().html('文章作者必须是中文数字字母组成长度2-8位不能为空');
		return;
	}
})


$('input[name="w_title"]').blur(function(){
	$(this).next().html('');
	var w_title = $(this).val();
	var reg = /^[\u4e00-\u9fa50-9A-Za-z_]+$/;
	
	if(!reg.test(w_title)){
		$(this).next().html('文章标题由中文字母数字组成切不能为空');
		return;
	}

	//验证唯一性
	 $.ajax({
	 	type:'post',
	 	url:"/wenz/checkOnly",
	 	data:{w_title:w_title,w_id:w_id},
	 	//async:trur,
	 	dataType:'json',
	 	success:function(result){
        	if(result.count>0){
        		$('input[name="w_title"]').next().html('标题已存在');
        	}
    	}
	});

})
</script>