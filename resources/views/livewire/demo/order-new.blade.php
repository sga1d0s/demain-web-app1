<section class="space-y-4">
  <div class="rounded-2xl bg-white border p-4">
    <h1 class="text-xl font-semibold">Nueva orden</h1>
    <p class="text-sm text-zinc-600 mt-1">Formulario demo (no persiste).</p>

    <form wire:submit.prevent="submit" class="mt-4 space-y-3">
      <div>
        <label class="text-xs text-zinc-600">Cliente</label>
        <input wire:model="client" class="mt-1 w-full rounded-xl border-zinc-200">
      </div>

      <div>
        <label class="text-xs text-zinc-600">Título</label>
        <input wire:model="title" class="mt-1 w-full rounded-xl border-zinc-200" placeholder="Ej: Cambiar switch en rack...">
      </div>

      <div>
        <label class="text-xs text-zinc-600">Prioridad</label>
        <select wire:model="priority" class="mt-1 w-full rounded-xl border-zinc-200">
          <option>Media</option>
          <option>Alta</option>
          <option>Crítica</option>
        </select>
      </div>

      <div>
        <label class="text-xs text-zinc-600">Resumen</label>
        <textarea wire:model="summary" rows="3" class="mt-1 w-full rounded-xl border-zinc-200"
          placeholder="Describe el trabajo..."></textarea>
      </div>

      <button class="w-full h-11 rounded-xl bg-zinc-900 text-white font-medium">
        Crear (demo)
      </button>
    </form>
  </div>
</section>