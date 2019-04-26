<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Chama;
use App\Models\ChamaAcc;
use App\Models\ChamaNotification;
use App\Models\ContributionCategory;
use App\Models\LoanRequested;
use App\Models\LoanWithdrawal;
use App\Models\Member;
use App\Models\MemberAcc;
use App\Models\MiscalleneousContribution;
use App\Models\NormalContribution;
use App\Models\PayoutWithdrawal;
use App\Models\Penalty;
use App\Models\PenaltyCategory;
use App\Models\SavingsContribution;
use App\Models\Suggestion;
use App\Models\WithdrawCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class admin_getDataController extends Controller
{

    public function getcontributionsCat($id){
        $pC = ContributionCategory::where('id',$id)->first();
        if($pC){
            return [
               'code'=>1,
                'model'=>'ContributionCategory',
                'msg'=> $pC
            ];

        }else{
            return [
                'code'=> 1,
                'msg' => 'Error Occurred Getting Data From The Server'
            ];
        }
    }

    public function getMiscContributions($id){
        $pC = MiscalleneousContribution::where('id',$id)->first();
        if($pC){
            return [
               'code'=>1,
                'model'=>'MiscalleneousContribution',
                'msg'=> $pC
            ];

        }else{
            return [
                'code'=> 1,
                'msg' => 'Error Occurred Getting Data From The Server'
            ];
        }
    }
    public function getNormalContributions($id){
        $pC = NormalContribution::where('id',$id)->first();
        if($pC){
            return [
               'code'=>1,
                'model'=>'NormalContribution',
                'msg'=> $pC
            ];

        }else{
            return [
                'code'=> 1,
                'msg' => 'Error Occurred Getting Data From The Server'
            ];
        }
    }

    public function getSavingsContributions($id){
        $pC = SavingsContribution::where('id',$id)->first();
        if($pC){
            return [
               'code'=>1,
                'model'=>'SavingsContribution',
                'msg'=> $pC
            ];

        }else{
            return [
                'code'=> 1,
                'msg' => 'Error Occurred Getting Data From The Server'
            ];
        }
    }
    public function getwithdrawalsCat($id){
        $pC = WithdrawCategory::where('id',$id)->first();
        if($pC){
            return [
               'code'=>1,
                'model'=>'WithdrawCategory',
                'msg'=> $pC
            ];

        }else{
            return [
                'code'=> 1,
                'msg' => 'Error Occurred Getting Data From The Server'
            ];
        }
    }

    public function getPayoutsWithdrawals($id){
        $pC = PayoutWithdrawal::where('id',$id)->first();
        if($pC){
            return [
               'code'=>1,
                'model'=>'PayoutWithdrawal',
                'msg'=> $pC
            ];

        }else{
            return [
                'code'=> 1,
                'msg' => 'Error Occurred Getting Data From The Server'
            ];
        }
    }
    public function getRequestedLoan($id){
        $pC = LoanRequested::where('id',$id)->first();
        if($pC){
            return [
               'code'=>1,
                'model'=>'LoanRequested',
                'msg'=> $pC
            ];

        }else{
            return [
                'code'=> 1,
                'msg' => 'Error Occurred Getting Data From The Server'
            ];
        }
    }

    public function getLoanWithdrawals($id){
        $pC = LoanWithdrawal::where('id',$id)->first();
        if($pC){
            return [
               'code'=>1,
                'model'=>'LoanWithdrawal',
                'msg'=> $pC
            ];

        }else{
            return [
                'code'=> 1,
                'msg' => 'Error Occurred Getting Data From The Server'
            ];
        }
    }
    public function getpenaltiesCat($id){
        $pC = PenaltyCategory::where('id',$id)->first();
        if($pC){
            return [
               'code'=>1,
                'model'=>'PenaltyCategory',
                'msg'=> $pC
            ];

        }else{
            return [
                'code'=> 1,
                'msg' => 'Error Occurred Getting Data From The Server'
            ];
        }
    }

    public function getPenalties($id){
        $pC = Penalty::where('id',$id)->first();
        if($pC){
            return [
               'code'=>1,
                'model'=>'Penalty',
                'msg'=> $pC
            ];

        }else{
            return [
                'code'=> 1,
                'msg' => 'Error Occurred Getting Data From The Server'
            ];
        }
    }
    public function getMembers($id){
        $pC = Member::where('id',$id)->first();
        if($pC){
            return [
               'code'=>1,
                'model'=>'Member',
                'msg'=> $pC
            ];

        }else{
            return [
                'code'=> 1,
                'msg' => 'Error Occurred Getting Data From The Server'
            ];
        }
    }

    public function getupdateMemberAcc($id){
        $pC = MemberAcc::where('id',$id)->first();
        if($pC){
            return [
               'code'=>1,
                'model'=>'MemberAcc',
                'msg'=> $pC
            ];

        }else{
            return [
                'code'=> 1,
                'msg' => 'Error Occurred Getting Data From The Server'
            ];
        }
    }
    public function getChama($id){
        $pC = Chama::where('id',$id)->first();
        if($pC){
            return [
               'code'=>1,
                'model'=>'Chama',
                'msg'=> $pC
            ];

        }else{
            return [
                'code'=> 1,
                'msg' => 'Error Occurred Getting Data From The Server'
            ];
        }
    }

    public function getupdateChamaAcc($id){
        $pC = ChamaAcc::where('id',$id)->first();
        if($pC){
            return [
               'code'=>1,
                'model'=>'ChamaAcc',
                'msg'=> $pC
            ];

        }else{
            return [
                'code'=> 1,
                'msg' => 'Error Occurred Getting Data From The Server'
            ];
        }
    }
    public function getUserSuggestions($id){
        $pC = Suggestion::where('id',$id)->first();
        if($pC){
            return [
               'code'=>1,
                'model'=>'Suggestion',
                'msg'=> $pC
            ];

        }else{
            return [
                'code'=> 1,
                'msg' => 'Error Occurred Getting Data From The Server'
            ];
        }
    }

    public function getNotifications($id){
        $pC = ChamaNotification::where('id',$id)->first();
        if($pC){
            return [
               'code'=>1,
                'model'=>'ChamaNotification',
                'msg'=> $pC
            ];

        }else{
            return [
                'code'=> 1,
                'msg' => 'Error Occurred Getting Data From The Server'
            ];
        }
    }
}
