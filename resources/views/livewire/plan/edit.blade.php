<div class="py-4 mx-auto max-w-7xl">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Plano') }}
        </h2>
    </x-slot>

    <x-message/>

    <x-form-section submit="update">
        <x-slot name="title">Editar Plano</x-slot>
        <x-slot name="description">Preencha os campos para editar o plano.</x-slot>

        <x-slot name="form">
            <div class="col-span-6 sm:col-span-4">
                <x-label for="name">Nome do plano</x-label>
                <x-input wire:model="plan.name" class="w-full"/>
                <x-input-error for="plan.name"/>
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-label for="description">Descrição do plano</x-label>
                <x-input wire:model="plan.description" class="w-full"/>
                <x-input-error for="plan.description"/>
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-label for="price">Valor do plano</x-label>
                <x-input wire:model="plan.price" type="text" class="w-full"/>
                <x-input-error for="plan.price"/>
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-label for="slug">Apelido do plano</x-label>
                <x-input wire:model="plan.slug" class="w-full"/>
                <x-input-error for="plan.slug"/>
            </div>
        </x-slot>

        <x-slot name="actions">
            <x-button>Atualizar</x-button>
        </x-slot>
    </x-form-section>

</div>
