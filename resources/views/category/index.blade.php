<!DOCTYPE html>
<html>
<head>
	<center><h2>品牌列表</h2></center>
	<meta charset="utf-8"> 
	<title>Bootstrap 实例 - 水平表单</title>
	<link rel="stylesheet" href="/static/css/bootstrap.min.css">  
	<script src="/static/js/jquery.min.js"></script>
	<script src="/static/js/bootstrap.min.js"></script>
</head>
<body>
<table class="table">
		<caption>响应式表格布局</caption>
		<thead>
			<tr>
				<th>id</th>
				<th>分类名称</th>
				<th>分类描述</th>
				<th>操作</th>
			</tr>
		</thead>
		<tbody>
			@foreach($cate as $k=>$v)
			<tr>
				<td>{{$v->cate_id}}</td>
				<td>{{str_repeat('|----',$v->level)}}{{$v->cate_name}}</td>
				<td>{{$v->desc}}</td>
				<td>
					<a href="">删除</a>
					<a href="">编辑</a>
				</td>
			</tr>
			@endforeach
		</tbody>
</table>

</body>
</html>