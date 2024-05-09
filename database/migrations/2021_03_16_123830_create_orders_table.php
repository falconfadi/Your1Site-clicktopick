<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('admin_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('order_detail_id')->nullable()->constrained()->onDelete('cascade');

            $table->foreignId('currency_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('payment_method_id')->nullable();
            $table->foreignId('coupon_id')->nullable()->constrained()->onDelete('set null');

            $table->decimal('total_price', 10, 2)->nullable();
            $table->decimal('total_price_before_discount', 10, 2)->nullable();
            $table->decimal('discount_on_coupon', 10, 2)->nullable();

            $table->string('code')->unique()->nullable();
            $table->boolean('status')->default(1);

            $table->dateTime('delivery_date')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
