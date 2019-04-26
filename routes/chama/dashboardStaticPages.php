<?php

Route::get('/dashboard', 'get_dashboardStaticPages@viewDashboard')->name('dashboard');

//  Users
Route::get('/members', 'get_dashboardStaticPages@viewMembers')->name('chamaMember');
Route::get('/activateMembers', 'get_dashboardStaticPages@viewActiveMembers')->name('activateMembers');
Route::get('/admins', 'get_dashboardStaticPages@viewAdmins')->name('admin');
Route::get('/activateAdmins', 'get_dashboardStaticPages@viewActiveAdmins')->name('activateAdmins');

//  Contributions
Route::get('/contributionCategories', 'get_dashboardStaticPages@viewContributionCategory')->name('contributionCategory');
Route::get('/basicPay', 'get_dashboardStaticPages@viewBasicPay')->name('basicPay');
Route::get('miscalleneous', 'get_dashboardStaticPages@viewMiscs')->name('miscalleneous');
Route::get('savings', 'get_dashboardStaticPages@viewSavings')->name('saving');

//  Withdrawals
Route::get('/withdrawalCategory', 'get_dashboardStaticPages@viewWithdrawalCategory')->name('withdrawalCategory');
Route::get('loans', 'get_dashboardStaticPages@viewLoans')->name('loan');
Route::get('payouts', 'get_dashboardStaticPages@viewPayouts')->name('payout');

Route::get('penalties', 'get_dashboardStaticPages@viewPenalties')->name('chamaaPenalty');

Route::get('loanRequests', 'get_dashboardStaticPages@viewLoanRequests')->name('loanRequest');

Route::get('notifications', 'get_dashboardStaticPages@viewNotifications')->name('chamaaNotification');

Route::get('suggestions', 'get_dashboardStaticPages@viewSuggestions')->name('suggestion');


?>