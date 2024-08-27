<?php

use App\Models\ProductType;
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
        Schema::table('products', function (Blueprint $table) {
            $table->index('is_active');
            $table->index('price');
            $table->index('product_type_id');
        });

        Schema::table('product_types', function (Blueprint $table) {
            $table->index('is_active');
            $table->index('code');
            $table->index('parent_id');
        });

        Schema::table('production', function (Blueprint $table) {
            $table->index('slug');
            $table->index('is_active');
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->index('status');
            $table->index('email');
            $table->index('product_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropIndex('is_active');
            $table->dropIndex('price');
            $table->dropIndex('product_type_id');
        });

        Schema::table('product_types', function (Blueprint $table) {
            $table->dropIndex('is_active');
            $table->dropIndex('code');
            $table->dropIndex('parent_id');
        });

        Schema::table('production', function (Blueprint $table) {
            $table->dropIndex('slug');
            $table->dropIndex('is_active');
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->dropIndex('status');
            $table->dropIndex('email');
            $table->dropIndex('product_id');
        });
    }
};
