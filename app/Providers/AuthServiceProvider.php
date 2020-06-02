<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin_dashboard','App\Policies\DashboardPolicy@adminDashboard');
        Gate::define('user_dashboard','App\Policies\DashboardPolicy@userDashboard');
        Gate::define('attendances','App\Policies\DashboardPolicy@attendances');

        Gate::define('all_user','App\Policies\UserPolicy@allUser');
        Gate::define('all_user_show','App\Policies\UserPolicy@show');
        Gate::define('all_user_edit','App\Policies\UserPolicy@edit');
        Gate::define('all_user_delete','App\Policies\UserPolicy@delete');

        Gate::define('hr_index','App\Policies\HrPolicy@hrIndex');
        Gate::define('hr_create','App\Policies\HrPolicy@hrCreate');
        Gate::define('hr_show','App\Policies\HrPolicy@show');
        Gate::define('hr_edit','App\Policies\HrPolicy@edit');
        Gate::define('hr_delete','App\Policies\HrPolicy@delete');

        Gate::define('account_index','App\Policies\AccountPolicy@accountIndex');
        Gate::define('account_create','App\Policies\AccountPolicy@accountCreate');
        Gate::define('account_show','App\Policies\AccountPolicy@show');
        Gate::define('account_edit','App\Policies\AccountPolicy@edit');
        Gate::define('account_delete','App\Policies\AccountPolicy@delete');

        Gate::define('employee_index','App\Policies\EmployeePolicy@employeeIndex');
        Gate::define('employee_create','App\Policies\EmployeePolicy@employeeCreate');
        Gate::define('employee_show','App\Policies\EmployeePolicy@show');
        Gate::define('employee_edit','App\Policies\EmployeePolicy@edit');
        Gate::define('employee_delete','App\Policies\EmployeePolicy@delete');

        Gate::define('sale_leader_index','App\Policies\SaleLeaderPolicy@saleLeaderIndex');
        Gate::define('sale_leader_create','App\Policies\SaleLeaderPolicy@saleLeaderCreate');
        Gate::define('sale_leader_show','App\Policies\SaleLeaderPolicy@show');
        Gate::define('sale_leader_edit','App\Policies\SaleLeaderPolicy@edit');
        Gate::define('sale_leader_delete','App\Policies\SaleLeaderPolicy@delete');

        Gate::define('supervisor_index','App\Policies\SupervisorPolicy@supervisorIndex');
        Gate::define('supervisor_create','App\Policies\SupervisorPolicy@supervisorCreate');
        Gate::define('supervisor_show','App\Policies\SupervisorPolicy@show');
        Gate::define('supervisor_edit','App\Policies\SupervisorPolicy@edit');
        Gate::define('supervisor_delete','App\Policies\SupervisorPolicy@delete');

        Gate::define('seller_index','App\Policies\SellerPolicy@sellerIndex');
        Gate::define('seller_create','App\Policies\SellerPolicy@sellerCreate');
        Gate::define('seller_show','App\Policies\SellerPolicy@show');
        Gate::define('seller_edit','App\Policies\SellerPolicy@edit');
        Gate::define('seller_delete','App\Policies\SellerPolicy@delete');

        Gate::define('client_index','App\Policies\ClientPolicy@clientIndex');
        Gate::define('client_create','App\Policies\ClientPolicy@clientCreate');
        Gate::define('client_show','App\Policies\ClientPolicy@show');
        Gate::define('client_edit','App\Policies\ClientPolicy@edit');
        Gate::define('client_delete','App\Policies\ClientPolicy@delete');

        Gate::define('time_report_index','App\Policies\TimeReportPolicy@timeReportIndex');
        Gate::define('time_report_all_time_index','App\Policies\TimeReportPolicy@allTimeReportIndex');

        Gate::define('salary_approved','App\Policies\SalaryApprovedPolicy@salaryApproved');

        Gate::define('salary_index','App\Policies\SalaryPolicy@salaryIndex');
        Gate::define('salary_create','App\Policies\SalaryPolicy@salaryCreate');
        Gate::define('salary_show','App\Policies\SalaryPolicy@show');
        Gate::define('salary_edit','App\Policies\SalaryPolicy@edit');
        Gate::define('salary_delete','App\Policies\SalaryPolicy@delete');

        Gate::define('document','App\Policies\DocumentPolicy@document');

        Gate::define('offert_index','App\Policies\OffertPolicy@offertIndex');
        Gate::define('offert_edit','App\Policies\OffertPolicy@edit');
        Gate::define('offert_delete','App\Policies\OffertPolicy@delete');
        Gate::define('all_offert','App\Policies\OffertPolicy@allOffert');
        Gate::define('offert_create','App\Policies\OffertPolicy@offertCreate');

        Gate::define('role_index','App\Policies\RolePolicy@index');
        Gate::define('role_edit','App\Policies\RolePolicy@edit');
    }
}
