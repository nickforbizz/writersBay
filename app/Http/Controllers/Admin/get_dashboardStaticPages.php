<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class get_dashboardStaticPages extends Controller
{
    public function viewDashboard(){
        return view('Admin.index');
    }
    public function viewMembers(){

        return view('Admin.users.members');
    }
    public function viewActiveMembers(){

        return view('Admin.users.activate_members');
    }
    public function viewAdmins(){

        return view('Admin.users.admins');
    }
    public function viewActiveAdmins(){

        return view('Admin.users.activate_admins');
    }

    public function viewContributionCategory(){

        return view('Admin.contributions.c_category');
    }
    public function viewBasicPay(){

        return view('Admin.contributions.basicPay');
    }
    public function viewMiscs(){

        return view('Admin.contributions.miscs');
    }
    public function viewSavings(){

        return view('Admin.contributions.savings');
    }

    public function viewWithdrawalCategory(){

        return view('Admin.withdrawals.w_category');
    }
    public function viewLoans(){

        return view('Admin.withdrawals.loan');
    }
    public function viewPayouts(){

        return view('Admin.withdrawals.payOuts');
    }
    public function viewPenalties(){

        return view('Admin.penalties');
    }
    public function viewAssgPenalties(){

        return view('Admin.assignPenalties');
    }
    public function viewLoanRequests(){

        return view('Admin.loanRequested');
    }
    public function viewNotifications(){

        return view('Admin.notifications');
    }
    public function viewSuggestions(){
        return view('Admin.suggestions');
    }
}
