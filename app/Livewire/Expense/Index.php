<?php

namespace App\Livewire\Expense;

use App\Models\Expense;
use Livewire\Component;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;

class Index extends Component
{

     #[Layout('layouts.app')]
    public function render(): View
    {
        return view('livewire.expense.index', [
            'expenses' => auth()->user()->expenses()->orderBy('created_at', 'desc')->paginate(5),
        ]);
    }

    public function delete(int $expense): void
    {
        $expense = auth()->user()->expenses()->find($expense);
        $expense->delete();

        session()->flash('success', 'Expense deleted successfully');
    }
}
