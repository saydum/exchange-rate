<?php

use App\Http\Controllers\SettingController;
use App\Http\Controllers\ValuteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ValuteController::class, 'index'])->name('index');

Route::get('/settings', [SettingController::class, 'index'])->name('settings');

Route::get('/create', [SettingController::class, 'create'])->name('setXml');

Route::post('/results', [SettingController::class, 'getSettingResultValute'])->name('getSettingsResult');
