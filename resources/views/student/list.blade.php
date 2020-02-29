<!DOCTYPE html>
<html>
<head>
	<center><h2>学生列表</h2></center>
	<meta charset="utf-8"> 
	<title>Bootstrap 实例 - 水平表单</title>
	<link rel="stylesheet" href="/static/css/bootstrap.min.css">  
	<script src="/static/js/jquery.min.js"></script>
	<script src="/static/js/bootstrap.min.js"></script>
</head>
<body>
	<form>
		<input type="text" name="x_name" value="{{$x_name}}" placeholder="请输入名字....">
		<input type="text" name="x_banji" value="{{$x_banji}}" placeholder="请输入班级....">
		<input type="submit" value="搜索">
	</form>
<table class="table">
		<caption>响应式表格布局</caption>
		<thead>
			<tr>
				<th>id</th>
				<th>姓名</th>
				<th>性别</th>
				<th>班级</th>
				<th>成绩</th>
				<th>头像</th>
				<th>操作</th>
			</tr>
		</thead>
		<tbody>
			@foreach($data as $k=>$v)
			<tr>
				<td>{{$v->x_id}}</td>
				<td>{{$v->x_name}}</td>
				<td>{{$v->x_sex==1?'男':'女'}}</td>
				<td>{{$v->x_banji}}</td>
				<td>{{$v->x_cj}}</td>
				<td><img src="{{env('UPLOAD_URL')}}{{$v->x_img}}" width="60" height="70"></td>
				<td>
					<a href="{{url('student/del/'.$v->x_id)}}" class="btn btn-danger">删除</a>
					<a href="{{url('student/edit/'.$v->x_id)}}" class="btn btn-info">编辑</a>
				</td>
			</tr>
			@endforeach
			<tr><td colspan="7">{{$data->appends(['x_name'=>$x_name,'x_banji'=>$x_banji])->links()}}</td></tr>
		</tbody>
</table>

</body>
</html>