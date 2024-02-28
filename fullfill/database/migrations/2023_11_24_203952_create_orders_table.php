<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders_booking', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained();
            $table->string('customer_name');
            $table->string('customer_email');
            $table->integer('quantity');
            $table->float('total_price');
            $table->text('message')->nullable();
            $table->date('booking_date');
            $table->string('booking_time');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders_booking');
    }
}

