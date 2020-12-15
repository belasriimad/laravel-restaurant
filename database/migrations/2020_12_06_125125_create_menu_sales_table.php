<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_sales', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("menu_id")->unsigned();
            $table->bigInteger("sales_id")->unsigned();
            $table->foreign('menu_id')
                ->references("id")
                ->on("menus")->onDelete("cascade");
            $table->foreign('sales_id')
                ->references("id")
                ->on("sales")->onDelete("cascade");
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
        Schema::dropIfExists('menu_sales');
    }
}
