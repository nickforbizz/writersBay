<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\ChatsAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class chatsController extends Controller
{
    public function adminMsg($id){

        return view('Admin.chatRoom', compact('id'));
    }


    public function adminChart(Request $request)
    {
        try {
            DB::beginTransaction();

            $validate = Validator::make($request->all(), [
                'chat' => 'required|string'
            ]);
            if ($validate->fails()) {
                return [
                    'code' => -1,
                    'data' => $validate->errors()
                ];
            }

            $sms = new Chat([
                'body' => $request->chat
            ]);

            $sms->save();

            $user_sms = new ChatsAdmin([
                'chat_id' => $sms->id,
                'user_id' => Auth::guard('admin')->user()->id
            ]);

            $user_sms->save();

            DB::commit();
            return [
                'code' => 1,
                'data' => $sms
            ];
        } catch (\Exception $e) {
            DB::rollBack();
            report($e);
            return [
                'code' => -1,
                'data' => $e->getMessage()
            ];
        }

//        return $request->all();

    }

    }
