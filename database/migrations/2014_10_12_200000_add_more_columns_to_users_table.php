<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMoreColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')
                    ->after('lname')
                    ->unique();

            $table->string('two_factor_secret')
                    ->after('password')
                    ->nullable();

            $table->string('two_factor_recovery_codes')
                    ->after('two_factor_secret')
                    ->nullable();

            $table->boolean('agreement')
                    ->after('two_factor_recovery_codes')
                    ->default('0');

            $table->timestamp('deleted_at')
                    ->after('agreement')
                    ->nullable();
            $table->string('created_by')
                    ->after('deleted_at')
                    ->nullable();

            $table->string('updated_by')
                    ->after('created_by')
                    ->nullable();

            $table->string('deleted_by')
                    ->after('updated_by')
                    ->nullable();


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
            $table->dropColumn('username', 'two_factor_secret', 'two_factor_recovery_codes', 'agreement', 'deleted_at', 'created_by', 'deleted_by');
        });
    }
}
