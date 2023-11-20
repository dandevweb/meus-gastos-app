<?php

namespace App\Livewire\Plan;

use App\Models\Plan;
use Livewire\Component;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;

class Create extends Component
{

    public array $plan = [];

    protected $rules = [
        'plan.name' => 'required',
        'plan.description' => 'required',
        'plan.price' => 'required',
        'plan.slug' => 'required',
    ];

    public function store(): void
    {
        $this->validate();

        $plan = $this->plan;
        $plan['reference'] = 'PAGSEGURO-REFERENCE';

        Plan::create($plan);

        session()->flash('success', 'Plano criado com sucesso!');

        $this->reset('plan');

    }

     #[Layout('layouts.app')]
    public function render(): View
    {
        return view('livewire.plan.create');
    }
}
