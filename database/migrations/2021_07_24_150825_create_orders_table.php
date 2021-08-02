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
            $table->enum('status',['Proccing','Accepted','Pinding','Rejected','Canceled','shipped','',])
                    ->default('Pinding');
            $table->decimal('total_amount', 12 , 2);
            $table->decimal('discount', 12 , 2);
            $table->decimal('paid', 12 , 2);
            $table->enum('payment_method',['COD','Visa','Paypal','MasterCard','Moyasser']);
            $table->timestamps();
            
            $table->foreignId('user_id')->constrained('users');
            
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
