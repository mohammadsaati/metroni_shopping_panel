<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\FeatureProductController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductImageController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\ShippingPriceController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\SliderController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index']);

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


/*********************************
 * ****** Category Routes *******
 *********** START **************/
Route::controller(CategoryController::class)->prefix("category")->group(function () {
    Route::get("index" , "index")->name("category.index");
    Route::get("create" , "create")->name("category.create");
    Route::post("store" , "store")->name("category.store");
    Route::get("show/{category:slug}" , "show")->name("category.show");
    Route::post("update/{category}" , "update")->name("category.update");
});
/*********************************
 * ****** Category Routes *******
 *********** END **************/

/*********************************
 * ****** Product Routes *******
 *********** START **************/
Route::controller(ProductController::class)->prefix("product")->group(function () {
    Route::get("index" , "index")->name("product.index");
    Route::get("create" , "create")->name("product.create");
    Route::post("store" , "store")->name("product.store");
    Route::get("show/{product:slug}" , "show")->name("product.show");
    Route::post("update/{product}" , "update")->name("product.update");


    Route::controller(ItemController::class)->prefix("{product:slug}/items")->group(function (){
        Route::get("index" , "index")->name("product.item.index");
        Route::get("create" , "create")->name("product.item.create");
        Route::post("store" , "store")->name("product.item.store");
        Route::get("show/{item}" , "show")->name("product.item.show");
        Route::post("update/{item}" , "update")->name("product.item.update");
    });

    Route::controller(FeatureProductController::class)->prefix("{product:slug}/features")->group(function (){
        Route::get("index" , "index")->name("product.feature.index");
        Route::post("store" , "store")->name("product.feature.store");
        Route::post("update/{feature}" , "update")->name("product.feature.update");
        Route::delete("delete/{feature}" , "delete")->name("product.feature.delete");
    });

    Route::controller(ShippingPriceController::class)->prefix("{product:slug}/shipping_prices")->group(function (){
        Route::get("index" , "index")->name("product.shipping_price.index");
        Route::post("store" , "store")->name("product.shipping_price.store");
        Route::post("update/{shipping_price}" , "update")->name("product.shipping_price.update");
        Route::delete("delete/{shipping_price}" , "delete")->name("product.shipping_price.delete");
    });

    Route::controller(ProductImageController::class)->prefix("{product:slug}/images")->group(function (){
        Route::get("index" , "index")->name("product.image.index");
        Route::post("store" , "store")->name("product.image.store");
        Route::post("update/{image}" , "update")->name("product.image.update");
        Route::delete("delete/{image}" , "delete")->name("product.image.delete");
    });

});
/*********************************
 * ****** Product Routes *******
 *********** END **************/

/*********************************
 * ****** Slider Routes *******
 *********** START **************/
Route::controller(SliderController::class)->prefix("slider")->group(function () {
    Route::get("index" , "index")->name("slider.index");
    Route::get("create" , "create")->name("slider.create");
    Route::post("store" , "store")->name("slider.store");
    Route::get("show/{slider}" , "show")->name("slider.show");
    Route::post("update/{slider}" , "update")->name("slider.update");
});
/*********************************
 * ****** Slider Routes *******
 *********** END **************/


/*********************************
 * ****** Banner Routes *******
 *********** START **************/
Route::controller(BannerController::class)->prefix("banner")->group(function () {
    Route::get("index" , "index")->name("banner.index");
    Route::get("create" , "create")->name("banner.create");
    Route::post("store" , "store")->name("banner.store");
    Route::get("show/{banner}" , "show")->name("banner.show");
    Route::post("update/{banner}" , "update")->name("banner.update");
    Route::delete("delete/{banner}" , "delete")->name("banner.delete");
});
/*********************************
 * ****** Banner Routes *******
 *********** END **************/

/*********************************
 * ****** Section Routes *******
 *********** START **************/
Route::controller(SectionController::class)->prefix("section")->group(function () {
    Route::get("index" , "index")->name("section.index");
    Route::get("create" , "create")->name("section.create");
    Route::post("store" , "store")->name("section.store");
    Route::get("show/{section:slug}" , "show")->name("section.show");
    Route::post("update/{section}" , "update")->name("section.update");
    Route::delete("delete/{section}" , "delete")->name("section.delete");
});
/*********************************
 * ****** Section Routes *******
 *********** END **************/


/*********************************
 * ****** Feature Routes *******
 *********** START **************/
Route::controller(FeatureController::class)->prefix("feature")->group(function () {
    Route::get("index" , "index")->name("feature.index");
    Route::get("create" , "create")->name("feature.create");
    Route::post("store" , "store")->name("feature.store");
    Route::get("show/{feature}" , "show")->name("feature.show");
    Route::post("update/{feature}" , "update")->name("feature.update");
});
/*********************************
 * ****** Feature Routes *******
 *********** END **************/

/*********************************
 * ****** Image Routes **********
 *********** START **************/
Route::controller(ImageController::class)->prefix("image")->group(function (){
    Route::get("index" , "index")->name("image.index");
    Route::get("create" , "create")->name("image.create");
    Route::post("store" , "store")->name("image.store");
    Route::get("show/{image:slug}" , "show")->name("image.show");
    Route::post("update/{image}" , "update")->name("image.update");
    Route::delete("delete/{image}" , "delete")->name("image.delete");
});
/*********************************
 * ****** Image Routes **********
 *********** END **************/


/*********************************
 * ****** Brand Routes *******
 *********** START **************/
Route::controller(BrandController::class)->prefix("brand")->group(function () {
    Route::get("index" , "index")->name("brand.index");
    Route::get("create" , "create")->name("brand.create");
    Route::post("store" , "store")->name("brand.store");
    Route::get("show/{brand:slug}" , "show")->name("brand.show");
    Route::post("update/{brand}" , "update")->name("brand.update");
});
/*********************************
 * ****** Brand Routes *******
 *********** END **************/

/*********************************
 * ****** City Routes *******
 *********** START **************/
Route::controller(CityController::class)->prefix("city")->group(function () {
    Route::get("index" , "index")->name("city.index");
    Route::get("create" , "create")->name("city.create");
    Route::post("store" , "store")->name("city.store");
    Route::get("show/{city:slug}" , "show")->name("city.show");
    Route::post("update/{city}" , "update")->name("city.update");
});
/*********************************
 * ****** City Routes *******
 *********** END **************/

/*********************************
 * ****** Size Routes *******
 *********** START **************/
Route::controller(SizeController::class)->prefix("size")->group(function () {
    Route::get("index" , "index")->name("size.index");
    Route::get("create" , "create")->name("size.create");
    Route::post("store" , "store")->name("size.store");
    Route::get("show/{size}" , "show")->name("size.show");
    Route::post("update/{size}" , "update")->name("size.update");
});
/*********************************
 * ****** Size Routes *******
 *********** END **************/

