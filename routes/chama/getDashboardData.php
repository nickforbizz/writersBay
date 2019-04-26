<?php

//  contributions
Route::get('/contributionsCats/{id}', 'admin_getDataController@getcontributionsCat')->name('getcontributionsCategory');
Route::get('/miscellaneousContributions/{id}', 'admin_getDataController@getMiscContributions')->name('getmiscContribution');
Route::get('/normalContributions/{id}', 'admin_getDataController@getNormalContributions')->name('getnormalContribution');
Route::get('/savingsContributions/{id}', 'admin_getDataController@getSavingsContributions')->name('getsavingContribution');

//  Withdrawals
Route::get('/withdrawalsCats/{id}', 'admin_getDataController@getwithdrawalsCat')->name('getwithdrawalsCategory');
Route::get('/payoutWithdrawals/{id}', 'admin_getDataController@getPayoutsWithdrawals')->name('getpayoutWithdrawal');
Route::get('/requestLoans/{id}', 'admin_getDataController@getRequestedLoan')->name('getrequestLoan');
Route::get('/loanWithdrawals/{id}', 'admin_getDataController@getLoanWithdrawals')->name('getloanWithdrawal');


//  Penalties
Route::get('/penaltiesCats/{id}', 'admin_getDataController@getpenaltiesCat')->name('getpenaltiesCategory');
Route::get('/Penalties/{id}', 'admin_getDataController@getPenalties')->name('getpenalty');

//    Members
Route::get('/Members/{id}', 'admin_getDataController@getMembers')->name('getmember');
Route::get('/MemberProfile/{id}', 'admin_getDataController@getupdateMemberAcc')->name('getmemberAcc');

//    Chama
Route::get('/Chama/{id}', 'admin_getDataController@getChama')->name('getchama');
Route::get('/ChamaProfile/{id}', 'admin_getDataController@getupdateChamaAcc')->name('getchamaAcc');

//    Member Suggestions
Route::get('suggestions/{id}', 'admin_getDataController@getUserSuggestions')->name('getUserSuggestion');

//    Notifications
Route::get('Notifications/{id}', 'admin_getDataController@getNotifications')->name('notification');




?>