<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
          $table->id();
          $table->string('invoice_no')->nullable();
          $table->date('date');
          $table->longText('description')->nullable();
          $table->tinyInteger('status')->default(0);
          $table->integer('approved_by')->nullable();
          $table->integer('created_by')->nullable();
          $table->integer('updated_by')->nullable();
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
        Schema::dropIfExists('invoices');
    }
}
