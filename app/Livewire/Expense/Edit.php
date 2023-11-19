<?php

namespace App\Livewire\Expense;

use App\Models\Expense;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;

class Edit extends Component
{

    #[Rule('required')]
    public $amount;

    #[Rule('required')]
    public $description;

    #[Rule('required')]
    public $type;

    public Expense $expense;

    public function mount(): void
    {
        $this->amount = $this->expense->amount;
        $this->description = $this->expense->description;
        $this->type = $this->expense->type;
    }

    public function update(Expense $expense): void
    {
        $this->validate();

        $this->expense->update([
            'amount' => $this->amount,
            'description' => $this->description,
            'type' => $this->type,
        ]);
        session()->flash('success', 'Expense updated successfully');
    }

     #[Layout('layouts.app')]
    public function render(): View
    {
        return view('livewire.expense.edit');
    }
}
