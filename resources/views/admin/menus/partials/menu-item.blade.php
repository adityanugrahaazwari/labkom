<div class="space-y-2 border border-slate-100 rounded-xl p-3 hover:bg-slate-50/50 transition">
    <div class="flex items-center justify-between gap-4">
        <div class="flex items-center gap-3">
            @if($menu->icon)
                <span class="w-7 h-7 bg-slate-100 rounded-lg flex items-center justify-center text-slate-500 font-mono text-xs" title="Icon: {{ $menu->icon }}">
                    {{ substr($menu->icon, 0, 2) }}
                </span>
            @endif
            <div>
                <div class="flex items-center gap-2">
                    <span class="text-sm font-semibold text-slate-900">{{ $menu->name }}</span>
                    <span class="text-[10px] bg-slate-100 px-1.5 py-0.5 rounded text-slate-500 font-mono">Order: {{ $menu->order }}</span>
                    @if(!$menu->is_active)
                        <span class="text-[10px] bg-amber-50 text-amber-700 px-1.5 py-0.5 rounded border border-amber-100">Draft</span>
                    @endif
                </div>
                <div class="flex items-center gap-2 mt-1">
                    <span class="text-xs text-slate-400 truncate max-w-xs">{{ $menu->url ?: ($menu->route_name ?: '#') }}</span>
                    @if($menu->permission)
                        <span class="text-[9px] bg-rose-50 text-rose-700 border border-rose-100 px-1.5 rounded" title="Dibatasi oleh permission: {{ $menu->permission->name }}">
                            {{ $menu->permission->display_name }}
                        </span>
                    @endif
                </div>
            </div>
        </div>

        <div class="flex items-center gap-1 shrink-0">
            <a href="{{ route('admin.menus.edit', $menu->id) }}" class="p-1.5 hover:bg-slate-100 rounded text-slate-500 hover:text-blue-600 transition">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
            </a>
            <form action="{{ route('admin.menus.destroy', $menu->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus menu ini beserta seluruh sub-menunya?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="p-1.5 hover:bg-slate-100 rounded text-slate-500 hover:text-red-600 transition">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                </button>
            </form>
        </div>
    </div>

    <!-- Render Children Submenus -->
    @if($menu->children->isNotEmpty())
        <div class="ml-8 pl-4 border-l border-slate-100 space-y-2 mt-2">
            @foreach($menu->children as $child)
                <div class="flex items-center justify-between gap-4 p-2 bg-slate-50/50 rounded-lg hover:bg-slate-50 transition border border-slate-100/50">
                    <div>
                        <div class="flex items-center gap-1.5">
                            <span class="text-xs font-medium text-slate-800">{{ $child->name }}</span>
                            <span class="text-[9px] text-slate-400 font-mono">Order: {{ $child->order }}</span>
                            @if(!$child->is_active)
                                <span class="text-[9px] bg-amber-50 text-amber-600 px-1 rounded border border-amber-100">Draft</span>
                            @endif
                        </div>
                        <div class="flex items-center gap-1.5 mt-0.5">
                            <span class="text-[10px] text-slate-400 font-mono">{{ $child->url ?: ($child->route_name ?: '#') }}</span>
                            @if($child->permission)
                                <span class="text-[8px] bg-rose-50 text-rose-600 border border-rose-100 px-1 rounded">
                                    {{ $child->permission->display_name }}
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="flex items-center gap-1 shrink-0">
                        <a href="{{ route('admin.menus.edit', $child->id) }}" class="p-1 hover:bg-slate-200/50 rounded text-slate-500 hover:text-blue-600 transition">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                        </a>
                        <form action="{{ route('admin.menus.destroy', $child->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus submenu ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="p-1 hover:bg-slate-200/50 rounded text-slate-500 hover:text-red-600 transition">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
