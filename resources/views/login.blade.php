<!DOCTYPE html>
<html>
<head>
	<center><h2>登录</h2></center>
	<meta charset="utf-8"> 
	<title>Bootstrap 实例 - 水平表单</title>
	<link rel="stylesheet" href="/static/css/bootstrap.min.css">  
	<script src="/static/js/jquery.min.js"></script>
	<script src="/static/js/bootstrap.min.js"></script>
</head>
<body>
<center><b style="color:red">{{session('msg')}}</b></center>
<form class="form-horizontal" role="form" action="{{url('logindo')}}" method="post">

@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">用户名</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" name="username" id="firstname" >
			<b style="color:red">{{$errors->first('username')}}</b>
		</div>
	</div>

	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">密码</label>
		<div class="col-sm-10">
			<input type="password" class="form-control" name="pwd">
			<b style="color:red">{{$errors->first('pwd')}}</b>
		</div>
	</div>

	
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" value="登录" class="btn btn-default">登录</button>
		</div>
	</div>
</form>

</body>
</html>