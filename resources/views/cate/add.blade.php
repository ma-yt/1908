{{$aa}}

<h2>添加分类</h2>
<form action="{{url('/category/add')}}" method="post">
@csrf
<table>
<tr>
	<td>名称</td>
	<td><input type="text" name="name"></td>
</tr>
<tr>
	<td>价格</td>
	<td><input type="text" name="price"></td>
</tr>
<tr>
	<td></td>
	<td><input type="submit" value="提交"></td>
</tr>
</table>
</form>