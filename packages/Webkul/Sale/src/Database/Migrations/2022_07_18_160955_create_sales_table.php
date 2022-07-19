<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string('job_ref_no');
            $table->string('sales_no');
            $table->string('remarks');
            $table->string('terms');
            $table->integer('quantity');
            $table->decimal('price');
            $table->decimal('pretax_amount');
            $table->decimal('price_tax');
            $table->decimal('tax');
            $table->date('date');
            $table->string('sales_status');
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
        Schema::dropIfExists('sales');
    }
}
