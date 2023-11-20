<div class="py-4 mx-auto max-w-7xl">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Atualizar Registro') }}
        </h2>
    </x-slot>

    <x-message/>

    <x-form-section submit="update">
        <x-slot name="title">Atualizar Registro</x-slot>
        <x-slot name="description">Preencha os campos para atualizar o registro.</x-slot>

        <x-slot name="form">
            <div class="col-span-6 sm:col-span-4">
                <x-label for="description">Descrição</x-label>
                <x-input wire:model="description" type="text" class="w-full"/>
                <x-input-error for="description"/>
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-label for="amount">Valor</x-label>
                <x-input wire:model.live="amount" type="text" class="w-full"/>
                <x-input-error for="amount"/>
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-label for="type">Tipo</x-label>
                <x-select wire:model="type" class="w-full">
                    <option value="">Selecione</option>
                    <option value="1">Entrada</option>
                    <option value="2">Saída</option>
                </x-select>
                <x-input-error for="type"/>
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-label for="photo">Foto comprovante</x-label>
                <x-input wire:model="photo" type="file" class="w-full"/>
                <x-input-error for="photo" />

                <img class="rounded-lg max-w-xs mt-4" src="{{ route('expenses.photo', $expense->id) }}" alt="{{ $expense->name }}"/>
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-label for="expense_date">Data</x-label>
                <x-input wire:model="expenseDate" type="datetime-local" class="w-full"/>
            </div>
        </x-slot>

        <x-slot name="actions">
            <x-button>Atualizar</x-button>
        </x-slot>
    </x-form-section>


</div>
