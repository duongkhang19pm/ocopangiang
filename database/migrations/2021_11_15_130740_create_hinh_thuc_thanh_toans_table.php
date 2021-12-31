<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\HinhThucThanhToan;
class CreateHinhThucThanhToansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hinhthucthanhtoan', function (Blueprint $table) {
            $table->id();
            $table->string('hinhthucthanhtoan');
             $table->timestamp('created_at')->useCurrent();
             $table->timestamp('updated_at')->useCurrentOnUpdate();
             $table->engine = 'InnoDB';
        });
        HinhThucThanhToan::create(['hinhthucthanhtoan' => 'Thanh toán khi nhận hàng (COD - giao hàng và thu tiền tận nơi)']);
        HinhThucThanhToan::create(['hinhthucthanhtoan' => 'Thanh toán qua thẻ tín dụng, thẻ ghi nợ']);
        HinhThucThanhToan::create(['hinhthucthanhtoan' => 'Thanh toán bằng thẻ ATM nội địa']);
        HinhThucThanhToan::create(['hinhthucthanhtoan' => 'Chuyển tiền trực tiếp vào tài khoản người bán']);
        HinhThucThanhToan::create(['hinhthucthanhtoan' => 'Thanh toán trực tiếp bằng tiền mặt tại cửa hàng']);
        HinhThucThanhToan::create(['hinhthucthanhtoan' => 'Thanh toán qua đơn vị trung gian']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hinhthucthanhtoan');
    }
}
