<section class="space-y-4">
  <div class="rounded-2xl bg-white border p-4 space-y-3">
    <div class="flex gap-2">
      <input wire:model.live="q" placeholder="Buscar (WO-1002, cliente, título)..."
             class="w-full rounded-xl border-zinc-200">
    </div>

    <div class="flex gap-2">
      <button wire:click="$set('status','all')" class="px-3 h-9 rounded-xl text-sm {{ $status==='all'?'bg-zinc-900 text-white':'bg-zinc-100' }}">Todas</button>
      <button wire:click="$set('status','Pendiente')" class="px-3 h-9 rounded-xl text-sm {{ $status==='Pendiente'?'bg-zinc-900 text-white':'bg-zinc-100' }}">Pendiente</button>
      <button wire:click="$set('status','En curso')" class="px-3 h-9 rounded-xl text-sm {{ $status==='En curso'?'bg-zinc-900 text-white':'bg-zinc-100' }}">En curso</button>
      <button wire:click="$set('status','Resuelto')" class="px-3 h-9 rounded-xl text-sm {{ $status==='Resuelto'?'bg-zinc-900 text-white':'bg-zinc-100' }}">Resuelto</button>
    </div>
  </div>

  <div class="space-y-3">
    @foreach($this->orders as $o)
      <a href="{{ route('demo.orders.show', $o['code']) }}"
         class="block rounded-2xl bg-white border p-4">
        <div class="flex items-start justify-between gap-3">
          <div>
            <div class="text-xs text-zinc-500">{{ $o['code'] }} · {{ $o['client'] }}</div>
            <div class="font-semibold">{{ $o['title'] }}</div>
            <div class="text-sm text-zinc-600 mt-1">{{ $o['summary'] }}</div>
          </div>
          <div class="text-right">
            <div class="text-xs px-2 py-1 rounded-full border inline-block
              {{ $o['priority']==='Crítica' ? 'bg-rose-50 border-rose-200 text-rose-700' : '' }}
              {{ $o['priority']==='Alta' ? 'bg-amber-50 border-amber-200 text-amber-700' : '' }}
              {{ $o['priority']==='Media' ? 'bg-zinc-50 border-zinc-200 text-zinc-700' : '' }}
            ">
              {{ $o['priority'] }}
            </div>
            <div class="mt-2 text-xs text-zinc-500">{{ $o['status'] }}</div>
          </div>
        </div>
      </a>
    @endforeach

    @if(empty($this->orders))
      <div class="rounded-2xl bg-white border p-6 text-sm text-zinc-600">
        Sin resultados.
      </div>
    @endif
  </div>
</section>