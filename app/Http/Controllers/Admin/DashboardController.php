<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function viewAssgn()
    {
        return view('Admin.assg.viewAssg');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function underReview()
    {
        return view('Admin.assg.underReview');
        # code...
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function uploadAssg()
    {
        return view('Admin.assg.uploadAssg');
    }



    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function paidAssg()
     {
         return view('Admin.assg.paidAssg');
     }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function onProgress()
    {
        return view('Admin.assg.onProgress');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function onRevision()
    {
        return view('Admin.assg.onRevision');
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function viewUsers()
     {
         return view('Admin.users.viewUsers');
     }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editUsers()
    {
        return view('Admin.users.editUsers');
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addAdmins()
    {
        return view('Admin.adminfiles.addAdmins');
    }

    //some return function to a page
    public function viewAdmins()
    {
        return view('Admin.adminfiles.viewAdmins');
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editAdmins()
    {
        return view('Admin.adminfiles.editAdmins');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function roles()
    {
        return view('Admin.roles');
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function categories()
    {
        return view('Admin.categories');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function settings()
    {
        return view('Admin.settings');
    }
}
