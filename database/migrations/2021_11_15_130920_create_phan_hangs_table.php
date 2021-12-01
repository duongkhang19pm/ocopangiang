<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\PhanHang;
class CreatePhanHangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phanhang', function (Blueprint $table) {
              $table->id();
             $table->string('tenphanhang');
             $table->string('tenphanhang_slug');
             $table->timestamp('created_at')->useCurrent();
             $table->timestamp('updated_at')->useCurrentOnUpdate();
             $table->engine = 'InnoDB';
        });
        PhanHang::create(['tenphanhang' => '1Sao' , 'tenphanhang_slug' => '1-sao']);
        PhanHang::create(['tenphanhang' => '2Sao' , 'tenphanhang_slug' => '2-sao']);
        PhanHang::create(['tenphanhang' => '3Sao' , 'tenphanhang_slug' => '3-sao']);
        PhanHang::create(['tenphanhang' => '4Sao' , 'tenphanhang_slug' => '4-sao']);
        PhanHang::create(['tenphanhang' => '5Sao' , 'tenphanhang_slug' => '5-sao']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phanhang');
    }
}
