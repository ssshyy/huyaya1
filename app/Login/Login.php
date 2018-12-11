<?php

namespace App\Login;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Login extends Model
{
    //注册
    public function register(){
        $all = request()->all();
        $tel = $all['tel'];
        $tel1="/^1[34578]\d{9}$/";
        if(!preg_match("/^1[34578]\d{9}$/", $tel)){
            echo "<script>alert('手机号格式不正确')</script>";
            echo "<script>window.location.href='/logins'</script>";
        }
        $email = $all['Email'];
        if(!preg_match("/^[a-z0-9]+([._-][a-z0-9]+)*@([0-9a-z]+\.[a-z]{2,14}(\.[a-z]{2})?)$/i", $email)){
            echo "<script>alert('邮箱格式不正确')</script>";
            echo "<script>window.location.href='/logins'</script>";
        }
        $pwd = $all['Password'];
        if(!preg_match("/^[a-zA-Z\d_]{8,}$/", $pwd)){
            echo "<script>alert('密码格式不正确')</script>";
            echo "<script>window.location.href='/logins'</script>";
        }
        $new_pwd = md5($pwd);
        $name = rand(11111,99999);
        $time=date('Y-m-d H:i:s',time());
        $data = [
            'tel'=>$tel,
            'email'=>$email,
            'password'=>$new_pwd,
            'name'=>$name,
            'sex'=>0,
            'time'=>$time,
            'email_stat'=>1,
            'image'=>'https://ss1.bdstatic.com/70cFvXSh_Q1YnxGkpoWK1HF6hhy/it/u=1394969417,3934508970&fm=27&gp=0.jpg',
            'type'=>'账号',
            'fans'=>0,
        ];
        $sql = DB::table('hy_user')->insert($data);
        if($sql){
            echo "<script>alert('注册成功')</script>";
            echo "<script>window.location.href='/logins'</script>";
        }
    }
    //登陆
    public function land(){
        $all=request()->all();
        $tel = $all['tel'];
        $pwd = md5($all['Password']);
        $sql =DB::table('hy_user')->where('tel',$tel)->select('password')->first();
        $pwd1=$sql->password;
        if($pwd!=$pwd1){
            echo "<script>alert('密码错误')</script>";
            echo "<script>window.location.href='/logins'</script>";
        }

    }
}
