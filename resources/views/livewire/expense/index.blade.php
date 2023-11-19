<div class="mx-auto max-w-7xl py-4">
    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Listagem de Registros') }}
        </h2>

    </x-slot>

    <x-message/>

    <div class="flex justify-end pt-2 pb-6">
        <x-button-link href="{{ route('expenses.create') }}">Novo Registro</x-button-link>
    </div>

    <x-table>
        <x-table.thead>
            <tr>
                <x-table.th>ID</x-table.th>
                <x-table.th>Descrição</x-table.th>
                <x-table.th>Valor</x-table.th>
                <x-table.th>Tipo</x-table.th>
                <x-table.th>Data</x-table.th>
                <x-table.th></x-table.th>
            </tr>
        </x-table.thead>
        <tbody>
        @forelse ($expenses as $expense)
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <x-table.td>{{ $expense->id }}</x-table.td>
                <x-table.td>{{ $expense->description }}</x-table.td>
                <x-table.td>
                    <span class="{{ $expense->type === 1 ? 'text-green-600' : 'text-red-600' }} font-semibold">
                        R$ {{ number_format($expense->amount, 2, ',', '.') }}
                    </span>
                </x-table.td>
                <x-table.td>{{ $expense->type }}</x-table.td>
                <x-table.td>{{ $expense->created_at->format('d/m/Y H:i') }}</x-table.td>
                <x-table.td class="flex gap-3 justify-end">
                    <x-button-link href="{{ route('expenses.edit', $expense->id) }}">
                        Editar
                    </x-button-link>
                    <x-button wire:click="delete({{ $expense->id }})">Excluir</x-button>
                </x-table.td>
            </tr>
        @empty
            <tr>
                <x-table.td colspan="6" class="text-center text-xl py-6">Nenhum registro encontrado.</x-table.td>
            </tr>
        @endforelse
        <tbody>
    </x-table>

    <div class="mt-4">
        {{ $expenses->links() }}
    </div>

</div>
