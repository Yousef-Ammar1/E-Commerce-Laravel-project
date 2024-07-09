<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin_panel_setting_Request;
use App\Models\Admin;
use App\Models\Admin_panel_setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin_panel_settingController extends Controller
{
    public function index()
    {
        $data = Admin_panel_setting::where('com_code', auth()->user()->com_code)->first();
        if (!empty($data)) {
            if ($data['updated_by'] > 0 and $data['updated_by'] != null) {
                $data['updated_by_admin'] = Admin::where('id', $data['updated_by'])->value('name');
            }
        }

        return view('admin.admin_panel_settings.index', compact('data'));
    }

    public function edit()
    {
        $data = Admin_panel_setting::where('com_code', auth()->user()->com_code)->first();
        return view('admin.admin_panel_settings.edit', compact('data'));

    }

    public function update(Admin_panel_setting_Request $request)
    {
        try {
            // Fetch the existing settings
            $admin_panel_setting = Admin_panel_setting::where('com_code', Auth::user()->com_code)->first();

            // Update the fields directly using the request data
            $updateData = $request->only(['system_name', 'address', 'phone', 'general_alert']);
            $updateData['updated_by'] = Auth::user()->id;
            $updateData['updated_at'] = now();

            // Handle file upload if present
            if ($request->hasFile('photo')) {
                $request->validate([
                    'photo' => 'required|mimes:png,jpg,jpeg|max:2048', // Define the max file size (e.g., 2048 KB)
                ]);
                $the_file_path = uploadImage('assets/admin/uploads', $request->photo);
                $updateData['photo'] = $the_file_path;
                if(file_exists('assets/admin/uploads/'. $admin_panel_setting->photo)){
                    unlink('assets/admin/uploads/'. $admin_panel_setting->photo);
                }
            }

            // Save the updated settings
            $admin_panel_setting->update($updateData);

            return redirect()->route('admin.adminPanelSetting.index')
                ->with(['success' => 'Data has been updated successfully']);

        } catch (\Exception $e) {
            return redirect()->route('admin.adminPanelSetting.index')
                ->with(['error' => 'Sorry, an error happened: ' . $e->getMessage()]);
        }
    }

}
