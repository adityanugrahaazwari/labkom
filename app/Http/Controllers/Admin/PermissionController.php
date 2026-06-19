<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all()->groupBy('group_name');
        return view('admin.permissions.index', compact('permissions'));
    }

    public function create()
    {
        return view('admin.permissions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:100', 'unique:permissions'],
            'display_name' => ['required', 'string', 'max:100'],
            'group_name' => ['required', 'string', 'max:50'],
        ]);

        Permission::create([
            'name' => $request->name,
            'display_name' => $request->display_name,
            'group_name' => $request->group_name,
        ]);

        return redirect()->route('admin.permissions.index')
            ->with('success', 'Hak akses (Permission) berhasil ditambahkan.');
    }

    public function destroy(Permission $permission)
    {
        // Detach roles associated with this permission
        $permission->roles()->detach();
        // Set null on associated menus
        $permission->menus()->update(['permission_id' => null]);
        $permission->delete();

        return redirect()->route('admin.permissions.index')
            ->with('success', 'Hak akses (Permission) berhasil dihapus.');
    }
}
