<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaiVietsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baiviet', function (Blueprint $table) {
            $table->id();
            $table->foreignId('chude_id')->constrained('chude');
            $table->foreignId('taikhoan_id')->constrained('taikhoan');
            $table->string('tieude');
            $table->string('tieude_slug');
            $table->text('tomtat')->nullable();
            $table->text('noidung');
            $table->date('ngaydang');
            $table->Integer('luotxem');
            $table->tinyInteger('kiemduyet')->default(0);
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
        Schema::dropIfExists('baiviet');
    }
}
