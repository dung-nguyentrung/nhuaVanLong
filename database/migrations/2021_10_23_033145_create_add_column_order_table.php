<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddColumnOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('company_name');
            $table->string('email')->nullable();
            $table->enum('status',['Đang chờ xử lý', 'Xác nhận', 'Đã thanh lý'])->default('Đang chờ xử lý');
            $table->text('note')->nullable();
            $table->enum('shipping_method', ['Công ty giao hàng', 'Khách nhận hàng trực tiếp']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('company_name');
            $table->dropColumn('email');
            $table->dropColumn('status');
            $table->dropColumn('note');
            $table->dropColumn('shipping_method');
        });
    }
}
