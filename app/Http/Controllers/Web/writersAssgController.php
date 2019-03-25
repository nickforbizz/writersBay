<?php

namespace App\Http\Controllers\Web;

use App\Models\Assignment;
use App\Models\Chat;
use App\Models\ChatsUser;
use App\Models\Completedassignment;
use Illuminate\Http\Request;
use App\Models\OnreviewAssignment;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\OnprogressAssignment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class writersAssgController extends Controller
{
    //

    public function theLogout()
    {

        Auth::logout();
        return view('web.root');
    }


    public function onProgressAssg()
    {
        // for bid page
        $page = "";
        return view('web.onProgress', compact('page'));
    }

    public function uploadAssg($id)
    {
        $page = "";
        return view('web.uploadAssg', compact('page', 'id'));
    }

    public function reviewAssg()
    {
        $page = "";
        return view('web.onreview', compact('page'));
    }

    public function revision()
    {
        $page = "";
        return view('web.revision', compact('page'));
    }

    public function pendingAssg()
    {
        $page = "";
        return view('web.pendingPayment', compact('page'));
    }

    public function rejectedAssg()
    {
        $page = "";
        return view('web.test', compact('page'));
    }


    public function completedAssg()
    {
        $page = "";
        return view('web.completedAssg', compact('page'));
    }

    public function settings()
    {
        $page = "";
        return view('web.settings', compact('page'));
    }

    public function viewOrders()
    {
        $page = "ordersPage";
        return view('web.orders', compact('page'));
    }

    public function takeOrder(Request $request, $id, $writer_id)
    {
        try {
            DB::beginTransaction();
            $validate = Validator::make([
                'id' => $id,
                'writer_id' => $writer_id
            ],[
                'id' => "required|exists:assignment,id",
                'writer_id' => "required|exists:users,id",
            ]);
            if ($validate->fails()) {
                return ([
                    'code'=> -1,
                    'errs'=>$validate->errors()
                ]);
            }
            $order = \App\Models\Assignment::find($id);

            $order->active = 0;
            $order->update();

            $on_progress_assg = new OnprogressAssignment([
                'assg_id' => $id,
                'user_id' => $writer_id
            ]);

            $on_progress_assg->save();

            DB::commit();
            return [
                'code' => 1,
                'status' => 'success',
                'data' => $on_progress_assg
            ];
        } catch (\Exeption $th) {
            DB::rollback();
            report($th);
            return [
                "code"=>-1,
                "status"=>"failed",
                "data"=>$th->getMessage()
            ];
        }



        return $order;

        // return [
        //     "order-id"=>$id,
        //     "writer-id"=>$writer_id
        // ];
    }

    /**
     * @param Request $request
     * @return array|\Illuminate\Http\RedirectResponse
     */
    public function submitAssg(Request $request)
    {
        try {
            $page = "";
            DB::beginTransaction();
            $validate = Validator::make($request->all(), [
                'user_id' => 'required|exists:users,id',
                'onprogress_id' => 'required|exists:onprogressassignment,id',
                'docs' => 'required|array|min:1',
                'docs.*' => 'required|file',
                'upload_comment' => 'required',
            ]);
            if ($validate->fails()) {
                $errors = ([
                    'code'=> -1,
                    'errs'=>$validate->errors()
                ]);

                 return back()->with($errors);
//                return $errors;
            }

            /** @var OnprogressAssignment $order_progress */
            $order_progress = OnprogressAssignment::find($request->onprogress_id);
            $order_progress->active = 0;
            $order_progress->update();




            /** @var OnreviewAssignment $review */
            $review = new OnreviewAssignment([
                'user_id' => $request->user_id,
                'on_progress_assg_id' => $request->onprogress_id,
//                'doc_link' => $path,
                'upload_comment' => $request->upload_comment,

            ]);

            $review->saveOrFail();
//            return $review->id;


            foreach ($request->file('docs') as $doc){
                $review->writerMediaFilesAssgs()->create([
                    'user_id'=>Auth::guard('web')->user()->id,
                    'onreview_id'=>$review->id,
                    'name'=>$doc->getClientOriginalName(),
                    'media_link'=>Storage::putFile('public/writer_docs', $doc),
                    'type'=>$doc->getClientOriginalExtension()
                ]);
            }
            DB::commit();
//            $success_data =  [
//                "code" => 1,
//                "status" => "success",
//                "data" => $review
//            ];

            return redirect()->route('Web.progressAssg')->with(compact('page'));
            // return "pages";

        } catch (\Exeption $e) {
            DB::rollback();
            report($e);
            return [
                "code" => 0,
                "status" => "failed",
                "data" => $e->getMessage()
            ];

        }
        // return view('web.test', compact('page'));
    }

    public function orderDetails($id)
    {
        $order = Assignment::where('status', 1)
                            ->where('active', 1)
                            ->find($id);
        $page = "ordersPage";

        return view('Web.orderDetails', compact('page', 'order'));
    }

}

//end of class

//{{--this website was made by Wainaina Nicholas Waruingi of Mombex Ent contact him through +254707722247 or email nickforbiz@gmail.com--}}