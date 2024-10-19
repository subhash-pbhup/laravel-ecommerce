<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
                        // Primary key and auto-incrementing ID
                        $table->bigIncrements('id');

            
                        // Indexes and keys
                        $table->string('order_number')->unique(); // Unique order number
                        $table->bigIncrements('user_id');
                        
                        // Order details
                        $table->decimal('subtotal', 12, 2); // Subtotal before tax, shipping
                        $table->decimal('tax', 10, 2)->default(0.00); // Tax amount
                        $table->decimal('shipping_cost', 10, 2)->default(0.00); // Shipping cost
                        $table->decimal('total_price', 12, 2); // Total order price (subtotal + tax + shipping)
                        
                        // JSON columns for dynamic or complex data
                        $table->json('shipping_address'); // Storing the entire shipping address as JSON
                        $table->json('order_items'); // Storing order items as JSON (item, quantity, price, etc.)
            
                        // Order status (with enum values for common states)
                        $table->enum('status', ['pending', 'processing', 'shipped', 'delivered', 'cancelled', 'returned'])
                              ->default('pending');
            
                        // Timestamps and soft deletes
                        $table->timestamp('order_date')->nullable(); // Timestamp when the order was placed
                        $table->timestamp('shipped_at')->nullable(); // Timestamp for when the order was shipped
                        $table->softDeletes(); // Soft delete column (deleted_at)
                        $table->timestamps(); // Laravel's default created_at and updated_at timestamps

                    
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
