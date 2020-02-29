<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<table border>
		<tr>
			<td>用户id</td>
			<td>用户名</td>
			<td>用户身份</td>
			<td>操作</td>
		</tr>
		@foreach($data as $v)
		<tr>
			<td>{{$v->u_id}}</td>
			<td>{{$v->u_name}}</td>
			<td>{{$v->u_shenfen==1?'主管':'库管员'}}</td>
			<td>
				<a href="{{url('/huowu/destroy/'.$v->u_id)}}">删除</a>
				<a href="{{url('/huowu/edit/'.$v->u_id)}}">编辑</a>
			</td>
		</tr>
		@endforeach
	</table>
	<tr><td colspan="4">{{$data->links()}}</td></tr>
</body>
</html>