<?php

use App\Http\Controllers\LeaveController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'VisitorController@landing')->name('landing');


Route::get('/member/registration', 'VisitorController@memberreg')->name('member.registration');

Route::post('/member/registration/post', 'VisitorController@memberregpost')->name('member.post');
Route::post('/member/login/post', 'VisitorController@memberlogpost')->name('member.logpost');
Route::get('/member/login', 'VisitorController@memberlog')->name('member.log');




Route::get('/admin/registration', 'VisitorController@adminreg')->name('admin.registration');

Route::post('/admin/registration/post', 'VisitorController@adminregpost')->name('admin.regpost');

Route::post('/admin/login/post', 'VisitorController@adminlogpost')->name('admin.logpost');
Route::get('/admin/login', 'VisitorController@adminlog')->name('admin.log');


Route::middleware('auth.member')->group(function () {
    Route::get('/memberleaverequest', 'LeaveController@index')->name('leaverequest');
    Route::post('/memberleaverequest', 'LeaveController@store')->name('leaverequest');

     Route::get('/recordattendance', 'AttendanceController@index')->name('attendancerecord');
     Route::post('/recordattendance', 'AttendanceController@store')->name('attendancerecord');

    Route::get('/memberdash', 'VisitorController@member')->name('memberdash');
     Route::get('/announce', 'AnnouncementController@displayAnnouncements')->name('display.announcements');

    Route::get('/channels', 'VisitorController@channels')->name('channels');
    Route::get('/contributions', 'VisitorController@contributions')->name('contributions');
    Route::post('/update/team', 'VisitorController@updateteam')->name('updateteam');
    Route::get('/team', 'MemberController@team')->name('team');
    Route::get('/contact-support', 'VisitorController@contact-support')->name('contact-support');
    Route::get('/memberprofile', 'MemberController@read')->name('profile');
    Route::post('/attendance/store', 'AttendanceController@store')->name('attendance.store');
    Route::get('/attendance/index', 'AttendanceController@index')->name('attendance.index');

});


// leader section


Route::get('/leader/reg', 'VisitorController@leaderreg')->name('leaderreg');
Route::post('/leader/reg/post', 'VisitorController@leaderregpost')->name('leaderregpost');


Route::get('/leader/login', 'VisitorController@leaderlogin')->name('leaderlogin');
Route::post('/leader/login/post', 'VisitorController@leaderloginpost')->name('leaderloginpost');




Route::group(['middleware' => ['auth.leader']], function () {

    Route::post('/announcement/post', 'AnnouncementController@store')->name('announcement.post');


    Route::get('/announcements', 'AnnouncementController@index')->name('announcements');
    Route::get('/announcement', 'VisitorController@announcement')->name('announcement');

    Route::get('/editannouncement', 'VisitorController@editannouncement')->name('editannouncement');
    // Route for deleting announcement
    Route::delete('/announcements/{announcement}', 'AnnouncementController@destroy')->name('delete-announcements');


    Route::post('/meeting/post', 'MeetingController@store')->name('meeting.post');
    Route::delete('/meeting/{meeting}', 'meetingController@destroy')->name('delete-meeting');
    Route::get('/newmeeting', 'MeetingController@newmeeting')->name('newmeeting');
    Route::get('/viewmeeting', 'MeetingController@viewmeeting')->name('viewmeeting');



    Route::get('/leaderdash', 'AdminsController@index')->name('leaderdash');

    Route::get('/addmember', 'AdminsController@addmember')->name('addmember');

    Route::get('/editmember', 'AdminsController@user')->name('editmember');

    Route::get('/addadmin', 'VisitorController@addadmin')->name('addadmin');

    Route::get('/acceptleave', 'VisitorController@acceptleave')->name('acceptleave');

    Route::get('/managemember', 'VisitorController@managemember')->name('managemember');

    Route::get('/approve/{id}', 'VisitorController@approvemember')->name('approved');

    Route::get('/remove/{id}', 'VisitorController@removemember')->name('removemember');

    Route::get('/meeting', 'MeetingController@index')->name('meeting');

    // Route::get('/membersmanage', 'VisitorController@membersmanage')->name('membersmanage');

    Route::get('/memberleave', 'VisitorController@memberleave')->name('memberleave');

    Route::post('/leave/{id}/accept', [LeaveController::class, 'accept'])->name('leave.accept');
    Route::post('/leave/{id}/reject', [LeaveController::class, 'reject'])->name('leave.reject');

    Route::get('/adminlog', 'VisitorController@adminlog')->name('adminlog');

    Route::get('/edit', 'VisitorController@edit')->name('edit');




    Route::get('/profile', 'AdminsController@read')->name('leaderprofile');
});






