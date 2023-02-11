<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\SitemapController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KycManageController;
use App\Http\Controllers\Admin\ManageRoleController;
use App\Http\Controllers\Admin\SeoSettingController;
use App\Http\Controllers\Admin\ClientGroupController;
use App\Http\Controllers\Admin\ManageStaffController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\ManageTicketController;
use App\Http\Controllers\Admin\ProductGroupController;
use App\Http\Controllers\Admin\ManageCountryController;
use App\Http\Controllers\Admin\GeneralSettingController;
use App\Http\Controllers\Admin\ManageCurrencyController;
use App\Http\Controllers\Admin\PaymentGatewayController;
use App\Http\Controllers\Admin\ProductCatalogController;
use App\Http\Controllers\Admin\ServiceProductController;
use App\Http\Controllers\Admin\ProductBookSettingController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',       [\App\Http\Controllers\HomeController::class, 'index'])->name('front.index');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('frontend.index');







// Admin Panel

Route::prefix(env('ADMIN_NAME'))->group(function () {
    Route::get('/login',                    [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login/submit',            [AdminLoginController::class, 'login'])->name('admin.login.submit');
    Route::get('/forgot',                   [AdminLoginController::class, 'showForgotForm'])->name('admin.forgot');
    Route::get('/logout',                   [DashboardController::class, 'logout'])->name('admin.logout');


    Route::group(['middleware' => ['is.admin']], function () {

        Route::get('/dashboard',                [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('/master',                   [DashboardController::class, 'master'])->name('admin.master');
        Route::get('/profile',                  [DashboardController::class, 'profile'])->name('admin.profile');
        Route::post('/profile/update',          [DashboardController::class, 'profileUpdate'])->name('admin.profile.update');
        Route::get('/password',                 [DashboardController::class, 'password'])->name('admin.password');
        Route::post('/password/update',         [DashboardController::class, 'passwordUpdate'])->name('admin.password.update');


        //sitemap
        Route::get('/sitemap.xml',              [SitemapController::class, 'index'])->name('admin.sitemap');

        // client group
        Route::get('/client/group',             [ClientGroupController::class, 'index'])->name('admin.group.index');
        Route::get('/add/group',                [ClientGroupController::class, 'create'])->name('admin.group.create');
        Route::post('/group/store',             [ClientGroupController::class, 'store'])->name('admin.group.store');
        Route::get('/edit/group/{id}',          [ClientGroupController::class, 'edit'])->name('admin.group.edit');
        Route::post('/update/group/{id}',       [ClientGroupController::class, 'update'])->name('admin.group.update');
        Route::get('/group/delete/{id}',        [ClientGroupController::class, 'delete'])->name('admin.group.delete');



        Route::get('/clients',                        [ClientController::class, 'index'])->name('admin.client.index');
        Route::get('/add/client',                     [ClientController::class, 'create'])->name('admin.client.create');
        Route::post('/client/store',                  [ClientController::class, 'store'])->name('admin.client.store');
        Route::get('/client/edit/{id}',               [ClientController::class, 'edit'])->name('admin.client.edit');
        Route::post('/client/update/{id}',            [ClientController::class, 'update'])->name('admin.client.update');
        Route::get('/client/delete/{id}',             [ClientController::class, 'delete'])->name('admin.client.delete');
        Route::get('/client/overview/{id}',           [ClientController::class, 'overview'])->name('admin.client.overview');
        Route::get('/client/financial/{id}',          [ClientController::class, 'financial'])->name('admin.client.financial');
        Route::post('/client/financial/submit/{id}',  [ClientController::class, 'financialSubmit'])->name('admin.client.financial.submit');
        Route::get('/client/statement/{id}',          [ClientController::class, 'statement'])->name('admin.client.statement');
        Route::get('/client/permission/{id}',         [ClientController::class, 'permission'])->name('admin.client.permission');
        Route::post('/client/permission/submit/{id}', [ClientController::class, 'permissionSubmit'])->name('admin.client.permission.submit');


        Route::get('/client/activity-log/{id}',           [ClientController::class, 'activity_log'])->name('admin.client.activitylog');
        Route::get('/client/invoice/{id}',                [ClientController::class, 'invoice'])->name('admin.client.invoice');
        Route::get('/client/products/{id}',               [ClientController::class, 'products'])->name('admin.client.products');
        Route::get('/client/email/preference/{id}',       [ClientController::class, 'emailPreference'])->name('admin.client.email.preference');
        Route::get('/client/email/set-price/{id}',        [ClientController::class, 'setPrice'])->name('admin.client.email.setprice');
        Route::get('/client/email/order-history/{id}',    [ClientController::class, 'orderHistory'])->name('admin.client.order.history');
        Route::get('/client/phone/verify',                [ClientController::class, 'clinetPhoneVerify'])->name('admin.client.phone.verify');
        Route::get('/client/financial/load/form',         [ClientController::class, 'financialLoad'])->name('admin.financial.load');
        Route::get('/client/coupons/{user_id}',           [ClientController::class, 'coupons'])->name('admin.client.coupons');
        Route::post('add/client/coupons/{user_id}',       [ClientController::class, 'addCoupons'])->name('admin.client.coupon.add');
        Route::get('/remove-coupons/{coupon_id}',         [ClientController::class, 'removeCoupons'])->name('admin.coupon.remove');


        // SLIDER ROUTE
        Route::get('/slider',                             [SliderController::class, 'index'])->name('admin.slider.index');
        Route::get('/slider/create',                      [SliderController::class, 'create'])->name('admin.slider.create');
        Route::post('/slider/store',                      [SliderController::class, 'store'])->name('admin.slider.store');
        Route::get('/slider/edit/{id}',                   [SliderController::class, 'edit'])->name('admin.slider.edit');
        Route::post('/slider/update/{id}',                [SliderController::class, 'update'])->name('admin.slider.update');
        Route::get('/slider/delete/{id}',                 [SliderController::class, 'delete'])->name('admin.slider.delete');


        // DIGITAL INVENTORY
        Route::get('/digital/inventories',                [DigitalInventoryController::class, 'index'])->name('admin.digital.inventory.index');
        Route::get('/digital/inventories/stocks',         [DigitalInventoryController::class, 'stocks'])->name('admin.digital.inventory.stock.index');
        Route::get('/digital/inventories/add/stock',      [DigitalInventoryController::class, 'create'])->name('admin.digital.inventory.create');
        Route::post('/digital/inventories/store/stock',   [DigitalInventoryController::class, 'store'])->name('admin.digital.inventory.store');
        Route::get('/digital/inventories/edit/stock/{id}',[DigitalInventoryController::class, 'edit'])->name('admin.digital.inventory.edit');

        Route::post('/digital/inventories/update/key',       [DigitalInventoryController::class, 'updateKey'])->name('admin.digital.stock.update');
        Route::get('/digital/inventories/delete/key/{id}',   [DigitalInventoryController::class, 'deleetKey'])->name('admin.digital.key.delete');

        // INVENTORY GROUP
        Route::get('/inventory/groups',                   [InventoryGroupController::class, 'index'])->name('admin.inventory.group.index');
        Route::get('/add/inventory/group',                [InventoryGroupController::class, 'create'])->name('admin.inventory.group.create');
        Route::post('/inventory/group/store',             [InventoryGroupController::class, 'store'])->name('admin.inventory.group.store');
        Route::get('/inventory/edit/{id}',                [InventoryGroupController::class, 'edit'])->name('admin.inventory.group.edit');
        Route::post('/inventory/update/{id}',             [InventoryGroupController::class, 'update'])->name('admin.inventory.group.update');
        Route::get('/inventory/delete/{id}',              [InventoryGroupController::class, 'delete'])->name('admin.inventory.group.delete');


        // PRODUCT CATALOG
        Route::get('product/catalog',                     [ProductCatalogController::class, 'index'])->name('admin.product.catalog.index');
        Route::get('product/catalog/create',              [ProductCatalogController::class, 'create'])->name('admin.product.catalog.create');
        Route::post('product/catalog/store',              [ProductCatalogController::class, 'store'])->name('admin.product.catalog.store');
        Route::get('product/catalog/edit/{id}',           [ProductCatalogController::class, 'edit'])->name('admin.product.catalog.edit');
        Route::post('product/catalog/update/{id}',        [ProductCatalogController::class, 'update'])->name('admin.product.catalog.update');
        Route::get('product/catalog/delete/{id}',         [ProductCatalogController::class, 'delete'])->name('admin.product.catalog.delete');
        Route::get('product/catalog/field/edit/{id}',     [ProductCatalogController::class, 'field'])->name('admin.product.catalog.field.create');
        Route::post('product/catalog/field/submit/{id}',  [ProductCatalogController::class, 'fieldSubmit'])->name('admin.product.catalog.field.submit');
        Route::get('product/catalog/api/edit/{id}',       [ProductCatalogController::class, 'api'])->name('admin.product.catalog.api.create');
        Route::post('product/catalog/api/submit/{id}',    [ProductCatalogController::class, 'apiSubmit'])->name('admin.product.catalog.api.submit');
        Route::get('product/catalog/pricing/edit/{id}',   [ProductCatalogController::class, 'pricing'])->name('admin.product.catalog.pricing.create');
        Route::post('product/catalog/pricing/submit/{id}',[ProductCatalogController::class, 'pricingSubmit'])->name('admin.product.catalog.pricing.submit');

        Route::post('product/group/pricing/submit/{id}',  [ProductCatalogController::class, 'groupPricingSubmit'])->name('admin.group.pricing.submit');


        // PRODUCT GROUP
        Route::get('product/group',                   [ProductGroupController::class, 'index'])->name('admin.product.group.index');
        Route::get('product/group/create',            [ProductGroupController::class, 'create'])->name('admin.product.group.create');
        Route::post('product/group/store',            [ProductGroupController::class, 'store'])->name('admin.product.group.store');
        Route::get('product/group/edit/{id}',         [ProductGroupController::class, 'edit'])->name('admin.product.group.edit');
        Route::post('product/group/update/{id}',      [ProductGroupController::class, 'update'])->name('admin.product.group.update');
        Route::get('product/group/delete/{id}',       [ProductGroupController::class, 'delete'])->name('admin.product.group.delete');


        //manage currency
        Route::get('/manage-currency',        [ManageCurrencyController::class,'index'])->name('admin.currency.index');
        Route::get('/add-currency',           [ManageCurrencyController::class,'addCurrency'])->name('admin.currency.add');
        Route::post('/add-currency',          [ManageCurrencyController::class,'store']);
        Route::get('/edit-currency/{id}',     [ManageCurrencyController::class,'editCurrency'])->name('admin.currency.edit');
        Route::post('/update-currency/{id}',  [ManageCurrencyController::class,'updateCurrency'])->name('admin.currency.update');
        Route::post('/update-currency-api',   [ManageCurrencyController::class,'updateCurrencyAPI'])->name('admin.currency.api.update');


        // PRODUCT GROUP SECTION
        Route::get('product/groups',   [ProductGroupController::class, 'index'])->name('admin.product.group.index');


        // SERVICE PRODUCT SECTION

        Route::get('service/product',                      [ServiceProductController::class, 'index'])->name('admin.service.product.index');
        Route::get('service/product/create',               [ServiceProductController::class, 'create'])->name('admin.service.product.create');
        Route::post('service/product/store',               [ServiceProductController::class, 'store'])->name('admin.service.product.store');
        Route::get('service/product/edit/{id}',            [ServiceProductController::class, 'edit'])->name('admin.service.product.edit');
        Route::post('service/product/update/{id}',         [ServiceProductController::class, 'update'])->name('admin.service.product.update');
        Route::get('service/product/pricing/edit/{id}',    [ServiceProductController::class, 'pricing'])->name('admin.service.product.pricing.create');
        Route::post('service/product/pricing/submit/{id}', [ServiceProductController::class, 'pricingSubmit'])->name('admin.service.product.pricing.submit');
        Route::get('/service/product/delete/{id}',        [ServiceProductController::class, 'delete'])->name('admin.service.product.delete');

        // Service Product Book Setting
        Route::get('service/product/book/setting',           [ProductBookSettingController::class, 'index'])->name('admin.service.product.book.setting.index');

        Route::post('service/product/book/setting/update',   [ProductBookSettingController::class, 'update'])->name('admin.book.service.setting.update');

        //cookie
        Route::get('/manage-cookie',                  [GeneralSettingController::class,'cookie'])->name('admin.cookie');
        Route::post('/manage-cookie/update',          [GeneralSettingController::class,'updateCookie'])->name('admin.update.cookie');

        // BLOG ROUTE
        Route::get('/blog/posts',               [BlogController::class, 'index'])->name('admin.blog.index');
        Route::get('/blog/posts/create',        [BlogController::class, 'create'])->name('admin.blog.create');
        Route::post('/blog/posts/store',        [BlogController::class, 'store'])->name('admin.blog.store');
        Route::get('/blog/posts/edit/{id}',     [BlogController::class, 'edit'])->name('admin.blog.edit');
        Route::post('/blog/posts/update/{id}',  [BlogController::class, 'update'])->name('admin.blog.update');
        Route::get('/blog/posts/delete/{id}',   [BlogController::class, 'delete'])->name('admin.blog.delete');



        // Blog category route
        Route::get('/blog/categories',              [BlogCategoryController::class, 'index'])->name('admin.blog.category.index');
        Route::get('/blog/categories/create',       [BlogCategoryController::class, 'create'])->name('admin.blog.category.create');
        Route::post('/blog/categories/store',       [BlogCategoryController::class, 'store'])->name('admin.blog.category.store');
        Route::get('/blog/categories/edit/{id}',    [BlogCategoryController::class, 'edit'])->name('admin.blog.category.edit');
        Route::post('/blog/categories/update/{id}', [BlogCategoryController::class, 'update'])->name('admin.blog.category.update');
        Route::get('/blog/categories/delete/{id}',  [BlogCategoryController::class, 'delete'])->name('admin.blog.category.delete');

        //manage Country
        Route::get('/manage-country',               [ManageCountryController::class,'index'])->name('admin.country.index');
        Route::post('/add-country',                 [ManageCountryController::class,'store'])->name('admin.country.store');
        Route::post('/update-country',              [ManageCountryController::class,'update'])->name('admin.country.update');
        Route::post('/update-country-status/{id}',  [ManageCountryController::class,'updateStatus'])->name('admin.country.update.status');


        // Settings route
        Route::get('generelsetting',            [GeneralSettingController::class, 'index'])->name('admin.setting.index');
        Route::post('generelsetting/update',    [GeneralSettingController::class, 'update'])->name('admin.setting.update');
        Route::get('generelsetting/menu',       [GeneralSettingController::class, 'menu'])->name('admin.menu.index');
        Route::post('/menu/update',             [GeneralSettingController::class, 'menuUpdate'])->name('admin.menu.update');
        Route::get('/social-login/setting',     [GeneralSettingController::class, 'socialLogin'])->name('admin.social.login');
        Route::post('/social-login/setting',    [GeneralSettingController::class, 'socialLoginUpdate']);

        Route::get('seo-setting',               [SeoSettingController::class,'index'])->name('admin.seo.index');
        Route::post('seo-setting/update',       [SeoSettingController::class,'update'])->name('admin.seo-setting.update');

        Route::get('/captcha/setting',          [GeneralSettingController::class, 'captchaSetting'])->name('admin.captcha.setting');
        Route::post('/captcha/setting',         [GeneralSettingController::class, 'captchaSettingUpdate']);

        Route::get('/email-config',             [GeneralSettingController::class,'emailConfig'])->name('admin.mail.config');
        Route::post('/email-config',            [GeneralSettingController::class,'emailConfigUpdate']);


        // orders
        Route::get('orders', [AdminOrderController::class, 'index'])->name('admin.order.index');
        Route::get('orders/details/{id}', [AdminOrderController::class, 'details'])->name('admin.order.details');
        Route::get('service/orders/details/{id}', [AdminOrderController::class, 'Servicedetails'])->name('admin.order.service.details');


        // services orders
        Route::get('service/orders', [AdminOrderController::class, 'serviceIndex'])->name('admin.service.order.index');


        // payment gateway routes

        Route::get('gateway',                             [PaymentGatewayController::class, 'index'])->name('admin.gateway.index');
        Route::get('gateway/edit/{id}',                   [PaymentGatewayController::class, 'edit'])->name('admin.gateway.edit');
        Route::post('gateway/update/{id}',                [PaymentGatewayController::class, 'update'])->name('admin.gateway.update');
        Route::get('gateway/status/{id}/{status}/{type}', [PaymentGatewayController::class, 'status'])->name('admin.gateway.status');

        //role manage
        Route::get('manage/role',             [ManageRoleController::class,'index'])->name('admin.role.manage');
        Route::get('create/role',             [ManageRoleController::class,'create'])->name('admin.role.create');
        Route::post('create/role',            [ManageRoleController::class,'store']);
        Route::get('edit/permissions/{id}',   [ManageRoleController::class,'edit'])->name('admin.role.edit');
        Route::post('update/permissions/{id}',[ManageRoleController::class,'update'])->name('admin.role.update');

        //manage staff
        Route::get('manage/staff',      [ManageStaffController::class,'index'])->name('admin.staff.manage');
        Route::post('add/staff',        [ManageStaffController::class,'addStaff'])->name('admin.staff.add');
        Route::post('update/staff/{id}',[ManageStaffController::class,'updateStaff'])->name('admin.staff.update');


        //manage language
        Route::resource('language', LanguageController::class);

        Route::post('add-translate/{id}',     [LanguageController::class,'storeTranslate'])->name('translate.store');
        Route::post('update-translate/{id}',  [LanguageController::class,'updateTranslate'])->name('translate.update');
        Route::post('remove-translate',       [LanguageController::class,'removeTranslate'])->name('translate.remove');
        Route::post('language/status-update', [LanguageController::class,'statusUpdate'])->name('update-status.language');
        Route::post('language/remove',        [LanguageController::class,'destroy'])->name('remove.language');


        // kyc routes
        Route::get('kyc/form-builder',         [KycManageController::class, 'index'])->name('admin.kyc.index');
        Route::post('kyc/form/add',            [KycManageController::class, 'kycForm'])->name('admin.kyc.add');
        Route::post('kyc/form/update',         [KycManageController::class, 'kycFormUpdate'])->name('admin.kyc.form.update');
        Route::post('kyc/form/delete',         [KycManageController::class, 'deletedField'])->name('admin.kyc.form.delete');
        Route::get('kyc/pending',              [KycManageController::class, 'pendingKyc'])->name('admin.kyc.pending');
        Route::get('kyc/details/{id}',         [KycManageController::class, 'details'])->name('admin.kyc.details');
        Route::get('kyc/status/{id}/{status}', [KycManageController::class, 'status'])->name('admin.user.kyc');
        Route::get('kyc/type/',                [KycManageController::class, 'kycType'])->name('admin.kyc.type');


        //support ticket
        Route::get('manage/tickets',[ManageTicketController::class,'index'])->name('admin.ticket.manage');
        Route::post('reply/ticket/{ticket_num}',   [ManageTicketController::class,'replyTicket'])->name('admin.ticket.reply');
        Route::post('close/ticket',[ManageTicketController::class,'closeTicket'])->name('admin.ticket.close');

    });

});





Route::get('/clear', function() {

    $exitCode = Artisan::call('config:cache');
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('view:clear');
    $exitCode = Artisan::call('route:clear');
    $exitCode = Artisan::call('clear-compiled');
    return 'DONE';
});
