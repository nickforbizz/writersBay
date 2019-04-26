<?php

Route::get('index', 'adminPagesController@index')->name('index');
Route::get('/logout', 'adminDataController@theLogout')->name('logout');

//  contributions
Route::post('/contributionsCats', 'adminDataController@contributionsCat')->name('contributionsCategory');
Route::post('/miscellaneousContributions', 'adminDataController@createMiscContributions')->name('miscContribution');
Route::post('/normalContributions', 'adminDataController@createNormalContributions')->name('normalContribution');
Route::post('/savingsContributions', 'adminDataController@createSavingsContributions')->name('savingContribution');

//  Withdrawals
Route::post('/withdrawalsCats', 'adminDataController@withdrawalsCat')->name('withdrawalsCategory');
Route::get('/payoutWithdrawals/{id}/{amount}/{member_id}', 'adminDataController@createPayoutsWithdrawals')->name('payoutWithdrawal');
Route::post('/requestLoans', 'adminDataController@createRequestedLoan')->name('requestLoan');
Route::post('/loanWithdrawals', 'adminDataController@createLoanWithdrawals')->name('loanWithdrawal');


//  Penalties
Route::post('/penaltiesCats', 'adminDataController@penaltiesCat')->name('penaltiesCategory');
Route::post('/Penalties', 'adminDataController@createPenalties')->name('memberPenalty');

//    Members
Route::post('/Members', 'adminDataController@createMembers')->name('addMember');
Route::post('/Admins', 'adminDataController@createAdmin')->name('addAdmin');
Route::post('/MemberProfile', 'adminDataController@updateMemberAcc')->name('memberAcc');

//    Chama
Route::post('/Chama', 'adminDataController@createChama')->name('chama');
Route::post('/ChamaProfile', 'adminDataController@updateChamaAcc')->name('chamaAcc');

//    Member Suggestions
Route::post('/suggestions', 'adminDataController@createUserSuggestions')->name('createUserSuggestion');

//    Notifications
Route::post('/Notifications', 'adminDataController@createNotifications')->name('createNotification');



?>