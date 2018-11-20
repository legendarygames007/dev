<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnglishcrosswordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('englishcrosswords', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mode',15); //classic theme paid
            $table->string('difficultylevel',10); //general | easy medium hard harder
            $table->integer('packno'); //pack 1 pack 2
            $table->integer('levelno'); //level 1 level 2
            $table->text('leveldata'); //actual level json
            $table->integer('packcost'); //pack cost in coins
            $table->integer('dbupdateversion'); //version helps you sync local db with server db
            $table->timestamps();
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('englishcrossword');
    }
}
