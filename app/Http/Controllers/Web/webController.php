<?php

namespace App\Http\Controllers\Web;

use Validator;
use Illuminate\Http\Request;
use App\Models\AnonymousFeedback;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class webController extends Controller
{
    public function anonymousMsg(Request $request)
    {
       try {
           DB::beginTransaction();
            $validator = Validator::make($request->all(), [
                'title'=>'required|string|max:255',
                'email'=>'required|email',
                'comments'=>'required',
            ]);

            $anonymusMsg = new AnonymousFeedback([
                'email'=>$request->email,
                'title'=>$request->title,
                'message'=>$request->comments
            ]);
            $anonymusMsg->save();
            DB::commit();

            $userData =  [
                "code"=>"0",
                "message"=>"Success",
                "data"=>$anonymusMsg
            ];

            return back()->with($userData);

       } catch (\Exeption $e) {
           DB::rollback();
           report($e);

           return [
            "code"=>"-1",
            "message"=>$e->getMessage()
        ];
       }
    }

    public function webDashboard()
    {
        $page = "";
        return view("web.dashboard", compact('page'));
    }
}
