<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Pages\Budget\Budget as BudgetIndex;
use App\Livewire\Pages\Budget\View as ViewIndex;
use App\Livewire\Pages\Budget\Signout as SignoutIndex;
use App\Livewire\Pages\Dashboard\Dashboard as DashboardIndex;
use App\Livewire\Pages\Budget\Viewactivity as ViewactivityIndex;
use App\Livewire\Pages\Budget\Monitoring as MonitoringIndex;
use App\Livewire\Pages\Budget\Supplement as SupplementIndex;
use App\Livewire\Pages\Budget\Augmentation as AugmentationIndex;
use App\Livewire\Pages\Budget\HistoryForm as HistoryFormIndex;
use App\Models\User;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {return view('back.auth.login');})->name('login');



Route::get('/dashboard', DashboardIndex::class)->name('dashboard');
Route::get('/budget', BudgetIndex::class)->name('budget');
Route::get('/viewactivity/{id}', ViewactivityIndex::class)->name('viewactivity');
Route::get('/monitoring', MonitoringIndex::class)->name('monitoring');
Route::get('/view/{id}', ViewIndex::class)->name('view');
Route::get('/signout', SignoutIndex::class)->name('signout');
Route::get('/supplement', SupplementIndex::class)->name('supplement');
Route::get('/augmentation', AugmentationIndex::class)->name('augmentation');
Route::get('/histoy-form', HistoryFormIndex::class)->name('histoy-form');

 