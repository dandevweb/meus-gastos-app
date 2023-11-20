<?php

namespace App\Livewire\Expense;

use App\Models\Expense;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    #[Rule('required')]
    public $amount;

    #[Rule('required')]
    public $description;

    #[Rule('required')]
    public $type;

    #[Rule(['image', 'nullable'])]
    public $photo;

    #[Rule('nullable')]
    public $expenseDate;

    public function store(): void
    {
        $this->validate();

        if($this->photo) {
            $this->photo = $this->photo->store('expenses-photos', 'public');
        }

        $success = auth()->user()->expenses()->create([
            'amount' => $this->amount,
            'description' => $this->description,
            'type' => $this->type,
            'photo' => $this->photo,
            'expense_date' => $this->expenseDate
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
