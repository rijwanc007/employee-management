<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('first_name')->after('id')->nullable();
            $table->string('last_name')->after('first_name')->nullable();
            $table->string('account_for')->after('name')->nullable();
            $table->string('private_email')->after('email')->nullable();
            $table->string('invoice_email')->after('private_email')->nullable();
            $table->string('phone')->after('invoice_email')->nullable();
            $table->string('phone_evening')->after('phone')->nullable();
            $table->string('designation')->after('phone_evening')->nullable();
            $table->string('work_space')->after('designation')->nullable();
            $table->string('nearest_chief')->after('work_space')->nullable();
            $table->string('employee_type')->after('nearest_chief')->nullable();
            $table->string('contract_start')->after('employee_type')->nullable();
            $table->string('contract_end')->after('contract_start')->nullable();
            $table->string('bank_name')->after('contract_end')->nullable();
            $table->string('account_number')->after('bank_name')->nullable();
            $table->string('clearing_number')->after('account_number')->nullable();
            $table->string('table_tax')->after('clearing_number')->nullable();
            $table->string('company_name')->after('table_tax')->nullable();
            $table->string('contact_person')->after('company_name')->nullable();
            $table->string('url')->after('contact_person')->nullable();
            $table->string('work_under')->after('url')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
