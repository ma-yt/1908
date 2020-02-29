<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="{{url('/huowu/store')}}" method="post">
	@csrf
		<table border>
			<tr>
				<td>用户名</td>
				<td><input type="text" name="u_name"></td>
			</tr>
			<tr>
				<td>用户身份</td>
				<td>
					<input type="radio" name="u_shenfen" value="1" checked>主管
					<input type="radio" name="u_shenfen" value="2">库管员
				</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="添加"></td>
			</tr>
		</table>
	</form>
</body>
</html>