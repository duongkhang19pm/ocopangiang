<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\ChuDe;
class CreateChuDesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chude', function (Blueprint $table) {
            $table->id();
             $table->string('tenchude');
             $table->string('tenchude_slug');
             $table->timestamp('created_at')->useCurrent();
             $table->timestamp('updated_at')->useCurrentOnUpdate();
             $table->engine = 'InnoDB';
        });
        ChuDe::create(['tenchude' => 'Tin Tức' , 'tenchude_slug' => 'tin-tuc']);
        ChuDe::create(['tenchude' => 'Giới Thiệu' , 'tenchude_slug' => 'gioi-thieu']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chude');
    }
}
