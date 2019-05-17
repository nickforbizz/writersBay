<?php

namespace App\Http\Controllers\Web;

use App\Models\WriterMediaFilesAssg;
use App\Models\WriterMediaProfile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Validator;
use Illuminate\Http\Request;
use App\Models\AnonymousFeedback;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class webController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function webDashboard()
    {
        $page = "";
        return view("web.dashboard", compact('page'));
    }


    /**
     * @param Request $request
     * @return array|\Illuminate\Http\RedirectResponse
     */
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


    /**
     * @param Request $request
     * @return array|string
     */
    public function saveWriterImg(Request $request){

        $validate = Validator::make($request->all(), [

            'img_prf.*' => 'required|file',

        ]);
        if ($validate->fails()) {
            $errors = ([
                'code'=> -1,
                'errs'=>$validate->errors()
            ]);
            return $errors;
        }

        $doc = $request->img_prf;

        if (WriterMediaProfile::where('id', Auth::guard('web')->user()->id)->first() != null ){


        WriterMediaProfile::where('id', Auth::guard('web')->user()->id )
            ->where('status', 1)
            ->update([
                'name' => $doc->getClientOriginalName(),
                'media_link' => Storage::putFile('public/writerProfileImg', $doc),
                'type' => $doc->getClientOriginalExtension()
            ]);


            return "profile updated";

        }else{
            WriterMediaProfile::create([
                'user_id' => Auth::guard('web')->user()->id,
                'name' => $doc->getClientOriginalName(),
                'media_link' => Storage::putFile('public/writerProfileImg', $doc),
                'type' => $doc->getClientOriginalExtension()
            ]);
            return "profile created";

        }

    }
}
