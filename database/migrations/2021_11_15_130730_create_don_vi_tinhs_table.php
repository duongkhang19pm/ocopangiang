<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\DonViTinh;
class CreateDonViTinhsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donvitinh', function (Blueprint $table) {
            $table->id();
            $table->string('tendonvitinh');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate();
            $table->engine = 'InnoDB';
        });
        DonViTinh::create(['tendonvitinh' => 'Chai']);
        DonViTinh::create(['tendonvitinh' => 'Gram']);
        DonViTinh::create(['tendonvitinh' => 'Gói']);
        DonViTinh::create(['tendonvitinh' => 'KG']);
        DonViTinh::create(['tendonvitinh' => 'Hộp']);
        DonViTinh::create(['tendonvitinh' => 'Bao']);
        DonViTinh::create(['tendonvitinh' => 'Túi']);
        DonViTinh::create(['tendonvitinh' => 'Thùng']);
        DonViTinh::create(['tendonvitinh' => 'Kiện']);
        DonViTinh::create(['tendonvitinh' => 'Khác']);
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donvitinh');
    }
}
