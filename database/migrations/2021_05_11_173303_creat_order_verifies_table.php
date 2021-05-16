<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatOrderVerifiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_verifies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->tinyInteger('status')->default(0);
            $table->string('code', 50);
            $table->dateTime('expire_date');
            $table->timestamps();
            $table->softDeletes();

            // SET foreign key for table order_verifies (order_verifies.user_id = users.id)
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // DROP foreign key for table order_verifies (order_verifies.user_id = users.id)
        if (Schema::hasColumn('order_verifies', 'user_id') && Schema::hasTable('users')) {
            Schema::table('order_verifies', function (Blueprint $table) {
                $table->dropForeign(['user_id']);
            });
        }

        Schema::dropIfExists('order_verifies');
    }
}
