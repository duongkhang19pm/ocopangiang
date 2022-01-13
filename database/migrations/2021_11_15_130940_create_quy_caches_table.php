9<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\QuyCach;
class CreateQuyCachesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quycach', function (Blueprint $table) {
            $table->id();
            $table->foreignId('donvitinh_id')->constrained('donvitinh')->onDelete('cascade');
            $table->string('tenquycach');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate();
            $table->engine = 'InnoDB';
        });
        
        //quy cách đóng gói của đơn vị tính là chai
        QuyCach::create(['donvitinh_id'=> '1' ,'tenquycach'=> '1 chai']);
        QuyCach::create(['donvitinh_id'=> '1' ,'tenquycach'=> '1 Lít']);
        QuyCach::create(['donvitinh_id'=> '1' ,'tenquycach'=> 'Khác']);
        //quy cách đóng gói của đơn vị tính là gram
        QuyCach::create(['donvitinh_id'=> '2' ,'tenquycach'=> '1 gram']);
        QuyCach::create(['donvitinh_id'=> '2' ,'tenquycach'=> '10 gram']);
        QuyCach::create(['donvitinh_id'=> '2' ,'tenquycach'=> 'khác']);
        //quy cách đóng gói của đơn vị tính là gói
        QuyCach::create(['donvitinh_id'=> '3' ,'tenquycach'=> '1 gói']);
        QuyCach::create(['donvitinh_id'=> '3' ,'tenquycach'=> '1 gram']);
        QuyCach::create(['donvitinh_id'=> '3' ,'tenquycach'=> 'khác']);
        //quy cách đóng gói của đơn vị tính là KG
        QuyCach::create(['donvitinh_id'=> '4' ,'tenquycach'=> '1 KG']);
        QuyCach::create(['donvitinh_id'=> '4' ,'tenquycach'=> '1 Trái']);
        QuyCach::create(['donvitinh_id'=> '4' ,'tenquycach'=> '4 Trái']);
        QuyCach::create(['donvitinh_id'=> '4' ,'tenquycach'=> 'khác']);
        //quy cách đóng gói của đơn vị tính là hộp
        QuyCach::create(['donvitinh_id'=> '5' ,'tenquycach'=> '1 chai']);
        QuyCach::create(['donvitinh_id'=> '5' ,'tenquycach'=> '1 hộp']);
        QuyCach::create(['donvitinh_id'=> '5' ,'tenquycach'=> '20 gram']);
        QuyCach::create(['donvitinh_id'=> '5' ,'tenquycach'=> '500 gram']);
        QuyCach::create(['donvitinh_id'=> '5' ,'tenquycach'=> '10 gói']);
        QuyCach::create(['donvitinh_id'=> '5' ,'tenquycach'=> '2 cuộn']);
        QuyCach::create(['donvitinh_id'=> '5' ,'tenquycach'=> 'khác']);
        //quy cách đóng gói của đơn vị tính là bao
        QuyCach::create(['donvitinh_id'=> '6' ,'tenquycach'=> '5 KG']);
        QuyCach::create(['donvitinh_id'=> '6' ,'tenquycach'=> '10 KG']);
        QuyCach::create(['donvitinh_id'=> '6' ,'tenquycach'=> 'Khác']);
        //quy cách đóng gói của đơn vị tính là túi
        QuyCach::create(['donvitinh_id'=> '7' ,'tenquycach'=> '2 KG']);
        QuyCach::create(['donvitinh_id'=> '7' ,'tenquycach'=> '100 gram']);
        QuyCach::create(['donvitinh_id'=> '7' ,'tenquycach'=> '500 gram']);
        QuyCach::create(['donvitinh_id'=> '7' ,'tenquycach'=> '100 gram']);
         QuyCach::create(['donvitinh_id'=> '7' ,'tenquycach'=> 'khác']);
        //quy cách đóng gói của đơn vị tính là thùng
        QuyCach::create(['donvitinh_id'=> '8' ,'tenquycach'=> '18 KG']);
        QuyCach::create(['donvitinh_id'=> '8' ,'tenquycach'=> '5 trái']);
        QuyCach::create(['donvitinh_id'=> '8' ,'tenquycach'=> '24 gói']);
        QuyCach::create(['donvitinh_id'=> '8' ,'tenquycach'=> '60 gói']);
        QuyCach::create(['donvitinh_id'=> '8' ,'tenquycach'=> '24 chai']);
        QuyCach::create(['donvitinh_id'=> '8' ,'tenquycach'=> 'khác']);
        //quy cách đóng gói của đơn vị tính là kiện
        QuyCach::create(['donvitinh_id'=> '9' ,'tenquycach'=> '24 thùng']);
        QuyCach::create(['donvitinh_id'=> '9' ,'tenquycach'=> '38 thùng']);
        QuyCach::create(['donvitinh_id'=> '9' ,'tenquycach'=> 'khác']);
        //quy cách đóng gói của đơn vị tính là khác
        QuyCach::create(['donvitinh_id'=> '10' ,'tenquycach'=> 'khác']);



        

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quycach');
    }
}
