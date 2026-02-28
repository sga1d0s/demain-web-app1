<section class="space-y-4">
  <div class="flex items-center justify-between">
    <a href="{{ route('demo.orders') }}" class="text-sm text-zinc-600">← Volver</a>
    <span class="text-xs text-zinc-500">{{ $order['code'] }}</span>
  </div>

  <div class="rounded-2xl bg-white border p-4">
    <div class="text-xs text-zinc-500">{{ $order['client'] }}</div>
    <h1 class="text-xl font-semibold mt-1">{{ $order['title'] }}</h1>

    <div class="mt-3 grid grid-cols-2 gap-3 text-sm">
      <div class="rounded-xl bg-zinc-50 border p-3">
        <div class="text-xs text-zinc-500">Estado</div>
        <div class="font-medium">{{ $order['status'] }}</div>
      </div>
      <div class="rounded-xl bg-zinc-50 border p-3">
        <div class="text-xs text-zinc-500">Prioridad</div>
        <div class="font-medium">{{ $order['priority'] }}</div>
      </div>
      <div class="rounded-xl bg-zinc-50 border p-3">
        <div class="text-xs text-zinc-500">Asignado</div>
        <div class="font-medium">{{ $order['assignee'] }}</div>
      </div>
      <div class="rounded-xl bg-zinc-50 border p-3">
        <div class="text-xs text-zinc-500">Vence</div>
        <div class="font-medium">{{ $order['due_at'] }}</div>
      </div>
    </div>

    <div class="mt-4">
      <div class="text-xs text-zinc-500">Resumen</div>
      <div class="text-sm mt-1 text-zinc-700">{{ $order['summary'] }}</div>
    </div>
  </div>

  <div class="rounded-2xl bg-white border p-4">
    <div class="flex items-center justify-between">
      <div class="font-semibold">Notas</div>
      <button class="text-sm text-zinc-600" disabled>+ Añadir</button>
    </div>

    <div class="mt-3 space-y-3">
      @foreach($order['notes'] as $n)
        <div class="rounded-xl bg-zinc-50 border p-3">
          <div class="text-xs text-zinc-500">{{ $n['at'] }}</div>
          <div class="text-sm mt-1">{{ $n['text'] }}</div>
        </div>
      @endforeach
    </div>
  </div>
</section>