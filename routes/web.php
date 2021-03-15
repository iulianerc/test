<?php

use App\Http\Controllers\GeneratePDFController;
use Illuminate\Support\Facades\Route;

Route::prefix('flaps')->group(function () {
    Route::get('import', [GeneratePDFController::class, 'importFlap']);
    Route::get('import/preview', [GeneratePDFController::class, 'importFlapPreview']);
    Route::get('export', [GeneratePDFController::class, 'exportFlap']);
    Route::get('export/preview', [GeneratePDFController::class, 'exportFlapPreview']);
    Route::get('reimport', [GeneratePDFController::class, 'reimportFlap']);
    Route::get('reimport/preview', [GeneratePDFController::class, 'reimportFlapPreview']);
    Route::get('reexport', [GeneratePDFController::class, 'reexportFlap']);
    Route::get('reexport/preview', [GeneratePDFController::class, 'reexportFlapPreview']);
    Route::get('transit', [GeneratePDFController::class, 'transitFlap']);
    Route::get('transit/preview', [GeneratePDFController::class, 'transitFlapPreview']);
});
Route::prefix('talons')->group(function () {
    Route::get('export_reimport', [GeneratePDFController::class, 'exportReimportTalon']);
    Route::get('export_reimport/preview', [GeneratePDFController::class, 'exportReimportTalonPreview']);
    Route::get('import_reexport', [GeneratePDFController::class, 'importReexportTalon']);
    Route::get('import_reexport/preview', [GeneratePDFController::class, 'importReexportTalonPreview']);
    Route::get('transit', [GeneratePDFController::class, 'transitTalon']);
    Route::get('transit/preview', [GeneratePDFController::class, 'transitTalonPreview']);
});
Route::get('main_sheet', [GeneratePDFController::class, 'mainSheet']);
Route::get('main_sheet/preview', [GeneratePDFController::class, 'mainSheetPreview']);
Route::get('general_list', [GeneratePDFController::class, 'generalList']);
Route::get('general_list/preview', [GeneratePDFController::class, 'generalListPreview']);

Route::get('general_list_continuation', [GeneratePDFController::class, 'generalListContinuation']);
Route::get('general_list_continuation/preview', [GeneratePDFController::class, 'generalListContinuationPreview']);

Route::get('rules', [GeneratePDFController::class, 'rules']);
Route::get('rules/preview', [GeneratePDFController::class, 'rulesPreview']);
Route::get('guarantee', [GeneratePDFController::class, 'guarantee']);
Route::get('guarantee/preview', [GeneratePDFController::class, 'guaranteePreview']);
Route::get('full_pdf', [GeneratePDFController::class, 'FullPdf']);
Route::get('full_pdf/preview', [GeneratePDFController::class, 'FullPdfPreview']);

