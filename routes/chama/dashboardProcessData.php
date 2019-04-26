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
Route::post('/payoutWithdrawals', 'adminDataController@createPayoutsWithdrawals')->name('payoutWithdrawal');
Route::post('/requestLoans', 'adminDataController@createRequestedLoan')->name('requestLoan');
Route::post('/loanWithdrawals', 'adminDataController@createLoanWithdrawals')->name('loanWithdrawal');


//  Penalties
Route::post('/penaltiesCats', 'adminDataController@penaltiesCat')->name('penaltiesCategory');
Route::post('/Penalties', 'adminDataController@createPenalties')->name('penalty');

//    Members
Route::post('/Members', 'adminDataController@createMembers')->name('member');
Route::post('/MemberProfile', 'adminDataController@updateMemberAcc')->name('memberAcc');

//    Chama
Route::post('/Chama', 'adminDataController@createChama')->name('chama');
Route::post('/ChamaProfile', 'adminDataController@updateChamaAcc')->name('chamaAcc');

//    Member Suggestions
Route::post('suggestions', 'adminDataController@createUserSuggestions')->name('UserSuggestion');

//    Notifications
Route::post('Notifications', 'adminDataController@createNotifications')->name('notification');



?>