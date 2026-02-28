<section class="space-y-4">
  <div class="rounded-2xl bg-white border p-4">
    <h1 class="text-xl font-semibold">Perfil</h1>

    <div class="mt-4 space-y-2 text-sm">
      <div class="flex justify-between"><span class="text-zinc-500">Nombre</span><span class="font-medium">{{ $user['name'] }}</span></div>
      <div class="flex justify-between"><span class="text-zinc-500">Email</span><span class="font-medium">{{ $user['email'] }}</span></div>
      <div class="flex justify-between"><span class="text-zinc-500">Rol</span><span class="font-medium">{{ $user['role'] }}</span></div>
    </div>

    <button wire:click="logout" class="mt-5 w-full h-11 rounded-xl bg-zinc-100 border font-medium">
      Salir (demo)
    </button>
  </div>

  <div class="rounded-2xl bg-white border p-4 text-sm text-zinc-600">
    <div class="font-semibold text-zinc-900">Roadmap (para venderlo)</div>
    <ul class="list-disc pl-5 mt-2 space-y-1">
      <li>Clientes + activos + SLA</li>
      <li>Estados configurables + auditoría</li>
      <li>Adjuntos + fotos desde móvil</li>
      <li>Notificaciones (push/email) y asignaciones</li>
    </ul>
  </div>
</section>