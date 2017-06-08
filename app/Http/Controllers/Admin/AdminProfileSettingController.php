<?php

namespace App\Http\Controllers\Admin;


use App\Classes\Reply;
use App\Http\Controllers\AdminBaseController;
use App\Admin;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\AdminUpdateRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
class AdminProfileSettingController extends AdminBaseController
{
    public function __construct() {
        parent::__construct();
        $this->pageTitle = '';
    }
    public function edit($id) {
        $this->admin  = Admin::find($id);
        return \View::make('profile.edit', $this->data);
    }
    public function update(AdminUpdateRequest $request,$id) {
        $admin = Admin::find($id);
        $admin->name     = $request->get('name');
        $admin->email    = $request->get('email');
        if($request->password){
            $admin->password = Hash::make($request->password);
        }
        $admin->save();
        return Reply::success('Updated Successfully');
    }
}