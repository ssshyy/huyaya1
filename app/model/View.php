<?php

namespace App\model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

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

}
