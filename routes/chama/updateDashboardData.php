<?php
/**
 * Created by PhpStorm.
 * User: CodeOrg
 * Date: 3/30/2019
 * Time: 1:22 AM
 */

//  contributions
Route::post('/updateContributionsCats', 'admin_updateDataController@contributionsCat')->name('update_contributionsCategory');
Route::post('/updateMiscellaneousContributions', 'admin_updateDataController@updateMiscContributions')->name('update_miscContribution');
Route::post('/updateNormalContributions', 'admin_updateDataController@updateNormalContributions')->name('update_normalContribution');
Route::post('/updatesavingsContributions', 'admin_updateDataController@updateSavingsContributions')->name('update_savingContribution');

//  Withdrawals
Route::post('/updateWithdrawalsCats', 'admin_updateDataController@withdrawalsCat')->name('update_withdrawalsCategory');
Route::post('/updatePayoutWithdrawals', 'admin_updateDataController@updatePayoutsWithdrawals')->name('update_payoutWithdrawal');
Route::post('/updateRequestLoans', 'admin_updateDataController@updateRequestedLoan')->name('update_requestLoan');
Route::post('/updateLoanWithdrawals', 'admin_updateDataController@updateLoanWithdrawals')->name('update_loanWithdrawal');


//  Penalties
Route::post('/updatePenaltiesCats', 'admin_updateDataController@penaltiesCat')->name('update_penaltiesCategory');
Route::post('/updatePenalties', 'admin_updateDataController@updatePenalties')->name('update_penalty');

//    Members
Route::post('/updateMembers', 'admin_updateDataController@updateMembers')->name('update_member');
Route::post('/updateAdmins', 'admin_updateDataController@updateAdmins')->name('update_admin');
Route::post('/updateMemberProfile', 'admin_updateDataController@updateMemberAcc')->name('update_memberAcc');

//    Chama
Route::post('/updateChama', 'admin_updateDataController@updateChama')->name('update_chama');
Route::post('/updateChamaProfile', 'admin_updateDataController@updateChamaAcc')->name('update_chamaAcc');

//    Member Suggestions
Route::post('/updateSuggestions', 'admin_updateDataController@updateUserSuggestions')->name('UserSuggestion');

//    Notifications
Route::post('/updateNotifications', 'admin_updateDataController@updateNotifications')->name('updateNotification');



?>