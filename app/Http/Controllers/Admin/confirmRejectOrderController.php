<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AssgPendingPayment;
use App\Models\Assignment;
use App\Models\Onprogressassignment;
use App\Models\Onreviewassignment;
use App\Models\Onrevisionassignment;

use App\Models\RejectedAssg;
use App\Models\UserRating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class confirmRejectOrderController extends Controller
{


    /**
     * @param Request $request
     * @param $id
     * @param $writer_id
     * @return array|string
     */
    public function confirmOrder(Request $request, $id, $writer_id)
    {
        try {
            DB::beginTransaction();
            $validate = Validator::make($request->all(), [
                'review_id' => $id,
                'user_id' => $writer_id
            ], [
                'review_id' => 'required|exists:onreviewassignment,id',
                'user_id' => 'required|exists:users,id'
            ]);

            if ($validate->fails()) {
                return ([
                    'code' => -1,
                    'errs' => $validate->errors()
                ]);
            }


            /** @var AssgPendingPayment $pending_pay */
            $pending_pay = new AssgPendingPayment([
                'user_id' => $writer_id,
                'review_id' => $id

            ]);

            $pending_pay->save();

            $check_id = $pending_pay->onreviewassignment->onprogressassignment->assignment->id;
            /** @var UserRating $rating */
            $rating = new UserRating([
                'user_id' => $writer_id,
                'assg_id' => $check_id,
            ]);

            $rating->save();


            /** @var UserRating $cc */
            $cc = UserRating::where('assg_id', $check_id)
                    ->where('user_id', $writer_id)
                    ->exists();
            if ($cc){
                $cd = UserRating::where('assg_id',$check_id)
                        ->first();
                if ($cd->count == 0){
                    $cd->update([
                        'count'=>2,
                        'warn'=>0
                    ]);
                } elseif ($cd->count == -1){
                    $cd->update([
                        'count'=>1,
                        'warn'=>1
                    ]);
                }
               $cd->save();
            }else{
                return "User or Assignment Not Found";
            }

            $underReview = Onreviewassignment::find($id)->first();
            $underReview->update([
                'active'=>0
            ]);
            $underReview->save();

            DB::commit();
            return [
                "code" => 1,
                "status" => "success",
                "data" => $pending_pay
            ];
        }catch(\Exeption $e) {
//            DB::rollback();
            report($e);
            return [
                "code" => 0,
                "status" => "failed",
                "data" => $e->getMessage()
            ];

        }
    }

    /**
     * @param Request $request
     * @param $id
     * @param $writer_id
     * @return array
     */
    public function rejectOrder(Request $request){
        try {
            DB::beginTransaction();
            $validate = Validator::make($request->all(), [
                'review_id' =>  'required|exists:onreviewassignment,id',
                'writer_id' =>  'required|exists:users,id',
                'reason_revised' => 'required'
            ]);

            if ($validate->fails()) {
                return ([
                    'code' => -1,
                    'errs' => $validate->errors()
                ]);
            }


            /** @var Onrevisionassignment $itsRevision */
            $itsRevision = new Onrevisionassignment([
                'user_id' => $request->writer_id,
                'admin_id' => Auth::guard('admin')->user()->id,
                'review_id' => $request->review_id,
                'reason_revised' => $request->reason_revised

            ]);

            $itsRevision->save();

            $check_id = $itsRevision->onreviewassignment->onprogressassignment->assignment->id;

            /** @var UserRating $cc */
            $cc = UserRating::where('assg_id', $check_id)
                ->where('user_id', $request->writer_id)
                ->exists();
            if ($cc){
                $cd = UserRating::where('assg_id',$check_id)
                    ->first();
                if ($cd->count == 0){
                    $cd->update([
                        'count'=>-1,
                        'warn'=>1
                    ]);
                } elseif ($cd->count == -1){
                    $cd->update([
                        'count'=>-2,
                        'warn'=>2
                    ]);
                }
                $cd->save();
            }else{
                /** @var UserRating $rating */
                $rating = new UserRating([
                    'user_id' => $request->writer_id,
                    'assg_id' => $check_id,
                ]);

                $rating->save();
            }

            $underReview = Onreviewassignment::find($request->review_id)->first();
            $underReview->update([
                'active'=>0,
                'status'=>0
            ]);
            $underReview->save();

            DB::commit();
            return [
                "code" => 1,
                "status" => "success",
                "data" => $itsRevision
            ];
        }catch(\Exeption $e) {
//            DB::rollback();
            report($e);
            return [
                "code" => 0,
                "status" => "failed",
                "data" => $e->getMessage()
            ];

        }
    }
}

