<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\ChamaNotification;
use App\Models\ContributionCategory;
use App\Models\Member;
use App\Models\PenaltyCategory;
use App\Models\WithdrawCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class admin_updateDataController extends Controller
{

    public function updateNotifications(Request $request){
        try {
            DB::beginTransaction();

            $validate = Validator::make($request->all(), [
                'name' => 'required',
                'description' => 'required'
            ]);
            if ($validate->fails()) {
                return ([
                    'code' => -1,
                    'errs' => $validate->errors()
                ]);
            }
            $x_id = $request->id;
            $c_data =ChamaNotification::where('id', $x_id)->update([
                'name' => $request->name,
                'description' =>$request->description
            ]);

            DB::commit();
            return [
                'code' => 1,
                'msg' => $c_data
            ];

        }catch (\Exception $e){
            DB::rollBack();
            report($e);

            $errs = [
                'code' => -1,
                'data' => $e->getMessage()
            ];
//            return back()->with($errs);
            return $errs;

        }
    }


    public function updateUserSuggestions(Request $request){
        try {
            DB::beginTransaction();

            $validate = Validator::make($request->all(), [
//
            ]);
            if ($validate->fails()) {
                return ([
                    'code' => -1,
                    'errs' => $validate->errors()
                ]);
            }
            $x_id = '';
            $c_data =x::where('id', $x_id)->update([

            ]);

            DB::commit();
            return [
                'code' => 1,
                'msg' => $c_data
            ];

        }catch (\Exception $e){
            DB::rollBack();
            report($e);

            $errs = [
                'code' => -1,
                'data' => $e->getMessage()
            ];
//            return back()->with($errs);
            return $errs;

        }
    }


    public function updateChamaAcc(Request $request){
        try {
            DB::beginTransaction();

            $validate = Validator::make($request->all(), [
//
            ]);
            if ($validate->fails()) {
                return ([
                    'code' => -1,
                    'errs' => $validate->errors()
                ]);
            }
            $x_id = '';
            $c_data =x::where('id', $x_id)->update([

            ]);

            DB::commit();
            return [
                'code' => 1,
                'msg' => $c_data
            ];

        }catch (\Exception $e){
            DB::rollBack();
            report($e);

            $errs = [
                'code' => -1,
                'data' => $e->getMessage()
            ];
//            return back()->with($errs);
            return $errs;

        }
    }


    public function updateChama(Request $request){
        try {
            DB::beginTransaction();

            $validate = Validator::make($request->all(), [
//
            ]);
            if ($validate->fails()) {
                return ([
                    'code' => -1,
                    'errs' => $validate->errors()
                ]);
            }
            $x_id = '';
            $c_data =x::where('id', $x_id)->update([

            ]);

            DB::commit();
            return [
                'code' => 1,
                'msg' => $c_data
            ];

        }catch (\Exception $e){
            DB::rollBack();
            report($e);

            $errs = [
                'code' => -1,
                'data' => $e->getMessage()
            ];
//            return back()->with($errs);
            return $errs;

        }
    }


    public function updateMemberAcc(Request $request){
        try {
            DB::beginTransaction();

            $validate = Validator::make($request->all(), [
//
            ]);
            if ($validate->fails()) {
                return ([
                    'code' => -1,
                    'errs' => $validate->errors()
                ]);
            }
            $x_id = '';
            $c_data =x::where('id', $x_id)->update([

            ]);

            DB::commit();
            return [
                'code' => 1,
                'msg' => $c_data
            ];

        }catch (\Exception $e){
            DB::rollBack();
            report($e);

            $errs = [
                'code' => -1,
                'data' => $e->getMessage()
            ];
//            return back()->with($errs);
            return $errs;

        }
    }


    public function updateMembers(Request $request){
        try {
            DB::beginTransaction();

            $validate = Validator::make($request->all(), [
                'national_id' => 'required',
                'phone_number' => 'required',
                'email' => 'required',
                'username' => 'required',
                'gender' => 'required',
                'fname' => 'required',
                'sname' => 'required',
                'lname' => 'required'
            ]);
            if ($validate->fails()) {
                return ([
                    'code' => -1,
                    'errs' => $validate->errors()
                ]);
            }
            $x_id = $request->member_id;
//            return $x_id;
            $c_data =Member::where('id', $x_id)
                ->first()
                ->user
                ->update([
                'national_id' => $request->national_id,
                'phone_number' => $request->phone_number,
                'email' => $request->email,
                'username' => $request->username,
                'gender' => $request->gender,
                'fname' => $request->fname,
                'sname' => $request->sname,
                'lname' => $request->lname
            ]);

            DB::commit();
            return [
                'code' => 1,
                'msg' => $c_data
            ];

        }catch (\Exception $e){
            DB::rollBack();
            report($e);

            $errs = [
                'code' => -1,
                'data' => $e->getMessage()
            ];
//            return back()->with($errs);
            return $errs;

        }
    }

    public function updateAdmins(Request $request){
            try {
                DB::beginTransaction();

                $validate = Validator::make($request->all(), [
                    'national_id' => 'required',
                    'phone_number' => 'required',
                    'email' => 'required',
                    'username' => 'required',
                    'gender' => 'required',
                    'fname' => 'required',
                    'sname' => 'required',
                    'lname' => 'required'
                ]);
                if ($validate->fails()) {
                    return ([
                        'code' => -1,
                        'errs' => $validate->errors()
                    ]);
                }
                $x_id = $request->admin_id;
    //            return $x_id;
                $c_data =Admin::where('id', $x_id)
                    ->first()
                    ->user
                    ->update([
                    'national_id' => $request->national_id,
                    'phone_number' => $request->phone_number,
                    'email' => $request->email,
                    'username' => $request->username,
                    'gender' => $request->gender,
                    'fname' => $request->fname,
                    'sname' => $request->sname,
                    'lname' => $request->lname
                ]);

                DB::commit();
                return [
                    'code' => 1,
                    'msg' => $c_data
                ];

            }catch (\Exception $e){
                DB::rollBack();
                report($e);

                $errs = [
                    'code' => -1,
                    'data' => $e->getMessage()
                ];
    //            return back()->with($errs);
                return $errs;

            }
        }


    public function updatePenalties(Request $request){
        try {
            DB::beginTransaction();

            $validate = Validator::make($request->all(), [
                'name' => 'required',
                'description' => 'required'
            ]);
            if ($validate->fails()) {
                return ([
                    'code' => -1,
                    'errs' => $validate->errors()
                ]);
            }

            $x_id = $request->id;
            $c_data =PenaltyCategory::where('id', $x_id)->update([
                'name' => $request->name,
                'description' =>$request->description
            ]);

            DB::commit();
            return [
                'code' => 1,
                'msg' => $c_data
            ];

        }catch (\Exception $e){
            DB::rollBack();
            report($e);

            $errs = [
                'code' => -1,
                'data' => $e->getMessage()
            ];
//            return back()->with($errs);
            return $errs;

        }
    }


    public function penaltiesCat(Request $request){
        try {
            DB::beginTransaction();

            $validate = Validator::make($request->all(), [
                'id'=> 'required|exists:contribution_categories,id',
                'name'=>'required',
                'description'=>'required'
            ]);
            if ($validate->fails()) {
                return ([
                    'code' => -1,
                    'errs' => $validate->errors()
                ]);
            }
            $x_id =$request->id;
            $c_data =PenaltyCategory::where('id', $x_id)->update([
                'name' => $request->name,
                'amount' => $request->amount,
                'description' => $request->description
            ]);

            DB::commit();
            return [
                'code' => 1,
                'msg' => $c_data
            ];

        }catch (\Exception $e){
            DB::rollBack();
            report($e);

            $errs = [
                'code' => -1,
                'data' => $e->getMessage()
            ];
//            return back()->with($errs);
            return $errs;

        }
    }


    public function updateLoanWithdrawals(Request $request){
        try {
            DB::beginTransaction();

            $validate = Validator::make($request->all(), [
//
            ]);
            if ($validate->fails()) {
                return ([
                    'code' => -1,
                    'errs' => $validate->errors()
                ]);
            }
            $x_id = '';
            $c_data =x::where('id', $x_id)->update([

            ]);

            DB::commit();
            return [
                'code' => 1,
                'msg' => $c_data
            ];

        }catch (\Exception $e){
            DB::rollBack();
            report($e);

            $errs = [
                'code' => -1,
                'data' => $e->getMessage()
            ];
//            return back()->with($errs);
            return $errs;

        }
    }


    public function updateRequestedLoan(Request $request){
        try {
            DB::beginTransaction();

            $validate = Validator::make($request->all(), [
//
            ]);
            if ($validate->fails()) {
                return ([
                    'code' => -1,
                    'errs' => $validate->errors()
                ]);
            }
            $x_id = '';
            $c_data =x::where('id', $x_id)->update([

            ]);

            DB::commit();
            return [
                'code' => 1,
                'msg' => $c_data
            ];

        }catch (\Exception $e){
            DB::rollBack();
            report($e);

            $errs = [
                'code' => -1,
                'data' => $e->getMessage()
            ];
//            return back()->with($errs);
            return $errs;

        }
    }


    public function updatePayoutsWithdrawals(Request $request){
        try {
            DB::beginTransaction();

            $validate = Validator::make($request->all(), [
//
            ]);
            if ($validate->fails()) {
                return ([
                    'code' => -1,
                    'errs' => $validate->errors()
                ]);
            }
            $x_id = '';
            $c_data =x::where('id', $x_id)->update([

            ]);

            DB::commit();
            return [
                'code' => 1,
                'msg' => $c_data
            ];

        }catch (\Exception $e){
            DB::rollBack();
            report($e);

            $errs = [
                'code' => -1,
                'data' => $e->getMessage()
            ];
//            return back()->with($errs);
            return $errs;

        }
    }


    public function withdrawalsCat(Request $request){
        try {
            DB::beginTransaction();

            $validate = Validator::make($request->all(), [
                'id'=> 'required|exists:withdraw_categories,id',
                'name'=>'required',
                'description'=>'required'
            ]);
            if ($validate->fails()) {
                return ([
                    'code' => -1,
                    'errs' => $validate->errors()
                ]);
            }
            $x_id =$request->id;
            $c_data =WithdrawCategory::where('id', $x_id)->update([
                'name' => $request->name,
                'description' => $request->description
            ]);

            DB::commit();
            return [
                'code' => 1,
                'msg' => $c_data
            ];

        }catch (\Exception $e){
            DB::rollBack();
            report($e);

            $errs = [
                'code' => -1,
                'data' => $e->getMessage()
            ];
//            return back()->with($errs);
            return $errs;

        }
    }


    public function updateSavingsContributions(Request $request){
        try {
            DB::beginTransaction();

            $validate = Validator::make($request->all(), [
//
            ]);
            if ($validate->fails()) {
                return ([
                    'code' => -1,
                    'errs' => $validate->errors()
                ]);
            }
            $x_id = '';
            $c_data =x::where('id', $x_id)->update([

            ]);

            DB::commit();
            return [
                'code' => 1,
                'msg' => $c_data
            ];

        }catch (\Exception $e){
            DB::rollBack();
            report($e);

            $errs = [
                'code' => -1,
                'data' => $e->getMessage()
            ];
//            return back()->with($errs);
            return $errs;

        }
    }


    public function updateNormalContributions(Request $request){
        try {
            DB::beginTransaction();

            $validate = Validator::make($request->all(), [
//
            ]);
            if ($validate->fails()) {
                return ([
                    'code' => -1,
                    'errs' => $validate->errors()
                ]);
            }
            $x_id = '';
            $c_data =x::where('id', $x_id)->update([

            ]);

            DB::commit();
            return [
                'code' => 1,
                'msg' => $c_data
            ];

        }catch (\Exception $e){
            DB::rollBack();
            report($e);

            $errs = [
                'code' => -1,
                'data' => $e->getMessage()
            ];
//            return back()->with($errs);
            return $errs;

        }
    }


    public function updateMiscContributions(Request $request){
        try {
            DB::beginTransaction();

            $validate = Validator::make($request->all(), [
//
            ]);
            if ($validate->fails()) {
                return ([
                    'code' => -1,
                    'errs' => $validate->errors()
                ]);
            }
            $x_id = '';
            $c_data =x::where('id', $x_id)->update([

            ]);

            DB::commit();
            return [
                'code' => 1,
                'msg' => $c_data
            ];

        }catch (\Exception $e){
            DB::rollBack();
            report($e);

            $errs = [
                'code' => -1,
                'data' => $e->getMessage()
            ];
//            return back()->with($errs);
            return $errs;

        }
    }

    public function contributionsCat(Request $request){
        try {
            DB::beginTransaction();

            $validate = Validator::make($request->all(), [
                'id'=> 'required|exists:contribution_categories,id',
                'name'=>'required',
                'description'=>'required'
            ]);
            if ($validate->fails()) {
                return ([
                    'code' => -1,
                    'errs' => $validate->errors()
                ]);
            }
            $x_id =$request->id;
            $c_data =ContributionCategory::where('id', $x_id)->update([
                'name' => $request->name,
                'description' => $request->description
            ]);

            DB::commit();
            return [
                'code' => 1,
                'msg' => $c_data
            ];

        }catch (\Exception $e){
            DB::rollBack();
            report($e);

            $errs = [
                'code' => -1,
                'data' => $e->getMessage()
            ];
//            return back()->with($errs);
            return $errs;

        }
    }




}
