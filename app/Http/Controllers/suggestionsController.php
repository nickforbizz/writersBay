<?php

namespace App\Http\Controllers;

use App\Models\GuestSuggestion;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class suggestionsController extends Controller
{
    public function guestSuggestions(Request $request)
    {
        try {
            DB::beginTransaction();
            $validate = Validator::make($request->all(), [
                'name'=> 'required',
                'email' => 'required|email',
                'subject' => 'required|string',
                'description' => 'required|string',

            ]);
            if ($validate->fails()) {
                return ([
                    'code'=> -1,
                    'errs'=>$validate->errors()
                ]);
            }

            /** @var $guestMsg $guestMsg */
            $guestMsg = new GuestSuggestion([
                'name' => $request->name,
                'email' => $request->email,
                'subject' => $request->subject,
                'description' => $request->description
            ]);


            $guestMsg->save();

            DB::commit();
            $backData =  [
                "code" => 1,
                "status" => "success",
                "data" => $guestMsg
            ];
            return back()->with($backData);
        } catch (\Exeption $e) {
            DB::rollback();
            report($e);
            return [
                "code" => 0,
                "status" => "failed",
                "data" => $e->getMessage()
            ];

        }
    }

}
