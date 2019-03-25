<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\ChatsUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class chatsUserController extends Controller
{
    public function webMsg(Request $request)
    {
        try{
            DB::beginTransaction();

            $validate = Validator::make($request->all(), [
                'chatUser'=> 'required|string'
            ]);
            if ($validate->fails()){
                return [
                    'code'=>-1,
                    'data'=>$validate->errors()
                ];
            }

            $sms = new Chat([
                'body'=> $request->chatUser
            ]);

            $sms->save();

            $user_sms = new ChatsUser([
                'chat_id'=> $sms->id,
                'user_id'=> Auth::guard('web')->user()->id
            ]);

            $user_sms->save();

            DB::commit();
            return [
                'code'=>1,
                'data'=>$sms
            ];
        }catch (\Exception $e){
            DB::rollBack();
            report($e);
            return [
                'code'=>-1,
                'data'=>$e->getMessage()
            ];
        }

//        return $request->all();
    }
}
