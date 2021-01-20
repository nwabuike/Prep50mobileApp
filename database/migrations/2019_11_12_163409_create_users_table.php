<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('firstname', 100);
            $table->string('othername', 100)->nullable();
            $table->string('lastname', 100);
            $table->string('regNum', 10)->unique();
            $table->string('phone')->unique();
            $table->date('dateReg');
            $table->enum('gender', ['M', 'F']);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            //$table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->string('img');
            $table->decimal('totalCoinsAccrued', 6, 2);
            $table->decimal('totalCurrentCoin', 6, 2);
            $table->text('accessToken')->nullable()->default(null);
            $table->date('nextPayment')->nullable();
            
            $table->bigInteger('state_id')->unsigned();   
            $table->bigInteger('polytechnic_id')->unsigned(); 
            $table->bigInteger('university_id')->unsigned(); 
            $table->bigInteger('department_id')->unsigned();    
            
            $table->foreign('state_id')->references('id')->on('states')->onUpdate('cascade');
            $table->foreign('polytechnic_id')->references('id')->on('polytechnics')->onUpdate('cascade');
            $table->foreign('university_id')->references('id')->on('universities')->onUpdate('cascade');
            $table->foreign('department_id')->references('id')->on('departments')->onUpdate('cascade');

            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
            $table->foreign('polytechnic_id')->references('id')->on('polytechnics')->onDelete('cascade');
            $table->foreign('university_id')->references('id')->on('universities')->onDelete('cascade');
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
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
}
