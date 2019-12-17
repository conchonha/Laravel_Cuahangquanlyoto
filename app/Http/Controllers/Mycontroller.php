<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\account;
use App\verhicleInfomation;
use App\accessories;
use App\putforservices;
class Mycontroller extends Controller
{
// dang nhap
    public function postLogin(Request $request){
    	$data=account::where([['username',$request->username],['password',$request->password]])->get();
    	echo json_encode($data);
    }
// get data phu kien
    public function getDataAccessories(){
    	$data=accessories::all()->take(6);
    	echo json_encode($data);
    }
// get data phu kien toan bo
     public function getDataAccessoriesAll(){
        $data=accessories::all();
        echo json_encode($data);
    }
// dang ky tai khoan
    public function postRegister(Request $request){
    	$tableRegister=new account();
    	$tableRegister->fullname=$request->fullName;
    	$tableRegister->username=$request->userName;
    	$tableRegister->password=$request->passWord;
    	$tableRegister->email=$request->email;
    	$tableRegister->phonenumber=$request->phoneNumBer;
    	$tableRegister->identitycard=$request->identityCard;
    	$tableRegister->picture="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTTQDMy1QZWYsh_20X7G0e5ADJartcrDQsmdkoAA4GCGEjMeUOR&s";
    	$tableRegister->idloai=$request->idType;
    	$tableRegister->save();
    	if($tableRegister){
    		echo "Success";
    	}
    }
    //kiểm tra tai khoan đã có dk thông tin xe chưa
    public function checkAcount(Request $request){
        $table=verhicleInfomation::where('idacount',$request->idAcount)->count();
        if($table>0){
            $data=verhicleInfomation::where('idacount',$request->idAcount)->get();
            echo $data;
        }
    }
    // đăng ký thông tin xe
    public function RegisterVehicleInfomation(Request $request){
        $table=new verhicleInfomation();
        $table->producer=$request->producer;
        $table->type=$request->type;
        $table->capacity=$request->capacity;
        $table->contermet=$request->contermet;
        $table->idacount=$request->idacount;
        $table->save();
        if($table){
            echo "Success";
        }
    }
    // Update thông tin xe
    public function UpdateVehicleInfomation(Request $request){
        $table=verhicleInfomation::where('id',$request->idcar)->update(['producer'=>$request->producer,'type'=>$request->type,'capacity'=>$request->capacity,'contermet'=>$request->contermet]);
        echo "Success";
    }
    // lấy dữ liệu services về dạng lịch sử 
    public function getDataServices(Request $request){
        $table=putforservices::where('idacount',$request->id)->get();
        echo json_encode($table);
    }
}
