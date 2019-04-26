<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Chama;
use App\Models\ChamaNotification;
use App\Models\Contribution;
use App\Models\ContributionCategory;
use App\Models\LoanRequested;
use App\Models\LoanWithdrawal;
use App\Models\Member;
use App\Models\MemberAcc;
use App\Models\MiscalleneousContribution;
use App\Models\NormalContribution;
use App\Models\Notification;
use App\Models\PayoutWithdrawal;
use App\Models\Penalty;
use App\Models\PenaltyCategory;
use App\Models\SavingsContribution;
use App\Models\Suggestion;
use App\Models\User;
use App\Models\Withdrawal;
use App\Models\WithdrawCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class adminDataController extends Controller
{

//          return ($data);                       return ($errs);



    public function theLogout()
    {

        Auth::logout();
        return view('index');
    }


    /**
     * @param Request $request
     * @return array|\Illuminate\Http\RedirectResponse
     */
    public function createChama(Request $request)
    {
        try {
            DB::beginTransaction();
            $validate = Validator::make($request->all(), [
                'name'  => 'required',
                'description'  => 'required',
                'mission'  => 'required',
                'vision'  => 'required',
                'goals'  => 'required',
            ]);
            if ($validate->fails()) {
                return ([
                    'code' => -1,
                    'errs' => $validate->errors()
                ]);
            }
            /** @var $chama $chama */
            $chama = new Chama([
                'name'  => $request->name,
                'description'  => $request->description,
                'mission'  => $request->mission,
                'vision'  => $request->vision,
                'goals'  => $request->goals,
            ]);
            $chama->save();
            DB::commit();
            $data = [
                'code' => 1,
                'data' => 'Successfully registered'
            ];
            return back()->with($data);
        }catch (\Exception $e){
            DB::rollBack();
            report($e);

            $errs = [
                'code' => -1,
                'data' => $e->getMessage()
            ];
            return back()->with($errs);

        }
    }

    /**
     * @param Request $request
     * @return array|\Illuminate\Http\RedirectResponse
     */
    public function userRegistration(Request $request)
    {
        try {
            DB::beginTransaction();
            $validate = Validator::make($request->all(), [
                'chama_id' => 'required|exists:chama,id',
                'fname' => 'required|string',
                'lname' => 'required|string',
                'sname' => 'required|string',
                'password' => 'required|confirmed',
                'username' => 'required',
            ]);
            if ($validate->fails()) {
                return ([
                    'code' => -1,
                    'errs' => $validate->errors()
                ]);
            }
            $user = new User([
                'chama_id' => $request->chama_id,
                'national_id' => $request->national_id,
                'phone_number' => $request->mobile,
                'email' => $request->email,
                'username' => $request->username,
                'gender' => $request->gender,
                'password' => Hash::make($request->password),
                'fname' => $request->fname,
                'sname' => $request->sname,
                'lname' => $request->lname
            ]);
            $user->save();
            DB::commit();
            $data = [
                'code' => 1,
                'data' => 'Successfully registered'
            ];
            return back()->with($data);
        }catch (\Exception $e){
            DB::rollBack();
            report($e);

            $errs = [
                'code' => -1,
                'data' => $e->getMessage()
            ];
            return back()->with($errs);

        }
    }


    /**
     * @param Request $request
     * @return array|\Illuminate\Http\RedirectResponse
     */
    public function createMembers(Request $request)
    {
        try {
            DB::beginTransaction();
            $validate = Validator::make($request->all(), [
                'chama_id'=> 'required',
                'national_id'=> 'required',
                'phone_number' => 'required',
                'email'=> 'required|unique:users,email',
                'username'=> 'required',
                'gender'=> 'required',
                'fname'=> 'required',
                'sname'=> 'required' ,
                'lname' => 'required'
            ]);
            if ($validate->fails()) {
                return ([
                    'code' => 3,
                    'errs' => $validate->errors()
                ]);
            }
            if( $request->member_level == null ){
                $request->member_level = 0;
            }

            $user = new User([
                'chama_id'=> $request->chama_id,
                'national_id'=> $request->national_id,
                'phone_number' => $request->phone_number,
                'email'=> $request->email,
                'username'=> $request->username,
                'gender'=> $request->gender,
                'fname'=> $request->fname,
                'sname'=> $request->sname ,
                'lname' => $request->lname
            ]);
            $user->save();
            /** @var $member $member */
            $member= new Member([
                'user_id' => $user->id,

            ]);
            $member->save();
            DB::commit();
            $data = [
                'code' => 1,
                'data' => 'Successfully registered'
            ];
//            return back()->with($data);
            return ($data);
        }catch (\Exception $e){
            DB::rollBack();
            report($e);

            $errs = [
                'code' => -1,
                'data' => $e->getMessage()
            ];
//            return back()->with($errs);
            return ($errs);

        }
    }


    /**
     * @param Request $request
     * @return array|\Illuminate\Http\RedirectResponse
     */
    public function contributionsCat(Request $request)
    {
        try {
            DB::beginTransaction();
            $validate = Validator::make($request->all(), [
                'name'=> 'required',
                'description'=> 'required'

            ]);
            if ($validate->fails()) {
                return ([
                    'code' => -1,
                    'errs' => $validate->errors()
                ]);
            }

            /** @var $contribution_category $contribution_category */
            $contribution_category = new ContributionCategory([
                'name'=> $request->name,
                'description'=> $request->description
                ]);
            $contribution_category->save();
            DB::commit();
            $data = [
                'code' => 1,
                'data' => 'Successfully registered'
            ];
//            return back()->with($data);
            return $data;
        }catch (\Exception $e){
            DB::rollBack();
            report($e);

            $errs = [
                'code' => -1,
                'data' => $e->getMessage()
            ];
            return back()->with($errs);

        }
    }


    /**
     * @param Request $request
     * @return array|\Illuminate\Http\RedirectResponse
     */
    public function createMiscContributions(Request $request)
    {
        try {
            DB::beginTransaction();
            $validate = Validator::make($request->all(), [
                'member_id'=> 'required',
                'category_id' => 'required',
                'amount' => 'required'
            ]);

            if ($validate->fails()) {
                return ([
                    'code' => -1,
                    'errs' => $validate->errors()
                ]);
            }
            $date_due = Carbon::now()->addMonth(1);

            /** @var $contribute $contribute */
            $contribute = new Contribution([
                'member_id' => $request->member_id,
                'category_id' => $request->category_id,
                'amount' => $request->amount,
                'date_due' => $date_due,
                'description' => $request->description
            ]);
            $contribute->save();

            /** @var $miscContribution $miscContribution */
            $miscContribution = new MiscalleneousContribution([
                'contribution_id' => $contribute->id,
            ]);
            $miscContribution->save();
            DB::commit();
            $data = [
                'code' => 1,
                'data' => 'Successfully registered'
            ];
//            return back()->with($data);
            return $data;
        }catch (\Exception $e){
            DB::rollBack();
            report($e);

            $errs = [
                'code' => -1,
                'data' => $e->getMessage()
            ];
//            return back()->with($errs);
            return ($errs);
        }
    }

    /**
     * @param Request $request
     * @return array|\Illuminate\Http\RedirectResponse
     */
    public function createNormalContributions(Request $request)
    {
        try {

            DB::beginTransaction();

            $validate = Validator::make($request->all(), [
                'member_id'=> 'required',
                'category_id' => 'required',
                'amount' => 'required'
            ]);
            if ($validate->fails()) {
                return ([
                    'code' => -1,
                    'errs' => $validate->errors()
                ]);
            }
//            $date_due = strtotime('first day of +1 month');
            $date_due = Carbon::now()->addMonth(1);
            /** @var $contribute Contribution */
            $contribute = new Contribution([
                'member_id' => $request->member_id,
                'category_id' => $request->category_id,
                'amount' => $request->amount,
                'date_due' => $date_due,
                'description' => $request->description
            ]);
            $contribute->save();

            /** @var $normalContribution NormalContribution */
            $normalContribution = new NormalContribution([
                'contribution_id' => $contribute->id,
            ]);
            $normalContribution->save();


            DB::commit();

            $data = [
                'code' => 1,
                'data' => 'Successfully registered'
            ];
            return ($data);
//            return back()->with($data);
        }catch (\Exception $e){
            DB::rollBack();
            report($e);

            $errs = [
                'code' => -1,
                'data' => $e->getMessage()
            ];
            return ($errs);
//            return back()->with($errs);

        }
    }

    /**
     * @param Request $request
     * @return array|\Illuminate\Http\RedirectResponse
     */
    public function createSavingsContributions(Request $request)
    {
        try {
            DB::beginTransaction();
            $validate = Validator::make($request->all(), [
                'member_id'=> 'required',
                'category_id' => 'required',
                'amount' => 'required'
            ]);
            if ($validate->fails()) {
                return ([
                    'code' => -1,
                    'errs' => $validate->errors()
                ]);
            }

            $date_due = Carbon::now()->addMonth(1);

            /** @var $contribute $contribute */
            $contribute = new Contribution([
                'member_id' => $request->member_id,
                'category_id' => $request->category_id,
                'amount' => $request->amount,
                'date_due' => $date_due,
                'description' => $request->description
            ]);
            $contribute->save();

            /** @var  $savingContribution  SavingsContribution*/
            $savingContribution = new SavingsContribution([
                'contribution_id' => $contribute->id,
            ]);
            $savingContribution->save();

            DB::commit();
            $data = [
                'code' => 1,
                'data' => 'Successfully registered'
            ];
//            return back()->with($data);
            return ($data);

        }catch (\Exception $e){
            DB::rollBack();
            report($e);

            $errs = [
                'code' => -1,
                'data' => $e->getMessage()
            ];
            return ($errs);
//            return back()->with($errs);

        }
    }


    /**
     * @param Request $request
     * @return array|\Illuminate\Http\RedirectResponse
     */
    public function withdrawalsCat(Request $request)
    {
        try {
            DB::beginTransaction();
            $validate = Validator::make($request->all(), [
                'name'=> 'required|string',
                'description'=> 'required|string'
            ]);
            if ($validate->fails()) {
                return ([
                    'code' => -1,
                    'errs' => $validate->errors()
                ]);
            }

            /** @var  $withdrawCat WithdrawCategory */
            $withdrawCat = new WithdrawCategory([
                'name'=> $request->name,
                'description'=> $request->description
            ]);
            $withdrawCat->save();

            DB::commit();

            $data = [
                'code' => 1,
                'data' => 'Successfully registered'
            ];
//            return back()->with($data);
            return $data;
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


    public function createRequestedLoan(Request $request){
        try {
            DB::beginTransaction();

            $validate = Validator::make($request->all(), [
//                'member_id' => 'required',
                'amount' => 'required',
            ]);
            if ($validate->fails()) {
                return ([
                    'code' => -1,
                    'errs' => $validate->errors()
                ]);
            }

            /** @var  $userLoan LoanRequested */
            $userLoan = new LoanRequested([
                'member_id' => Auth::guard('web')->user()->id,
                'amount'=> $request->amount
            ]);
            $userLoan->save();
            $date_due = 1;
            $out = $this->checkAccDebit($userLoan);
            if($out["code"] == -1){
                $msg = "Account balance have outstanding loan of Ksh ". $out['loan'];
//                return back()->with($msg);
                return [
                    'code'=>0,
                    'msg'=>$msg
                ];

            }elseif ($out['code'] == 1){
                $this->MemberLoans($userLoan, $date_due);
                $msg =  "Your Account has been updated";
//                return back()->with($msg);
                return [
                    'code'=>0,
                    'msg'=>$msg
                ];


            }elseif ($out['code'] == 2){

                $this->MemberLoans($userLoan, $date_due);
                $msg =  "Your Account has been created";
//                return back()->with($msg);
                return [
                    'code'=>0,
                    'msg'=>$msg
                ];

            }else{

                return  $this->checkAccDebit($userLoan)['code'];
            }

            DB::commit();
            $data = [
                'code' => 1,
                'data' => 'Successfully registered'
            ];
//            return back()->with($data);
            return ($data);
        }catch (\Exception $e){
            DB::rollBack();
            report($e);

            $errs = [
                'code' => -1,
                'data' => $e->getMessage()
            ];
//            return back()->with($errs);
            return ($errs);

        }
    }

    /**
     * @param Request $request
     * @return mixed|\Illuminate\Http\RedirectResponse
     */
    public function createPayoutsWithdrawals(Request $request, $id, $amount, $member_id)
    {
        try {
            DB::beginTransaction();

            $validate = Validator::make($request->all(), [
                'member_id'=> $member_id,
                'category_id'=> $id,
                'amount'=> $amount
            ],[
                'member_id'=>'required|exists:members,id',
                'category_id' => 'required',
                'amount' => 'required'
            ]);
            if ($validate->fails()) {
                return ([
                    'code' => -1,
                    'errs' => $validate->errors()
                ]);
            }
            $description = "The User Has Been Paid His or Her Amount";

//            return [
//                'member_id'=> $request->member_id,
//                'category_id'=> $request->id,
//                'amount'=> $request->amount
//            ];
            /** @var  $withdraw Withdrawal */
            $withdraw = new Withdrawal([
                'member_id' => $request->member_id,
                'category_id' => $id,
                'amount' => $request->amount,
                'paid' => 1,
                'description' => $description
            ]);
            $withdraw->save();
//
            \App\Models\NormalContribution::where('id', $id)->first()->update(['active'=>0]);
//            return NormalContribution::where('id', 2)->first();
            DB::commit();
            return [
                'code'=>2,
                'msg'=>$withdraw
            ];

        }catch (\Exception $e){
            DB::rollBack();
            report($e);

            $errs = [
                'code' => -1,
                'test'=>'whaaaaaaaaaaaat',
                'data' => $e->getMessage()
            ];
//            return back()->with($errs);
            return $errs;

        }
    }

    /**
     * @param Request $request
     * @return mixed|\Illuminate\Http\RedirectResponse
     */
    public function createLoanWithdrawals(Request $request)
    {
        try {
            DB::beginTransaction();
            $validate = Validator::make($request->all(), [
                'category_id' => 'required|string',
                'amount' => 'required|int|min:50',
            ]);
            $date_due = $request->date_due;
            if ($validate->fails()) {
                return ([
                    'code' => -1,
                    'errs' => $validate->errors()
                ]);
            }

            /** @var  $withdraw Withdrawal */
            $withdraw = new Withdrawal([
                'member_id' => $request->member_id,
                'category_id' => $request->category_id,
                'amount' => $request->amount,
                'paid' => $request->paid,
                'description' => $request->description
            ]);
            $withdraw->save();

            $out = $this->checkAccDebit($withdraw);
            if($out["code"] == -1){
                $msg = "Account balance have outstanding loan of Ksh ". $out['loan'];
//                return back()->with($msg);
                return $msg;

            }elseif ($out['code'] == 1){
                $this->MemberLoans($withdraw, $date_due);
                $msg =  "Your Account has been updated";
//                return back()->with($msg);
                return $msg;


            }elseif ($out['code'] == 2){

                $this->MemberLoans($withdraw, $date_due);
                $msg =  "Your Account has been created";
//                return back()->with($msg);
                return $msg;

            }else{

                return  $this->checkAccDebit($withdraw)['code'];
            }

//            return back()->with($data);
        }catch (\Exception $e){
            DB::rollBack();
            report($e);

            $errs = [
                'code' => -1,
                'data' => $e->getMessage()
            ];
            return back()->with($errs);

        }
    }


    /**
     * @param Request $request
     * @return array|\Illuminate\Http\RedirectResponse
     */
    public function penaltiesCat(Request $request)
    {
        try {
            DB::beginTransaction();
            $validate = Validator::make($request->all(), [
                'name'=> 'required|string',
                'description'=> 'required|string'
            ]);
            if ($validate->fails()) {
                return ([
                    'code' => -1,
                    'errs' => $validate->errors()
                ]);
            }

            /** @var  $penaltyCat PenaltyCategory */
            $penaltyCat = new PenaltyCategory([
                'name'=> $request->name,
                'amount'=> $request->amount,
                'description'=> $request->description
            ]);
            $penaltyCat->save();

            DB::commit();
            $data = [
                'code' => 1,
                'data' => 'Successfully registered'
            ];
//            return back()->with($data);
            return ($data);
        }catch (\Exception $e){
            DB::rollBack();
            report($e);

            $errs = [
                'code' => -1,
                'data' => $e->getMessage()
            ];
//            return back()->with($errs);
            return ($errs);

        }
    }


    /**
     * @param Request $request
     * @return array|\Illuminate\Http\RedirectResponse
     */
    public function createPenalties(Request $request)
    {
        try {
            DB::beginTransaction();
            $validate = Validator::make($request->all(), [
                'member'=> 'required',
                'penalty'=> 'required',
            ]);
            if ($validate->fails()) {
                return ([
                    'code' => -1,
                    'errs' => $validate->errors()
                ]);
            }

            $p_categ = PenaltyCategory::where('id', $request->penalty)->first();
            $desp =  $p_categ->description;

            $dateDue = Carbon::now()->addMonth();
            /** @var  $penalty Penalty */
            $penalty = new Penalty([
                'member_id' => $request->member,
                'category_id' => $request->penalty,
                'date_due' => $dateDue,
                'description'=>$desp
            ]);
            $penalty->save();
            DB::commit();
            $data = [
                'code' => 1,
                'data' => 'Successfully registered'
            ];
//            return back()->with($data);
            return ($data);
        }catch (\Exception $e){
            DB::rollBack();
            report($e);

            $errs = [
                'code' => -1,
                'data' => $e->getMessage()
            ];
//            return back()->with($errs);
            return ($errs);

        }
    }



    /**
     * @param Request $request
     * @return array|\Illuminate\Http\RedirectResponse
     */
    public function createUserSuggestions(Request $request)
    {
        try {
            DB::beginTransaction();
            $validate = Validator::make($request->all(), [
                'member_id' => 'required',
                'name' => 'required',
                'description' => 'required',
            ]);
            if ($validate->fails()) {
                return ([
                    'code' => -1,
                    'errs' => $validate->errors()
                ]);
            }

            /** @var  $userSuggest Suggestion */
            $userSuggest = new Suggestion([
                'member_id' => $request->member_id,
                'name' => $request->name,
                'description' => $request->description
            ]);
            $userSuggest->save();
            DB::commit();
            $data = [
                'code' => 1,
                'data' => 'Successfully registered'
            ];
//            return back()->with($data);
            return ($data);
        }catch (\Exception $e){
            DB::rollBack();
            report($e);

            $errs = [
                'code' => -1,
                'data' => $e->getMessage()
            ];
//            return back()->with($errs);
            return ($errs);

        }
    }

    /**
     * @param Request $request
     * @return array|\Illuminate\Http\RedirectResponse
     */
    public function createNotifications(Request $request)
    {
        try {
            DB::beginTransaction();
            $validate = Validator::make($request->all(), [
                'member_id' => 'required',
                'name' => 'required',
                'description' => 'required',
            ]);
            if ($validate->fails()) {
                return ([
                    'code' => -1,
                    'errs' => $validate->errors()
                ]);
            }

            /** @var  $userNotify Notification */
            $userNotify = new ChamaNotification([
                'member_id' => $request->member_id,
                'name' => $request->name,
                'description' => $request->description
            ]);
            $userNotify->save();
            DB::commit();
            $data = [
                'code' => 1,
                'data' => 'Successfully registered'
            ];
//            return back()->with($data);
            return ($data);
        }catch (\Exception $e){
            DB::rollBack();
            report($e);

            $errs = [
                'code' => -1,
                'data' => $e->getMessage()
            ];
//            return back()->with($errs);
            return ($errs);

        }
    }





    protected function checkAccDebit($withdraw){


        $profile_id = 1;
        /** @var  $profile MemberAcc */
        $profile = \App\Models\MemberAcc::find($profile_id);
        if ($profile != null) {
            // update record
            /** @var  $acc  MemberAcc */
            $acc = \App\Models\MemberAcc::find($profile_id)->first();
//            return $acc->debit + $withdraw->amount;
            if ($acc->debit > 0){
                return [
                    'code'=> -1,
                    'status'=> 'Not qualified for a loan',
                    'loan' => $acc->debit
                ];
            }else{
                $debit = ($acc->debit + $withdraw->amount);

                 \App\Models\MemberAcc::find($profile_id)->update([
                    'debit' =>$debit
                ]);

                 return ['code'=>1,
                        'debit'=>$debit
                 ];

            }
        }else{
            // create record
            $memberAccount = new MemberAcc([
                'member_id'=> $profile_id,
                'credit' => 0,
                'debit'=>  $withdraw->amount
            ]);
            $memberAccount->save();

            return ['code'=>2];
        }

    }


    protected function payOut($withdraw){
        /** @var  $payout PayoutWithdrawal*/
        $payout = new PayoutWithdrawal([
            'withdrawal_id' => $withdraw->id,
        ]);
        $payout->save();

        DB::commit();

        $data = [
            'code' => 1,
            'data' => 'Successfully registered'
        ];

        return $data;
    }

    public function MemberLoans($withdraw, $date_due){

        /** @var  $loans  LoanWithdrawal */
        $loans = new LoanWithdrawal([
            'withdrawal_id'   => $withdraw->id,
            'date_due' => $date_due
        ]);
        $loans->save();

//        DB::commit();


        $data = [
            'code' => 1,
            'data' => 'Successfully registered'
        ];

        return $data;
    }




}
