<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Profile;
use Illuminate\Http\Request;

class PermissionProfileController extends Controller
{

    private $profile, $permission;

    public function __construct(Profile $profile, Permission $permission)
    {
        $this->profile = $profile;
        $this->permission = $permission;
    }    

    public function permissions($idProfile)
    {
        $profile = $this->profile->find($idProfile);

        if(!$profile) { 
            redirect()->back();
        }

        $permissions = $profile->permissions()->paginate();

        return view('admin.pages.profiles.permissions', compact('profile', 'permissions'));

    }

    public function permissionsAvailable($idProfile)
    {
        $profile = $this->profile->find($idProfile);

        if(!$profile) { 
            redirect()->back();
        }

        $permissions = $this->permission->all();

        return view('admin.pages.profiles.permissions', compact('profile', 'permissions'));

    }    
}
