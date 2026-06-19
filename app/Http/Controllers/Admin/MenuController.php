<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Permission;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $headerMenus = Menu::with(['parent', 'permission', 'children'])
            ->whereNull('parent_id')
            ->where('position', 'header')
            ->orderBy('order', 'asc')
            ->get();

        $sidebarMenus = Menu::with(['parent', 'permission', 'children'])
            ->whereNull('parent_id')
            ->where('position', 'sidebar')
            ->orderBy('order', 'asc')
            ->get();

        return view('admin.menus.index', compact('headerMenus', 'sidebarMenus'));
    }

    public function create()
    {
        // For parent options, list items that don't have parents
        $parentOptions = Menu::whereNull('parent_id')->get();
        $permissions = Permission::all();
        return view('admin.menus.create', compact('parentOptions', 'permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'parent_id' => ['nullable', 'exists:menus,id'],
            'url' => ['nullable', 'string', 'max:255'],
            'route_name' => ['nullable', 'string', 'max:100'],
            'icon' => ['nullable', 'string', 'max:50'],
            'order' => ['required', 'integer'],
            'target' => ['required', 'string', 'in:_self,_blank'],
            'position' => ['required', 'string', 'in:header,sidebar'],
            'is_active' => ['boolean'],
            'permission_id' => ['nullable', 'exists:permissions,id'],
        ]);

        Menu::create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'url' => $request->url,
            'route_name' => $request->route_name,
            'icon' => $request->icon,
            'order' => $request->order,
            'target' => $request->target,
            'position' => $request->position,
            'is_active' => $request->has('is_active'),
            'permission_id' => $request->permission_id,
        ]);

        return redirect()->route('admin.menus.index')
            ->with('success', 'Menu berhasil ditambahkan.');
    }

    public function edit(Menu $menu)
    {
        // Prevent setting itself as parent
        $parentOptions = Menu::whereNull('parent_id')
            ->where('id', '!=', $menu->id)
            ->get();
            
        $permissions = Permission::all();
        return view('admin.menus.edit', compact('menu', 'parentOptions', 'permissions'));
    }

    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'parent_id' => ['nullable', 'exists:menus,id', 'different:id'],
            'url' => ['nullable', 'string', 'max:255'],
            'route_name' => ['nullable', 'string', 'max:100'],
            'icon' => ['nullable', 'string', 'max:50'],
            'order' => ['required', 'integer'],
            'target' => ['required', 'string', 'in:_self,_blank'],
            'position' => ['required', 'string', 'in:header,sidebar'],
            'is_active' => ['boolean'],
            'permission_id' => ['nullable', 'exists:permissions,id'],
        ]);

        $menu->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'url' => $request->url,
            'route_name' => $request->route_name,
            'icon' => $request->icon,
            'order' => $request->order,
            'target' => $request->target,
            'position' => $request->position,
            'is_active' => $request->has('is_active'),
            'permission_id' => $request->permission_id,
        ]);

        return redirect()->route('admin.menus.index')
            ->with('success', 'Menu berhasil diperbarui.');
    }

    public function destroy(Menu $menu)
    {
        $menu->delete(); // On delete cascade is configured in migrations for child menu parent_id

        return redirect()->route('admin.menus.index')
            ->with('success', 'Menu berhasil dihapus.');
    }
}
