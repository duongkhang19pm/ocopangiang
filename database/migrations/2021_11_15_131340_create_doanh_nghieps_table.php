<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoanhNghiepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doanhnghiep', function (Blueprint $table) {
            $table->id();
            //$table->foreignId('tinh_id')->constrained('tinh')->onDelete('cascade');
            //$table->foreignId('huyen_id')->constrained('huyen')->onDelete('cascade');
            $table->foreignId('xa_id')->constrained('xa')->onDelete('cascade');
            $table->string('tenduong');
            $table->foreignId('mohinhkinhdoanh_id')->constrained('mohinhkinhdoanh')->onDelete('cascade');
            $table->foreignId('loaihinhkinhdoanh_id')->constrained('loaihinhkinhdoanh')->onDelete('cascade');
            $table->foreignId('donviquanly_id')->constrained('donviquanly')->onDelete('cascade');
            $table->string('masothue');
            $table->string('tendoanhnghiep');
            $table->string('tendoanhnghiep_slug');
            $table->string('email');
            $table->string('SDT');
            $table->string('website')->nullable();
            $table->date('ngaythanhlap');
            $table->string('hinhanh')->nullable();
            $table->text('gioithieu')->nullable();
            $table->double('kinhdo');
            $table->double('vido');
            $table->timestamp('created_at')->useCurrent();
             $table->timestamp('updated_at')->useCurrentOnUpdate();
             $table->engine = 'InnoDB';
        });;
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doanhnghiep');
    }
}
