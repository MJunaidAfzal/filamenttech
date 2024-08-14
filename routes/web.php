<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\User;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::get('test' , function(){

//     $recipient = User::where('name', 'admin')->first();
//     $recipient->notify(

//         \Filament\Notifications\Notification::make()
//         ->title('Sending Test Notification')
//         ->toDatabase($recipient)


//     );

//     \Filament\Notifications\Notification::make()
//         ->title('Sending Test Notification')
//         ->sendToDatabase($recipient);

//         dd('done sending');


Route::get('test' , function(){

    $recipient = auth()->user();

    \Filament\Notifications\Notification::make()
        ->title('Sending Test Notification')
        ->sendToDatabase
        ($recipient);

        dd('done sending');

})->middleware('auth');

require __DIR__.'/auth.php';