Route::get('/about', function () {
    return view('about');
});
Route::get('/events', 'VisitorController@events')->name('events');


Route::get('/gallery', function () {
    return view('gallery');
});
Route::get('/sermons', function () {
    return view('sermons');
});
Route::get('/ministries', function () {
    return view('ministries');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/departments', function () {
    return view('departments');
});
Route::get('/services', function () {
    return view('services');
});



// Route::group(['middleware' => ['auth.leader']], function () {

//     Route::get('/leaderdash', 'VisitorController@leaderdash')->name('leaderdash');

// });


Route::get('/setup/user', 'VisitorController@setupUser')->name('setupUser');
Route::post('/setup/user', 'VisitorController@register')->name('visitor.register');
Route::post('/setup/logo', 'VisitorController@uploadLogo')->name('app.logo');
Route::post('/setup/name', 'VisitorController@saveAppName')->name('app.name');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login')->name('login');

// Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');




Route::group(['middleware' => ['auth.admin']], function () {



    Route::get('/dashboard', 'HomeController@index')->name('dashboard');
    Route::get('/member/register', 'MemberController@create')->name('member.register.form');
    Route::post('/member/register', 'MemberController@store')->name('member.register');
    Route::get('/members/all', 'MemberController@index')->name('members.all');

    // Route for editing a member
    Route::get('/edit-member/{member}', 'MemberController@edit')->name('edit-member');

    Route::put('/members/{member}', 'MemberController@update')->name('update-member');


    // Route for deleting a member
    Route::delete('/members/{member}', 'MemberController@destroy')->name('delete-member');

    Route::get('/member/profile/{id}', 'MemberController@show')->name('member.profile');
    Route::get('/member/edit/{id}', 'MemberController@modify')->name('member.edit');
    Route::post('/member/delete/{id}', 'MemberController@destroy')->name('member.delete');
    Route::post('/member/delete', 'MemberController@delete')->name('member.delete.multi');
    Route::post('/member/upgrade', 'MemberController@upgrade')->name('member.upgrade');
    Route::post('/member/upload/img', 'MemberController@uploadImg')->name('member.upload.img');
    Route::post('/member/update', 'MemberController@updateMember')->name('member.update');
    Route::get('/member/analysis', 'MemberController@memberAnalysis')->name('member.analysis');
    Route::get('/member/stats', 'MemberController@memberRegStats')->name('member.reg.stats');
    Route::get('/member/attendance/{id}', 'MemberController@attendance')->name('member.attendance');
    //teams
    Route::get('/team/create', 'ChurchTeamsController@create')->name('teams.create');
    Route::get('/teams', 'ChurchTeamsController@index')->name('teams');
    Route::post('/teams/post', 'ChurchTeamsController@store')->name('teams.store');


    // Route for editing a member
    Route::get('/edit-team/{team}', 'ChurchTeamsController@edit')->name('edit-team');

    Route::put('/teams/{team}', 'ChurchTeamsController@update')->name('update-team');

    // Route for deleting a member
    Route::delete('/teams/{team}', 'ChurchTeamsController@destroy')->name('delete-team');

    //leaders
    Route::get('/leaders/register', 'LeadersController@create')->name('leaders.register');
    Route::post('/leaders/register', 'LeadersController@store')->name('leaders.register.post');

    Route::get('/leaders', 'LeadersController@index')->name('leaders');

    // Route for editing a member
    Route::get('/edit-leader/{leader}', 'LeadersController@edit')->name('edit-leader');

    Route::put('/leaders/{leader}', 'LeadersController@update')->name('update-leader');

    // Route for deleting a leader
    Route::delete('/leaders/{leader}', 'LeadersController@destroy')->name('delete.leader');




    Route::get('/announcements/create', 'AnnouncementController@create')->name('announcements.create');
    Route::get('/announcements', 'AnnouncementController@index')->name('announcements.index');
    Route::post('/announcements/post', 'AnnouncementController@save')->name('announcements.save');

    // Route for deleting announcement
    Route::delete('/announcements/{announcement}', 'AnnouncementController@admindestroy')->name('delete-announcement');




    Route::get('/branches', 'BranchController@index')->name('branches');
    Route::get('/branches/{id}/destroy', 'BranchController@destroy')->name('branch.destroy');
    Route::get('/branches/register', 'BranchController@registerForm')->name('branch.register.form');
    Route::post('/branches/register', 'BranchController@register')->name('branch.register');
    Route::post('/branches/update', 'BranchController@updateBranch')->name('branch.update');
    Route::post('/branches/delete', 'BranchController@delete')->name('branch.delete.multi');
    Route::get('/branch/invoice', 'BranchController@invoice')->name('branch.invoice');
    // depre
    Route::get('/old/branches/head_office_options', 'BranchController@ho')->name('branch.ho');
    Route::post('/old/branches/head_office_options', 'BranchController@ho_up')->name('branch.ho.up');
    // depre

    Route::get('/attendance', 'AttendanceController@mark')->name('attendance');
    Route::post('/attendance/mark', 'AttendanceController@mark_it')->name('attendance.mark');
    // Route::post('/attendance', 'AttendanceController@store')->name('attendance.selectDate');
    Route::post('/attendance/submit', 'AttendanceController@store')->name('attendance.submit');
    //Route::post('/attendance/mark/submit', 'AttendanceController@store')->name('attendance.mark.submit');
    Route::get('/attendance/analysis', 'AttendanceController@analysis')->name('attendance.analysis');
    Route::get('/attendance/view', 'AttendanceController@view')->name('attendance.view.form');
    //function () {        return view('attendance.view');});
    Route::post('/attendance/view', 'AttendanceController@show')->name('attendance.view');
    Route::get('/attendance/view/{date}', 'AttendanceController@show')->name('attendance.view.custom');
    Route::get('/attendance/stats', 'AttendanceController@attendanceStats')->name('attendance.stats');

    // collection
    Route::get('/collection/offering', 'CollectionController@index')->name('collection.offering');
    Route::post('/collection/save', 'CollectionController@store')->name('collection.save');
    Route::post('/collection/member', 'CollectionController@member')->name('collection.save.member');
    Route::get('/collection/report', 'CollectionController@report')->name('collection.report');
    Route::get('/collection/analysis', 'CollectionController@analysis')->name('collection.analysis');
    Route::get('/collection/history', 'CollectionController@history')->name('collection.history');
    Route::get('/collection/stats', 'CollectionController@collectionStats')->name('collection.stats');

    // events
    Route::get('/calendar', 'EventController@index')->name('calendar');

    Route::get('/events/all', 'EventController@showevents')->name('events.all');
    Route::get('/events/create', 'EventController@create')->name('events.create');
    Route::post('/events/store', 'EventController@store')->name('events.store');

    //sermons

    Route::get('/sermons', 'SermonsController@index')->name('sermons');
    Route::get('/sermons/create', 'SermonsController@create')->name('sermons.create');
    Route::post('/sermons/store', 'SermonsController@store')->name('sermons.store');

    // Route::post('/calendar', 'EventController@store')->name('calendar.update');
    // Route::get('/calendar/{id}/delete', 'EventController@destroy')->name('calendar.delete');
    // Route::get('/get-relative/{search_term}', 'MemberController@getRelative')->name('relative');

    Route::get('/gallery', 'HomeController@gallery')->name('gallery');

    Route::get('/groups', 'GroupController@index')->name('groups');
    Route::post('/group/create', 'GroupController@store')->name('group.create');
    Route::post('group/members', 'GroupController@members')->name('group.members');
    Route::get('group/default/{name}', 'GroupController@defaultView')->name('group.default.view');
    Route::get('/group/{id}', 'GroupController@show')->name('group.view');
    Route::post('group/{id}/add', 'GroupController@add_member')->name('group.add.member');
    Route::get('group/{id}/delete', 'GroupController@destroy')->name('group.delete');
    Route::get('group/{id}/{group_id}/remove', 'GroupController@remove_member')->name('group.remove.member');


    Route::get('/messaging/email', 'MessagingController@indexEmail')->name('email');
    Route::get('/messaging/sms', 'MessagingController@indexSMS')->name('sms');
    Route::post('/messaging/email/send', 'MessagingController@sendEmail')->name('sendMail');
    Route::post('/messaging/sms/send', 'MessagingController@sendSMS')->name('sendSMS');
    Route::get('/inbox', 'MessagingController@inbox')->name('inbox');
    Route::post('/inbox/message/send', 'MessagingController@sendMessage')->name('sendMessage');
    Route::get('/inbox/conversation/{from?}/{to?}', 'MessagingController@getMsg')->name('conversation');
    Route::post('/inbox/reply', 'MessagingController@reply')->name('reply');
    Route::get('/inbox/inbox', 'MessagingController@get_inbox')->name('inbox.inbox');
    Route::get('/inbox/users', 'MessagingController@get_users')->name('inbox.users');
    Route::get('/inbox/demo', 'MessagingController@demo')->name('inbox.demo');

    Route::get('/report/membership', 'ReportController@membership')->name('report.membership');
    Route::get('/report/membership/all', 'ReportController@allMembership')->name('report.membership.all');
    Route::get('/report/collections', 'ReportController@collections')->name('report.collections');
    Route::get('/report/collections/all', 'ReportController@allCollections')->name('report.collections.all');
    Route::get('/report/attendance', 'ReportController@attendance')->name('report.attendance');
    Route::get('/report/attendance/all', 'ReportController@allAttendance')->name('report.attendance.all');
    //New route from kenny
    Route::get('/notification', 'EventController@news')->name('notification');
    Route::post('/readmore', 'EventController@readmore')->name('readmore');
    Route::post('/notification/announcement', 'EventController@add')->name('calendar.announcement');
    Route::get('/ticket', 'MessagingController@indexticket')->name('ticket');
    Route::post('/ticket/email/ticket', 'MessagingController@sendTicket')->name('sendTicket');

    // OPTIONS
    Route::get('/options/get', 'OptionController@getOption')->name('option.get');
    Route::get('/options/branch/get', 'OptionController@getBranchOption')->name('option.branch.get');
    Route::post('/options/branch/put', 'OptionController@putBranchOption')->name('option.branch.post');
    Route::get('/branches/options', 'BranchController@options')->name('branch.options');
    Route::post('/branches/options', 'OptionController@optionsPost')->name('branch.optionsPost');
    Route::get('/branches/unsettled', 'OptionController@getUnsettled')->name('branch.unsettled');
    // TOOLS
    Route::get('/branches/tools', 'BranchController@tools')->name('branch.tools');
    Route::post('/branches/tools', 'OptionController@toolsPost')->name('branch.toolsPost');
    Route::get('/branches/tools/collection-type', 'OptionController@collectionTypeGet')->name('collection.type');
    Route::get('/branches/tools/service-type', 'OptionController@serviceTypeGet')->name('service.type');
    Route::post('/branches/tools/collection-type/delete', 'OptionController@deletecollectionType')->name('delete.collection.type');
    Route::post('/branches/tools/service-type/delete', 'OptionController@deleteServiceType')->name('delete.service.type');
    Route::post('/branches/tools/service-type/update', 'OptionController@updateServiceType')->name('update.service.type');
    Route::post('/branches/tools/collection-type/update', 'OptionController@updateCollectionType')->name('update.collection.type');
    // Route::post('/branches/tools', 'OptionController@toolsPost')->name('branch.toolsPost');
    // PAYMENT
    Route::resource('/payments', 'PaymentController');
    Route::post('/pay', 'PaymentController@redirectToGateway')->name('pay');
    Route::get('/payment/callback', 'PaymentController@handleGatewayCallback');
    Route::get('/payment/status', 'PaymentController@status');

    // test
    Route::get('/currencies/get', 'OptionController@getCurrencies')->name('option.currencies');
    Route::get('/countries/get', 'OptionController@getCountries')->name('option.countries');
    Route::get('apis', 'CollectionController@test')->name('apis');

    Route::get('/get/banks', 'OptionController@banks')->name('banks');

    // MAIL TEMPLATE PREVIEW SECTION
    Route::get('mailable/email-to-member', 'MemberController@testMail')->name('testMail');

    // MAP
    Route::get('/map', 'MapController@index')->name('map');
});

Route::get('/admin/login', function () {
    return view('auth.login');
});

//shared server clear cache
Route::get('/clear-cache', function () {
    return Artisan::call('cache:clear');
    // return what you want
});

// migrate db
Route::get('/db/migrate', function () {
    return Artisan::call('migrate');
});

Route::get('/db/migrate/fresh', function () {
    return Artisan::call('migrate:fresh');
});


//Route::get('/registerr', function () {
//return view('auth.register');
//});
Route::get('/recover', 'Auth\RecoverPasswordController@index')->name('recover');

use Faker\Generator as Faker;

Route::get('/test', function () {
})->name('test');

Route::get('/users', 'BranchController@users')->name('users');


Route::post('/recover', 'Auth\RecoverPasswordController@recover');
// Route::get('/password/reset/{token}', 'Auth\RecoverPasswordController@reset')->name('password.reset');
// Route::post('/password/reset/{token}', 'Auth\RecoverPasswordController@reset')->name('password.reset');
Route::post('/recover/{selector}/{token}', 'Auth\RecoverPasswordController@reset')->name('recover.reset');
