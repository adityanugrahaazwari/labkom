<div class="flex flex-col items-center shrink-0">
    <!-- Member Card -->
    <div class="relative bg-white p-6 rounded-2xl shadow-sm border border-slate-100 flex flex-col items-center text-center w-64 hover:shadow-md hover:border-blue-200 transition-all duration-300 z-10">
        <!-- Connecting Line Top (if has parent) -->
        @if($node->parent_id)
            <div class="absolute -top-8 left-1/2 w-0.5 h-8 bg-blue-400 -translate-x-1/2"></div>
        @endif
        
        <!-- Avatar -->
        <div class="w-20 h-20 bg-slate-50 rounded-2xl mb-4 overflow-hidden border border-slate-100 flex items-center justify-center text-slate-300">
            @if($node->avatar)
                <img src="{{ asset('storage/' . $node->avatar) }}" class="w-full h-full object-cover">
            @else
                <svg class="w-10 h-10 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
            @endif
        </div>
        
        <!-- Details -->
        <h4 class="font-bold text-slate-900 text-sm leading-snug truncate w-full" title="{{ $node->name }}">{{ $node->name }}</h4>
        <p class="text-blue-600 text-xs font-semibold mt-1">{{ $node->position }}</p>
        
        @if($node->nip)
            <p class="text-[10px] text-slate-400 mt-1 font-mono">NIP. {{ $node->nip }}</p>
        @endif
        
        @if($node->specialty)
            <p class="text-[10px] text-emerald-700 font-semibold mt-2 bg-emerald-50 px-2.5 py-0.5 rounded-full border border-emerald-100">
                {{ $node->specialty }}
            </p>
        @endif
        
        <!-- Connecting Line Bottom (if has children) -->
        @if($node->children->isNotEmpty())
            <div class="absolute -bottom-8 left-1/2 w-0.5 h-8 bg-blue-400 -translate-x-1/2"></div>
        @endif
    </div>

    <!-- Children Container -->
    @if($node->children->isNotEmpty())
        <div class="relative pt-16 flex gap-10 justify-center">
            <!-- Horizontal Bridge Line linking children -->
            @if($node->children->count() > 1)
                <div class="absolute top-8 left-[128px] right-[128px] h-0.5 bg-blue-400"></div>
            @endif
            
            @foreach($node->children as $child)
                @include('profil.organizational-node', ['node' => $child])
            @endforeach
        </div>
    @endif
</div>
