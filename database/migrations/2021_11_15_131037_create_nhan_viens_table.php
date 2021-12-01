<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNhanViensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhanvien', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tinh_id')->constrained('tinh');
            $table->foreignId('huyen_id')->constrained('huyen');
            $table->foreignId('xa_id')->constrained('xa');
            $table->string('tenduong');
            $table->foreignId('doanhnghiep_id')->constrained('doanhnghiep');
            $table->foreignId('chucvu_id')->constrained('chucvu');
            $table->string('tennhanvien');
            $table->string('email');
            $table->string('SDT');
            $table->string('CMND');
             $table->tinyInteger('gioitinh')->default(0);
            $table->date('ngaysinh');
            $table->string('hinhanh')->nullable();
            $table->timestamp('created_at')->useCurrent();
             $table->timestamp('updated_at')->useCurrentOnUpdate();
             $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nhanvien');
    }
}
