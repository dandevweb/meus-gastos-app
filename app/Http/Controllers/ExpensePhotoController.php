<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\{
    Storage,
    File,
};

class ExpensePhotoController
{
    public function __invoke(int $expense): Response
    {
        $expense = auth()->user()->expenses()->findOrFail($expense);

        if (!Storage::disk('public')->exists($expense->photo)) {
            abort(404, 'Image not found');
        }

        $image = cache()->rememberForever(
            "expense-photo-{$expense->id}",
            fn() => Storage::disk('public')->get($expense->photo)
        );

        $mimeType = File::mimeType(storage_path('app/public/' . $expense->photo));

        return response($image)->header('Content-Type', $mimeType);
    }
}
