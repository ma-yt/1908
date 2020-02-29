
@foreach($data as $k=>$v)
		<tr>
			<td>{{$v->goods_id}}</td>
			<td>{{$v->goods_name}}</td>
			<td>{{$v->b_name}}</td>
			<td>{{$v->cate_name}}</td>
			<td>{{$v->goods_hh}}</td>
			<td>{{$v->goods_price}}</td>
			<td><img src="{{env('UPLOAD_URL')}}{{$v->goods_img}}" width="60" height="70"></td>
			<td>{{$v->goods_num}}</td>
			<td>{{$v->is_jp==1?'是':'否'}}</td>
			<td>{{$v->is_rx==1?'是':'否'}}</td>
			<td>
				@if($v->goods_imgs)
				@php $photos = explode('|',$v->goods_imgs); @endphp
				@foreach($photos as $vv)
				<img src="{{env('UPLOAD_URL')}}{{$vv}}" width="60" height="70">
				@endforeach
				@endif
			</td>
			<td>{{$v->goods_desc}}</td>
			<td><a href="{{url('goods/destroy/'.$v->goods_id)}}">删除</a>|<a href="{{url('goods/xiugai/'.$v->goods_id)}}">编辑</a></td>
		</tr>
		@endforeach
		<tr>
			<td colspan="13">{{$data->appends($query)->links()}}</td>
		</tr>
