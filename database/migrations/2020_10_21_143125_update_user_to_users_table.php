<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUserToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::connection()->getDoctrineSchemaManager()->getDatabasePlatform()->registerDoctrineTypeMapping('enum', 'string');
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('regNum', 10)->nullable()->change();
            $table->string('img')->nullable()->change();
            $table->bigInteger('state_id')->unsigned()->nullable()->change();
            $table->bigInteger('polytechnic_id')->unsigned()->nullable()->change();
            $table->bigInteger('university_id')->unsigned()->nullable()->change();
            $table->bigInteger('department_id')->unsigned()->nullable()->change();
            
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
