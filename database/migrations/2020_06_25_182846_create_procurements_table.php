<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcurementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procurements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
           
            $table->string('date');
            $table->string('qty');
            $table->string('unitPrice');
            $table->string('details');
            $table->string('total');
            $table->string('req_send')->default(false);
            
            $table->timestamps();
        });
    }
    // $table->unsignedBigInteger('bid_id');
    // $table->foreign('bid_id')->references('id')->on('bids')->onDelete('cascade');

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('procurements');
    }
}
