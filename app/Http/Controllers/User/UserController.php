<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

use App\Model\UserModel;

class UserController extends Controller
{
    //

	public function user($uid)
	{
		echo $uid;
	}

	public function test()
    {
        echo '<pre>';print_r($_GET);echo '</pre>';
    }

	public function add()
	{
		$data = [
			'name'      => str_random(5),
			'age'       => mt_rand(20,99),
			'email'     => str_random(6) . '@gmail.com',
			'reg_time'  => time()
		];

		$id = UserModel::insertGetId($data);
		var_dump($id);
	}


    /**
     * 用户注册
     * 2019年1月3日14:26:56
     * liwei
     */
	public function reg()
    {
        return view('users.reg');
    }

    public function doReg(Request $request)
    {
        echo '<pre>';print_r($_POST);echo '</pre>';

        $pass1 = $request->input('u_pass');
        $pass2 = $request->input('u_pass2');


        if($pass1 !== $pass2){
            die("密码不一致");
        }

        $pass = password_hash($pass1,PASSWORD_BCRYPT);

        $data = [
            'nick_name'  => $request->input('nick_name'),
            'age'  => $request->input('age'),
            'email'  => $request->input('u_email'),
            'reg_time'  => time(),
            'pass'  => $pass
        ];

       $uid = UserModel::insertGetId($data);

       if($uid){
           echo '注册成功';
       }else{
           echo '注册失败';
       }
    }

	/**
	 * 用户登录
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function login()
	{
		$data = [];
		return view('users.login',$data);
	}

    public function doLogin(Request $request)
    {
    	echo '<pre>';print_r($_POST);echo '</pre>';

    	$emial = $request->input('u_email');
    	$pass = $request->input('u_pass');

    	$u = UserModel::where(['email'=>$emial])->first();

    	if($u){
    	    if( password_verify($pass,$u->pass) ){
    	        header("Refresh:3;url=/user/center");
                echo "登录成功";
            }else{
    	        die("密码不正确");
            }
        }else{
    	    die("用户不存在");
        }

    }


    public function center()
    {
        echo __METHOD__;
    }

}
