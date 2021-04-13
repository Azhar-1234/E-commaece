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
            $table->string('name');
            $table->string('slug');
            $table->text('feature_description')->nullable();
            $table->text('description')->nullable();
            $table->tinyinteger('quantity')->default(0);
            $table->double('price')->default(0.00);
            $table->text('images');
            $table->boolean('status')->default(1)->comment('1 for active,0 for inactive');
            $table->boolean('featured_product')->default(0)->comment('1 for active,0 for inactive');
            $table->bigInteger('sub_category_id')->unsigned();
            $table->foreign('sub_category_id')->references('id')->on('sub_categories')->onDelete('cascade')->onUpdate('cascade');
                                                                                                                                
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
        Schema::dropIfExists('products');
    }
}
