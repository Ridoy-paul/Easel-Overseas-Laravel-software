<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BusinessSettingController;
use App\Http\Controllers\CRMController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\VisaController;
use App\Http\Controllers\PassportController;
use App\Http\Controllers\AgentsController;
use App\Http\Controllers\ExpensesCategoryController;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\OwnersController;
use App\Http\Controllers\OwnerTransactionController;


Route::get('/fin', [Admincontroller::class, 'test_finger_print']);

Route::group(['middleware' => 'auth', 'middleware' => 'adminAuth'], function () {

    Route::get('/dashboard', [Admincontroller::class, 'dashboard'])->name('dashboard');

    Route::get('/', [Admincontroller::class, 'dashboard'])->name('index');

    Route::get('/admin/profile', [Admincontroller::class, 'admin_profile'])->name('admin.profile');
    Route::post('/admin/update-profile', [Admincontroller::class, 'admin_update_profile'])->name('admin.update.author.profile');
    
    
    //Begin:: role & permission
    Route::get('/admin/role', [AdminController::class, 'role'])->name('admin.role');
    Route::post('/admin/store-role', [AdminController::class, 'create_role'])->name('admin.create.roll');
    Route::get('/admin/edit-role/{id}', [AdminController::class, 'Edit_Admin_helper_role'])->name('admin.edit.roll');
    Route::post('/admin/update-admin-role/{id}', [AdminController::class, 'update_Admin_helper_role']);
    Route::get('/admin/role-permissions/{id}', [AdminController::class, 'admin_helper_permission']);
    Route::get('/admin/set-permission-to-admin-helper-role', [AdminController::class, 'set_permission_to_admin_helper_role']);
    Route::get('/admin/delete-permission-from-role', [AdminController::class, 'delete_permission_from_role']);
    

    //Begin::Admin  CRM
    Route::get('/admin/all-crm', [CRMController::class, 'index'])->name('admin.crm');
    Route::post('/admin/create-crm', [CRMController::class, 'store'])->name('admin.create.crm');
    Route::get('/admin/edit-crm/{id}', [CRMController::class, 'edit']);
    Route::post('/admin/update-crm/{id}', [CRMController::class, 'update']);
    Route::get('/admin/deactive-crm/{id}', [CRMController::class, 'DeactiveCRM']);
    Route::get('/admin/active-crm/{id}', [CRMController::class, 'ActiveCRM']);
    //End::Admin  CRM

    //Begin:: Business Settings
    Route::get('/admin/settings', [BusinessSettingController::class, 'index'])->name('admin.settings');
    Route::post('/admin/store-settings', [BusinessSettingController::class, 'store'])->name('admin.store.update.setting');
    
    //Begin:: Countries
    Route::get('/countries', [CountryController::class, 'index'])->name('countries');
    Route::post('/store-country', [CountryController::class, 'store'])->name('store.countries');
    Route::get('/edit-country/{id}', [CountryController::class, 'edit']);
    Route::post('/update-country/{id}', [CountryController::class, 'update']);

    //Begin:: Visa
    Route::get('/visa', [VisaController::class, 'index'])->name('visa');
    Route::post('/store-visa', [VisaController::class, 'store'])->name('visa.store');
    Route::get('/edit-visa/{id}', [VisaController::class, 'edit']);
    Route::post('/update-visa/{id}', [VisaController::class, 'update']);

    //Begin:: passport
    Route::group(['prefix'=>'passport', 'as'=>'passport.'], function() {
        Route::get('/create', [PassportController::class, 'create'])->name('create');
        Route::post('/store', [PassportController::class, 'store'])->name('store');
        Route::get('/all-passport', [PassportController::class, 'index'])->name('index');
        Route::get('/all-data', [PassportController::class, 'index_data'])->name('index.data');
        Route::get('/edit-passport/{id}', [PassportController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [PassportController::class, 'update'])->name('update');
    });

    //Begin:: Agent
    Route::group(['prefix'=>'agent', 'as'=>'agent.'], function() {
        Route::post('/store', [AgentsController::class, 'store'])->name('store');
        Route::get('/all-agent', [AgentsController::class, 'index'])->name('index');
        Route::get('/all-agetn-data', [AgentsController::class, 'agent_data'])->name('index.data');
        Route::get('/edit/{id}', [AgentsController::class, 'edit'])->name('edit');
        Route::post('/update-agent/{id}', [AgentsController::class, 'update'])->name('update');

        Route::get('/report/{id}', [AgentsController::class, 'report'])->name('report');

    });

    //Begin:: Expenses Category
    Route::group(['prefix'=>'expense', 'as'=>'expense.category.'], function() {
        Route::get('/category', [ExpensesCategoryController::class, 'index'])->name('index');
        Route::post('/category-store', [ExpensesCategoryController::class, 'store'])->name('store');
        Route::get('/category/edit/{id}', [ExpensesCategoryController::class, 'edit'])->name('edit');
        Route::post('/category-update/{id}', [ExpensesCategoryController::class, 'update'])->name('update');
        Route::get('/add-expense', [ExpensesCategoryController::class, 'create_expense'])->name('create');
        
    });

    //Begin:: Work
    Route::group(['prefix'=>'work', 'as'=>'work.'], function() {
        Route::get('/create', [WorkController::class, 'create'])->name('create');
        Route::get('/get_visa_to_country_info', [WorkController::class, 'get_visa_to_country_info']);
        Route::get('/search/agent', [WorkController::class, 'search_agent']);
        Route::get('/search/passport', [WorkController::class, 'search_passport']);
        
        Route::post('/store', [WorkController::class, 'store']);
        Route::get('/all-work', [WorkController::class, 'index'])->name('index');
        Route::get('/all-work-data', [WorkController::class, 'work_data'])->name('index.data');
        Route::get('/work-edit/{id}', [WorkController::class, 'edit'])->name('edit');
        Route::post('/update', [WorkController::class, 'update'])->name('update');
        Route::get('/work-view/{id}', [WorkController::class, 'show'])->name('view');
        Route::post('/work-change-status/{id}', [WorkController::class, 'update_status'])->name('update.status');
        
    });

    //Begin:: Income
    Route::group(['prefix'=>'income', 'as'=>'income.'], function() {
        Route::get('/create/{id}', [IncomeController::class, 'create'])->name('create');
        Route::get('/search_work_data', [IncomeController::class, 'search_work_data']);
        Route::post('/store', [IncomeController::class, 'store'])->name('store');
        Route::get('/all-income', [IncomeController::class, 'index'])->name('index');
        Route::get('/all-income-data', [IncomeController::class, 'income_data'])->name('index.data');
        Route::get('/voucher/{id}', [IncomeController::class, 'show'])->name('voucher');
        Route::post('/delete_income', [IncomeController::class, 'destroy'])->name('delete');
        
    });

    //Begin:: Expenses
    Route::group(['prefix'=>'expense', 'as'=>'expense.'], function() {
        Route::get('/create', [ExpensesController::class, 'create'])->name('create');
        Route::get('/search_client_or_agent_data', [ExpensesController::class, 'search_client_or_agent_data']);
        Route::post('/store', [ExpensesController::class, 'store'])->name('store');
        Route::get('/all-expense', [ExpensesController::class, 'index'])->name('index');
        Route::get('/all-expense-data', [ExpensesController::class, 'expense_data'])->name('index.data');
        Route::get('/voucher/{id}', [ExpensesController::class, 'show'])->name('voucher');
        Route::post('/delete_expenses', [ExpensesController::class, 'destroy'])->name('delete');
    });

    //Begin:: Owners
    Route::get('/admin/account-capital-person', [OwnersController::class, 'index'])->name('owners.view');
    Route::post('/admin/add-new-capital-person', [OwnersController::class, 'store'])->name('admin.create.new.capital.person');
    Route::get('/admin/{id}/edit-capital-person', [OwnersController::class, 'edit'])->name('admin.edit.capital.person');
    Route::post('/admin/edit-capital-person/{id}', [OwnersController::class, 'update']);

    Route::get('/admin/owners/withdraw-balance', [OwnerTransactionController::class, 'create'])->name('owners.withdraw.balance');
    Route::post('/admin/owners/withdraw-balance_confirm', [OwnerTransactionController::class, 'store'])->name('owners.withdraw.balance.confirm');
    Route::get('/admin/owners/transactions', [OwnerTransactionController::class, 'index'])->name('owners.transactions.index');
    Route::get('/admin/owners/transactions_data', [OwnerTransactionController::class, 'index_data'])->name('owners.transactions.index.data');
    Route::post('/admin/owners/transactions_delete', [OwnerTransactionController::class, 'destroy'])->name('delete.owners.transactions');


    
    //Begin:: Expenses
    Route::group(['prefix'=>'report', 'as'=>'report.'], function() {
        Route::get('/expenses-ledger', [AdminController::class, 'expenses_ledger_report'])->name('expenses.ledger');
        Route::get('/expenses-ledger_data', [AdminController::class, 'expenses_ledger_report_data']);
        Route::get('/income-ledger', [AdminController::class, 'income_ledger_report'])->name('income.ledger');
        Route::get('/income-ledger_data', [AdminController::class, 'income_ledger_report_data']);
        
        
        
    });
    
    
    




  

});

    
