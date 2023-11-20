<div class="mx-auto max-w-7xl py-4">
    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Listagem de Registros') }}
        </h2>

    </x-slot>

    <x-message/>

    <div class="flex justify-end pt-2 pb-6">
        <x-button-link href="{{ route('plans.create') }}">Novo Plano</x-button-link>
    </div>

    <x-table>
        <x-table.thead>
            <tr>
                <x-table.th>ID</x-table.th>
                <x-table.th>Nome</x-table.th>
                <x-table.th>Descrição</x-table.th>
                <x-table.th>Valor</x-table.th>
                <x-table.th>Apelido</x-table.th>
                <x-table.th></x-table.th>
            </tr>
        </x-table.thead>
        <tbody>
        @forelse ($plans as $plan)
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <x-table.td>{{ $plan->id }}</x-table.td>
                <x-table.td>{{ $plan->name }}</x-table.td>
                <x-table.td>{{ $plan->description }}</x-table.td>
                <x-table.td>
                        R$ {{ number_format($plan->price, 2, ',', '.') }}
                </x-table.td>
                <x-table.td>{{ $plan->slug }}</x-table.td>
                <x-table.td class="flex gap-3 justify-end">
                    <x-button-link href="{{ route('plans.edit', $plan->id) }}">
                        Editar
                    </x-button-link>
                    <x-button wire:click="delete({{ $plan->id }})">Excluir</x-button>
                </x-table.td>
            </tr>
        @empty
            <tr>
                <x-table.td colspan="6" class="text-center text-xl py-6">Nenhum plano encontrado.</x-table.td>
            </tr>
        @endforelse
        <tbody>
    </x-table>

    <div class="mt-4">
        {{ $plans->links() }}
    </div>

</div>
