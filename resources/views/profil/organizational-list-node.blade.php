<div class="ml-8 border-l-2 border-slate-200 pl-6 mt-4 space-y-4">
    @foreach($children as $child)
        <div class="relative">
            <!-- Connector dot -->
            <div class="absolute -left-[31px] top-6 w-2 h-2 bg-blue-500 rounded-full ring-4 ring-white"></div>
            
            <div class="bg-white p-4 rounded-2xl shadow-sm border border-slate-100 flex items-center gap-4 hover:shadow-md hover:border-blue-100 transition-all duration-300">
                <div class="w-12 h-12 bg-slate-50 border border-slate-100 rounded-xl overflow-hidden shrink-0 flex items-center justify-center text-slate-300">
                    @if($child->avatar)
                        <img src="{{ asset('storage/' . $child->avatar) }}" class="w-full h-full object-cover">
                    @else
                        <svg class="w-6 h-6 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    @endif
                </div>
                <div>
                    <h4 class="font-bold text-slate-900 text-sm leading-snug">{{ $child->name }}</h4>
                    <p class="text-xs text-blue-600 font-semibold">{{ $child->position }}</p>
                    @if($child->nip)
                        <p class="text-[10px] text-slate-400 mt-0.5 font-mono">NIP. {{ $child->nip }}</p>
                    @endif
                    @if($child->specialty)
                        <p class="text-[10px] text-emerald-700 font-semibold mt-1 bg-emerald-50 px-2 py-0.5 rounded-full border border-emerald-100 inline-block">
                            {{ $child->specialty }}
                        </p>
                    @endif
                </div>
            </div>
            
            @if($child->children->isNotEmpty())
                @include('profil.organizational-list-node', ['children' => $child->children])
            @endif
        </div>
    @endforeach
</div>
