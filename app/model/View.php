<?php

namespace App\model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;
use QRcode;

class View extends Authenticatable
{
    public function wxjadd($post){
        $data['classname']=$post['classname'];
        $data['help_conte']=$post['content'];
        $data['helpstatus']=1;
        $data['pid']=$post['id'];
       // return $data;die;
        $sql=DB::table('hy_help')->insert($data);

        if($sql){
           $status['status']=200;
        }else{
            $status['status']=100;
        }
        return $status;
    }
    public function wxjupdate($post){
        $data['classname']=$post['classname'];
        $data['help_conte']=$post['content'];
        $data['helpstatus']=1;
        $id=$post['id'];
        // return $data;die;
        $sql=DB::table('hy_help')->where('id',$id)->update($data);

        if($sql){
            $status['status']=200;
        }else{
            $status['status']=100;
        }
        return $status;
    }
    public function code(){
        function scerweima($url=''){
            include 'phpqrcode.php';
            $value = $url;         //二维码内容
            $errorCorrectionLevel = 'L';  //容错级别
            $matrixPointSize = 5;      //生成图片大小
            //生成二维码图片
            // 判断是否有这个文件夹  没有的话就创建一个
            if(!is_dir("qrcode")){
                // 创建文件加
                mkdir("qrcode");
            }
            $filename = 'qrcode/'.microtime().'.png';
            QRcode::png($value,$filename , $errorCorrectionLevel, $matrixPointSize, 2);
            $QR = $filename;        //已经生成的原始二维码图片文件
            $QR = imagecreatefromstring(file_get_contents($QR));
            //输出图片
            imagepng($QR, 'qrcode.png');
            imagedestroy($QR);
            return '<img src="qrcode.png" alt="使用微信扫描支付">';
        }
//调用查看结果
        echo scerweima('http://fzc.haoyunyun.cn');
    }

}
