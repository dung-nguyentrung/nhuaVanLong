<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->string('name_vi');
            $table->string('name_en');
            $table->string('name_jp');
            $table->string('slug')->unique();
            $table->decimal('weight')->default(0);
            $table->string('color');
            $table->decimal('capacity')->default(0);
            $table->string('cycle');
            $table->integer('quantity')->default(0);
            $table->decimal('price', 18, 2);
            $table->text('short_description_vi');
            $table->text('short_description_en');
            $table->text('short_description_jp');
            $table->longText('description_vi');
            $table->longText('description_en');
            $table->longText('description_jp');
            $table->unsignedBigInteger('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('updated_by')->nullable()->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('deleted_by')->nullable()->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
