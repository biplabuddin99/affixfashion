<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->string('contact_no')->unique();
            $table->unsignedBigInteger('role_id')->index();
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->string('password');
            $table->integer('all_company_access')->nullable();
            $table->integer('department_id')->nullable();
            $table->integer('designation_id')->nullable();
            $table->boolean('status')->default(1)->comment('1=>active 2=>Logged 0 => Inactive');
            $table->string('last_login')->nullable();
            $table->string('last_login_ip')->nullable();
            $table->boolean('full_access')->default(false)->comment('1=>yes 0=>no');
            $table->string('language')->default('en');
            $table->unsignedBigInteger('company_id')->nullable()->index();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->unsignedBigInteger('branch_id')->nullable()->index();
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
            $table->string('image')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
