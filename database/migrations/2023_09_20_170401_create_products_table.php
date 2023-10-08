<?php

use App\Models\Category;
use App\Models\Shop;
use App\Models\Supplier;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
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
            $table->integer('regular_price');
            $table->integer('sale_price')->nullable();
            $table->string('sku');
            $table->float('rating')->nullable()->from(0)->to(5);
            $table->integer("view_count")->default(0);
            $table->integer("sold_count")->default(0);
            $table->text('short_description')->nullable();
            $table->text('long_description')->nullable();
            $table->enum('status', ['0', '1'])->comment('0: disabled, 1: enabled');
            $table->foreignIdFor(Category::class);
            $table->foreignIdFor(Shop::class);
            $table->foreignIdFor(Supplier::class);

            $table->string("meta_title")->nullable();
            $table->string("meta_keyword")->nullable();
            $table->string("meta_description")->nullable();
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
};
