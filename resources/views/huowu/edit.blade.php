<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="{{url('/huowu/update/'.$data->u_id)}}" method="post">
	@csrf
		<table border>
			<tr>
				<td>用户名</td>
				<td><input type="text" name="u_name" value="{{$data->u_name}}"></td>
			</tr>
			<tr>
				<td>用户身份</td>
				<td>
					<input type="radio" name="u_shenfen" value="1" @if($data->u_shenfen==1) checked @endif>主管
					<input type="radio" name="u_shenfen" value="2" @if($data->u_shenfen==2) checked @endif>库管员
				</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="修改"></td>
			</tr>
		</table>
	</form>
</body>
</html>