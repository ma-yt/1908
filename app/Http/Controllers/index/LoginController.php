<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use AlibabaCloud\Client\AlibabaCloud;
use AlibabaCloud\Client\Exception\ClientException;
use AlibabaCloud\Client\Exception\ServerException;
use App\Member;

//发送邮件
use App\Mail\SendCode;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    public function reg(){
    	return view('index.reg');
    }


    public function regdo(){
    	$post = request()->except('_token');
    	
    	$code = session('code');
    	if($code!=$post['code']){
    		return redirect('/reg')->with('msg','你输入的验证码不对');
    	}

    	//密码和确认密码是否一致
    	if($post['pwd']!=$post['repwd']){
    		return redirect('/reg')->with('msg','两次密码不一致');
    	}

    	//入库
    	$user = [
    		'mobile'=>$post['mobile'],
    		'pwd'=>encrypt($post['pwd']),
    		'add_time'=>time(),
    	];
    	$res = Member::create($user);

    	if($res){
    		return redirect('/login');
    	}
    }


    //发送邮件
    public function sendEmail(){
    	$mail = '2593787142@qq.com';
    	Mail::to($mail)->send(new SendCode());
    }


    public function ajaxsend(){

    	//接受注册页面的手机号
    	//$moblie = '15032402768';
    	$mobile = request()->mobile;
    	
    	$code = rand(1000,9999);

    	$res = $this->sendSms($mobile,$code);
    	//dd($res);
    	if($res['Code']=='OK'){
    		session(['code'=>$code]);
    		request()->session()->save();

    		echo json_encode(['code'=>'00000','msg'=>'ok']);die;
    	}
    	echo json_encode(['code'=>'00001','msg'=>'短信发送失败']);die;
    }


    public function sendSms($moblie,$code){

			AlibabaCloud::accessKeyClient('LTAI4FpiMdpnoGpPK2SUNCt1', 'HE2tvxsw8DGew0K86011htk0Zisj54')
			                        ->regionId('cn-hangzhou')
			                        ->asDefaultClient();

			try {
			    $result = AlibabaCloud::rpc()
			                          ->product('Dysmsapi')
			                          // ->scheme('https') // https | http
			                          ->version('2017-05-25')
			                          ->action('SendSms')
			                          ->method('POST')
			                          ->host('dysmsapi.aliyuncs.com')
			                          ->options([
			                                        'query' => [
			                                          'RegionId' => "cn-hangzhou",
			                                          'PhoneNumbers' => $moblie,
			                                          'SignName' => "华儿实例",
			                                          'TemplateCode' => "SMS_178770857",
			                                          'TemplateParam' => "{code:$code}",
			                                        ],
			                                    ])
			                          ->request();
			    return $result->toArray();
			} catch (ClientException $e) {
			    return $e->getErrorMessage();
			} catch (ServerException $e) {
			    return $e->getErrorMessage();
			}
    }

    //登录视图
    public function login(){

        return view('index.login');
    }

   /**执行登陆 */
    public function logindo(Request $request){
        $request->validate([
            'mobile'=>'required',
            'pwd'=>'required',
        ],[
            'mobile.required'=>'账号必填',
            'pwd.required'=>'密码必填',
        ]);
        $post = $request->except('_token');
        // $post['pwd'] = enctypt($user['pwd']);
        // dump($post);
        $user= Member::where(['mobile'=>$post['mobile']])->first();
        // echo decrypt($user->pwd);die;
        // echo $user->account;die;
        // dd($user);
        if($post['mobile']!=$user['mobile']){
            return redirect('/login')->with('msg','没有此用户或密码错误');
        }
        if($post['pwd']!=decrypt($user->pwd)){
            return redirect('/login')->with('msg','没有此用户或密码错误');
        }
        // dd($user->phone);
        // dd($user->pwd);
       
        session(['userInfo'=>$user]);
        request()->session()->save();
        return redirect('/user');
        // 没有登陆与错误信息 返回登陆页面
        // return redirect('/login')->with('msg','没有此用户');
    }

}
