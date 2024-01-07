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
        Schema::create('blogs_tables', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('blog_category_id');
            $table->string('shipping_name')->nullable();
            $table->string('shipping_phone')->nullable();
            $table->string('shipping_address')->nullable();
            $table->string('shipping_country')->nullable();
            $table->string('shipping_city')->nullable();
            $table->string('shipping_zipcode')->nullable();
            $table->string('shipping_email')->nullable();

            $table->timestamps();
            $table->foreign('blog_category_id')->references('id')->on('blog_category_tables_table')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs_tables');
    }
};
