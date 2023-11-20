<?php

namespace App\Livewire\Expense;

use App\Models\Expense;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\WithFileUploads;

class Edit extends Component
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

    public Expense $expense;

    public function mount(): void
    {
        $this->amount = $this->expense->amount;
        $this->description = $this->expense->description;
        $this->type = $this->expense->type;
        $this->expenseDate = $this->expense->expense_date ?? $this->expense->created_at;
    }

    public function update(Expense $expense): void
    {
        $this->validate();

        if($this->photo) {
            if(Storage::disk('public')->exists($this->expense->photo)) {
                Storage::disk('public')->delete($this->expense->photo);
            }

            $this->photo = $this->photo->store('expenses-photos', 'public');
        }

        $this->expense->update([
            'amount' => $this->amount,
            'description' => $this->description,
            'type' => $this->type,
            'photo' => $this->photo ?? $this->expense->photo,
            'expense_date' => $this->expenseDate,
        ]);
        session()->flash('success', 'Expense updated successfully');
    }

     #[Layout('layouts.app')]
    public function render(): View
    {
        return view('livewire.expense.edit');
    }
}
