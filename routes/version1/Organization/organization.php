<?php

use App\Http\Controllers\version1\Organization\OrganizationController;
use Illuminate\Support\Facades\Route;



Route::get('createOrganisationPage',[OrganizationController::class,'createOrganisationPage'])->name('createOrganisationPage');
Route::get('getOrganizationAccount',[OrganizationController::class,'getOrganizationAccount'])->name('getOrganizationAccount');
Route::get('my_account',[OrganizationController::class,'my_account'])->name('my_account');
Route::post('storeOrganization',[OrganizationController::class,'storeOrganization'])->name('storeOrganization');
Route::post('getDistrict',[OrganizationController::class,'getDistrict'])->name('getDistrict');
Route::post('setOrganizationId', [OrganizationController::class, 'setOrganizationId'])->name('setOrganizationId');
Route::get('organizationDataBase/{id}', [OrganizationController::class, 'organizationDataBase'])->name('organizationDataBase');
Route::get('defaultLogin',[OrganizationController::class,'defaultLogin'])->name('defaultLogin');
Route::post('setDefaultOrganization',[OrganizationController::class,'setDefaultOrganization'])->name('setDefaultOrganization');
