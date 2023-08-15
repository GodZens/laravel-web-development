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
        Schema::create('depnewslinks', function (Blueprint $table) {
            $table->engine = 'MyISAM';
            $table->integer('id');
            $table->string('description', 100);
            $table->string('edescription', 100);
            $table->string('link');
            $table->integer('order_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('depnewslinks');
    }
};
