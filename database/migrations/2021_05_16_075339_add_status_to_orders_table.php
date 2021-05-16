<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->boolean('status')
                ->default(0)
                ->comment('status: (0: đã tạo đơn hàng và chưa thanh toán; 1: đã tạo đơn và đã thanh toán online; 2: (shipping) shipper đang đi giao hàng; 3: (cancel) đơn hàng bị hủy do lỗi kỹ thuật hoặc một lý do khác; 4: (finished) Hoàn thành)')
                ->after('user_id');
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
            // $table->dropColumn('status');

            if (Schema::hasColumn('orders', 'status')) {
                // The "orders" table exists and has an "status" column...
                $table->dropColumn('status');
            }
        });
    }
}
