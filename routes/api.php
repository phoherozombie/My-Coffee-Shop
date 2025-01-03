Route::prefix('v1')->group(function () {
    Route::apiResource('categories', \App\Http\Controllers\API\CategoryController::class);
});
