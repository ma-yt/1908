<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="post" action="{{url('/goods/update/'.$res->goods_id)}}" enctype="multipart/form-data">
		@csrf
		<table>
			<tr>
				<td>商品名称</td>
				<td>
					<input type="text" name="goods_name" value="{{$res->goods_name}}">
					<b style="color:red">{{$errors->first('goods_name')}}</b>
				</td>
			</tr>
			<tr>
				<td>商品货号</td>
				<td>
					<input type="text" name="goods_hh" value="{{$res->goods_hh}}">
					<b style="color:red">{{$errors->first('goods_hh')}}</b>
				</td>
			</tr>
			<tr>
				<td>商品价格</td>
				<td>
					<input type="text" name="goods_price" value="{{$res->goods_price}}">
					<b style="color:red">{{$errors->first('goods_price')}}</b>
				</td>
			</tr>
			<tr>
				<td>商品图片</td>
				<td>
					<img src="{{env('UPLOAD_URL')}}{{$res->goods_img}}" width="60" height="70">
					<input type="file" name="goods_img">
				</td>
			</tr>
			<tr>
				<td>商品库存</td>
				<td>
					<input type="text" name="goods_num" value="{{$res->goods_num}}">
					<b style="color:red">{{$errors->first('goods_num')}}</b>
				</td>
			</tr>
			<tr>
				<td>是否精品</td>
				<td>
					<input type="radio" name="is_jp" value="1" @if($res->is_jp==1) checked @endif>是
					<input type="radio" name="is_jp" value="2" @if($res->is_jp==2) checked @endif>否
				</td>
			</tr>
			<tr>
				<td>是否热销</td>
				<td>
					<input type="radio" name="is_rx" value="1" @if($res->is_rx==1) checked @endif>是
					<input type="radio" name="is_rx" value="2" @if($res->is_rx==2) checked @endif>否
				</td>
			</tr>
			<tr>
				<td>商品详情</td>
				<td><textarea name="goods_desc" width="" height="">{{$res->goods_desc}}</textarea></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="编辑"></td>
			</tr>
		</table>
	</form>
</body>
</html>