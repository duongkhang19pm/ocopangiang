<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanPhamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanpham', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nhomsanpham_id')->constrained('nhomsanpham');
            $table->foreignId('loaisanpham_id')->constrained('loaisanpham');
            $table->foreignId('donvitinh_id')->constrained('donvitinh');
            $table->foreignId('quycach_id')->constrained('quycach');
            $table->foreignId('doanhnghiep_id')->constrained('doanhnghiep');
            $table->foreignId('phanhang_id')->constrained('phanhang');
            $table->string('tensanpham');
            $table->string('tensanpham_slug');
            $table->string('nguyenlieu')->nullable();
            $table->string('tieuchuan')->nullable();
            $table->string('dieukienvanchuyen')->nullable();
            $table->string('dieukienluutru')->nullable();
            $table->string('khoiluongrieng');
            $table->integer('soluong');
            $table->double('dongia');
            $table->string('hansudung')->nullable();
            $table->string('hansudungsaumohop')->nullable();
            $table->string('hinhanh')->nullable();
            $table->text('motasanpham')->nullable();
            $table->unsignedTinyInteger('hienthi')->default(1);
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
        Schema::dropIfExists('sanpham');
    }
}
