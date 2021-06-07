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
            $table->bigIncrements('id')->comment('用户ID，主键，自增长');
            $table->string('name')->comment('用户名');
            $table->string('password')->comment('用户密码。要求密码长度大于等于6位');
            $table->integer('sex')->comment('用户性别，有两个值：男为2，女为1');
            $table->string('face')->comment('用户头像的索引，默认值为1');
            $table->dateTime('register_time')
                ->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'))
                ->comment('用户注册时间'); 
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
