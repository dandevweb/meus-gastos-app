<?php

namespace App\Livewire\Plan;

use App\Models\Plan;
use Livewire\Component;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;

class Index extends Component
{

     #[Layout('layouts.app')]
    public function render(): View
    {
        return view('livewire.plan.index', [
            'plans' => Plan::paginate(5)
        ]);
    }
}
