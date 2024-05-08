<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('warranty_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('unit_id')->constrained();
            $table->foreignId('warehouse_id')->constrained();
            $table->foreignId('brand_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->text('description');
            $table->string('code')->nullable();
            $table->decimal('price', 8, 2)->nullable();
            $table->enum('discount_type', ['percentage', 'fixed'])->default(null)->nullable();
            $table->decimal('discount_price', 8, 2)->nullable();
            $table->date('discount_start_date')->nullable();
            $table->date('discount_end_date')->nullable();
            $table->integer('qty')->nullable();
            $table->integer('stock_alert')->nullable();
            $table->string('sku')->nullable();
            $table->string('image');
            $table->enum('status', ['draft', 'published','inactive'])->default('draft');
            $table->timestamp('manufactured_date')->nullable();
            $table->timestamp('expired_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
