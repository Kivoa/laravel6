<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeizirepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teizireplies', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('回复ID，主键，自增。');
            $table->text('content')->comment('回复内容');
            $table->integer('teizi_id')->comment('帖子ID，外键');
            $table->integer('user_id')->comment('回复用户ID，外键');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teizireplies');
    }
}
