<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeFieldNullableAtUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::table('users', function (Blueprint $table){
                $table->longText('addres')->nullable()->change();
                $table->longText('addres_note')->nullable()->change();
                $table->bigInteger('districts_id')->nullable()->change();
                $table->bigInteger('regencies_id')->nullable()->change();
                $table->bigInteger('provinces_id')->nullable()->change();
                $table->string('postal_code')->nullable()->change();
                $table->string('no_telephone')->nullable()->change();
            });
        }
        
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table){
            $table->longText('addres');
            $table->longText('addres_note')->nullable(false)->change();
            $table->bigInteger('districts_id')->nullable(false)->change();
            $table->bigInteger('regencies_id')->nullable(false)->change();
            $table->bigInteger('provinces_id')->nullable(false)->change();
            $table->string('postal_code')->nullable(false)->change();
            $table->string('no_telephone')->nullable(false)->change();
            
        });
    }
}