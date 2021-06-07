<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BankuaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bankuais', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('板块ID，主键，自增。');
            $table->string('name')->comment('板块名称');
            $table->integer('fatherId')->comment('板块所属父级板块ID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
