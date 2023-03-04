<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_carts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('userid');
            $table->mediumtext('image')->nullable();
            $table->string('productname');
            $table->integer('quantity');
            $table->integer('totalprice');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_carts');
    }
}
