<!DOCTYPE html>
<html>
<head>
	<center><h2>商品分类表</h2></center>
	<meta charset="utf-8"> 
	<title>Bootstrap 实例 - 水平表单</title>
	<link rel="stylesheet" href="/static/css/bootstrap.min.css">  
	<script src="/static/js/jquery.min.js"></script>
	<script src="/static/js/bootstrap.min.js"></script>
</head>
<body>

<form class="form-horizontal" role="form" action="{{url('/category/store')}}" method="post" enctype="multipart/form-data">
	@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">分类名称</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" name="cate_name" id="firstname" >
		</div>
	</div>


	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">父级分类</label>
		<div class="col-sm-10">
			<select name="parent_id">
				<option value="0">--请选择--</option>
				@foreach($cate as $v)
				<option value="{{$v->cate_id}}">{{str_repeat('|----',$v->level)}}{{$v->cate_name}}</option>
				@endforeach
			</select>
		</div>
	</div>

	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">描述</label>
		<div class="col-sm-10">
			<textarea width="" height="" name="desc"></textarea>
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" value="提交" class="btn btn-default">提交</button>
		</div>
	</div>
</form>

</body>
</html>