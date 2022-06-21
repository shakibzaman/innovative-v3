<?php
Route::redirect('/', 'admin/home');

Auth::routes(['register' => false]);

// Change Password Routes...
Route::get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
Route::patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('permissions', 'Admin\PermissionsController');
    Route::delete('permissions_mass_destroy', 'Admin\PermissionsController@massDestroy')->name('permissions.mass_destroy');
    Route::resource('roles', 'Admin\RolesController');
    Route::delete('roles_mass_destroy', 'Admin\RolesController@massDestroy')->name('roles.mass_destroy');
    Route::resource('users', 'Admin\UsersController');
    Route::delete('users_mass_destroy', 'Admin\UsersController@massDestroy')->name('users.mass_destroy');

    // Expensecategories
    Route::delete('expense-categories/destroy', 'Admin\ExpenseCategoryController@massDestroy')->name('expense-categories.massDestroy');
    Route::resource('expense-categories', 'Admin\ExpenseCategoryController');

    // Incomecategories
    Route::delete('income-categories/destroy', 'Admin\IncomeCategoryController@massDestroy')->name('income-categories.massDestroy');
    Route::resource('income-categories', 'Admin\IncomeCategoryController');

    // Expenses
    Route::delete('expenses/destroy', 'Admin\ExpenseController@massDestroy')->name('expenses.massDestroy');
    Route::resource('expenses', 'Admin\ExpenseController');

    // Incomes
    Route::delete('incomes/destroy', 'Admin\IncomeController@massDestroy')->name('incomes.massDestroy');
    Route::resource('incomes', 'Admin\IncomeController');

    // Expensereports
    Route::delete('expense-reports/destroy', 'Admin\ExpenseReportController@massDestroy')->name('expense-reports.massDestroy');
    Route::resource('expense-reports', 'Admin\ExpenseReportController');

    //    projects
    Route::delete('projects/destroy', 'Admin\ProjectController@massDestroy')->name('expense-reports.massDestroy');
    Route::resource('projects', 'Admin\ProjectController');
    //    projectsExpenseController
    Route::delete('project-expense-category/destroy', 'Admin\ProjectExpenseCategoryController@massDestroy')->name('expense-reports.massDestroy');
    Route::resource('project-expense-category', 'Admin\ProjectExpenseCategoryController');

    //    projectsExpense
    Route::delete('project-expense/destroy', 'Admin\ProjectExpenseController@massDestroy')->name('expense-reports.massDestroy');
    Route::resource('project-expense', 'Admin\ProjectExpenseController');

    //projectsReceivedAmount
    Route::delete('project-received/destroy', 'Admin\ProjectReceivedAmountController@massDestroy')->name('expense-reports.massDestroy');
    Route::resource('project-received', 'Admin\ProjectReceivedAmountController');

    //   Labourer
    Route::delete('labourer/destroy', 'Admin\LabourerController@massDestroy')->name('expense-reports.massDestroy');
    Route::resource('labourer', 'Admin\LabourerController');

    //   Contractor
    Route::delete('contractor/destroy', 'Admin\ContracterController@massDestroy')->name('expense-reports.massDestroy');
    Route::resource('contractor', 'Admin\ContracterController');

    //    projectsVoucher
//    Route::delete('invoice-voucher/destroy', 'PaymentVoucherController@massDestroy')->name('expense-reports.massDestroy');
//    Route::resource('invoice-voucher', 'PaymentVoucherController');
//    Route::get('invoice-voucher-print/{id}', 'PaymentVoucherController@print')->name('invoice-voucher-print');

//    Search
    Route::resource('search', 'Admin\SearchController');
    Route::get('/findCatName','Admin\SearchController@findCatName');
    Route::get('/findExpName','Admin\SearchController@findExpName');
});
