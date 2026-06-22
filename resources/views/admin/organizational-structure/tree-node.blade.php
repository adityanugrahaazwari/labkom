<div class="ml-8 border-l-2 border-slate-200 pl-6 mt-4 space-y-4">
    @foreach($children as $child)
        <div class="relative">
            <!-- Connecting line dot/bracket -->
            <div class="absolute -left-[33px] top-6 w-4 h-0.5 bg-slate-200"></div>
            <div class="absolute -left-[33px] top-[18px] w-2 h-2 bg-blue-500 rounded-full ring-4 ring-white"></div>
            
            <div class="bg-white p-4 border border-slate-200 rounded-xl flex items-center justify-between shadow-sm hover:shadow-md transition">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-slate-50 rounded-lg overflow-hidden shrink-0 flex items-center justify-center text-slate-400 border border-slate-200">
                        @if($child->avatar)
                            <img src="{{ asset('storage/' . $child->avatar) }}" class="w-full h-full object-cover">
                        @else
                            <svg class="w-6 h-6 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        @endif
                    </div>
                    <div>
                        <h4 class="font-bold text-slate-900 text-sm">{{ $child->name }}</h4>
                        <p class="text-xs text-blue-600 font-medium">{{ $child->position }}</p>
                        @if($child->nip)
                            <p class="text-[10px] text-slate-500 mt-0.5 font-mono">NIP. {{ $child->nip }}</p>
                        @endif
                        @if($child->specialty)
                            <p class="text-[10px] text-emerald-600 font-medium mt-0.5">{{ $child->specialty }}</p>
                        @endif
                    </div>
                </div>
                
                <div class="flex items-center gap-2">
                    <span class="text-xs font-semibold px-2 py-0.5 bg-slate-100 text-slate-600 rounded">Urutan: {{ $child->order }}</span>
                    <a href="{{ route('admin.organizational-structure.edit', $child) }}" class="p-1.5 text-blue-600 hover:bg-blue-50 rounded-lg transition" title="Edit Anggota">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                    </a>
                    <form action="{{ route('admin.organizational-structure.destroy', $child) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus anggota ini? Anggota di bawahnya akan diset tanpa atasan.')" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="p-1.5 text-rose-600 hover:bg-rose-50 rounded-lg transition" title="Hapus Anggota">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        </button>
                    </form>
                </div>
            </div>
            
            @if($child->children->isNotEmpty())
                @include('admin.organizational-structure.tree-node', ['children' => $child->children])
            @endif
        </div>
    @endforeach
</div>
