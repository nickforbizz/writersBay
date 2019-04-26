<?php
/**
 * Created by PhpStorm.
 * User: CodeOrg
 * Date: 3/30/2019
 * Time: 1:20 AM
 */





Route::get('/edit_member/{id}', function ($id){
    return view('Admin.users.edit_member', compact('id'));
})->name('editMember');


Route::get('/edit_admin/{id}', function ($id){
    return view('Admin.users.edit_admin', compact('id'));
})->name('editAdmin');


Route::get('/deactivate_member/{id}', function ($id){
    $d = \App\Models\Member::where('id', $id)->update([ 'active'=>0 ]);
    if ($d){
        return back()->with(['status', 'Member Deactivated']);
    }
})->name('deactivateMember');


Route::get('/activate_member/{id}', function ($id){
    $d = \App\Models\Member::where('id', $id)->update([ 'active'=>1 ]);
    if ($d){
        return back()->with(['status', 'Member Deactivated']);
    }
})->name('activateMember');


Route::get('/deactivate_admin/{id}', function ($id){
    $d = \App\Models\Admin::where('id', $id)->update([ 'active'=>0 ]);
    if ($d){
        return back()->with(['status', 'Admin Deactivated']);
    }
})->name('deactivateAdmin');


Route::get('/activate_admin/{id}', function ($id){
    $d = \App\Models\Admin::where('id', $id)->update([ 'active'=>1 ]);
    if ($d){
        return back()->with(['status', 'Admin Deactivated']);
    }
})->name('activateAdmin');



Route::get('/deactivateWcateg/{id}', function ($id){
    $d = \App\Models\WithdrawCategory::where('id', $id)->update([ 'active'=>0 ]);
    if ($d){
        return back()->with(['status', 'WithdrawCategory Deactivated']);
    }
})->name('deactivateWcateg');


Route::get('/deactivateCcateg/{id}', function ($id){
    $d = \App\Models\ContributionCategory::where('id', $id)->update([ 'active'=>0 ]);
    if ($d){
        return back()->with(['status', 'ContributionCategory Deactivated']);
    }
})->name('deactivateCcateg');


Route::get('/deactivatePenalty/{id}', function ($id){
    $d = \App\Models\PenaltyCategory::where('id', $id)->update([ 'active'=>0 ]);
    if ($d){
        return back()->with(['status', 'PenaltyCategory Deactivated']);
    }
})->name('deactivatePenalty');

Route::get('/deactivateNotification/{id}', function ($id){
    $d = \App\Models\ChamaNotification::where('id', $id)->update([ 'active'=>0 ]);
    if ($d){
        return back()->with(['status', 'ChamaNotification Deactivated']);
    }
})->name('deactivateNotification');

Route::get('/memberToAdmin/{id}', function ($id){
    $d = \App\Models\Member::where('id', $id)->first();
    $user_id = $d->user->id;

    $createAdmin = \App\Models\Admin::create([
        'user_id'=>$user_id,
        'active' =>1
    ]);

    if ($createAdmin){
        return back()->with(['status', 'Admin Created']);
    }
})->name('memberToAdmin');




?>