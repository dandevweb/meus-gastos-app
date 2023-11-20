<?php

namespace App\Livewire\Plan;

use App\Models\Plan;
use Livewire\Component;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;

class Edit extends Component
{
    public Plan $plan;

    protected $rules = [
        'plan.name' => 'required',
        'plan.description' => 'required',
        'plan.price' => 'required',
        'plan.slug' => 'required',
    ];


     #[Layout('layouts.app')]
    public function render(): View
    {
        return view('livewire.plan.edit');
    }
}
