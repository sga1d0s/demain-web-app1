<section class="space-y-4">
  <div class="rounded-2xl bg-white border p-4">
    <h1 class="text-xl font-semibold">Entrar en Demo</h1>
    <p class="text-sm text-zinc-600 mt-1">Acceso simulado. No usa base de datos.</p>

    <form wire:submit.prevent="submit" class="mt-4 space-y-3">
      <div>
        <label class="text-xs text-zinc-600">Email</label>
        <input wire:model="email" class="mt-1 w-full rounded-xl border-zinc-200" type="email">
      </div>
      <div>
        <label class="text-xs text-zinc-600">Password</label>
        <input wire:model="password" class="mt-1 w-full rounded-xl border-zinc-200" type="password">
      </div>
      <button class="w-full h-11 rounded-xl bg-zinc-900 text-white font-medium">Entrar</button>
    </form>
  </div>

  <div class="text-xs text-zinc-500">
    Tip: entra y prueba la navegación: lista → detalle → nueva orden → perfil.
  </div>
</section>