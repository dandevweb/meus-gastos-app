<?php

namespace App\Livewire\Expense;

use App\Models\Expense;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Create extends Component
{

    #[Rule('required')]
    public $amount;

    #[Rule('required')]
    public $description;

    #[Rule('required')]
    public $type;

    public function store(): void
    {
        $this->validate();

        $success = auth()->user()->expenses()->create([
            'amount' => $this->amount,
            'description' => $this->description,
            'type' => $this->type,
        ]);

        if (!$success) {
            session()->flash('error', 'Expense could not be created');
            return;
        }

        session()->flash('success', 'Expense created successfully');
        $this->reset();

    }

    #[Layout('layouts.app')]
    public function render(): View
    {
        return view('livewire.expense.create');
    }
}
