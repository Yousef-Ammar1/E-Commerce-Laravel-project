<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Admin_panel_setting;
use Illuminate\Http\Request;

class Admin_panel_settingController extends Controller
{
    public function index()
    {
        $data = Admin_panel_setting::where('com_code', auth()->user()->com_code)->first();
        if ( ! empty($data))
        {
            if($data['updated_by'] > 0 and $data['updated_by'] != null)
            {
                $data['updated_by_admin'] = Admin::where('id', $data['updated_by'])->value('name');
            }
        }

        return view('admin.admin_panel_settings.index', compact('data'));
    }





}
