<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('datalaundrymember', function (Blueprint $table) {
            $table->unsignedBigInteger('no_transaksi')->unique();
            $table->date('tgl_transaksi');
            $table->unsignedBigInteger('member_id');;
            $table->foreign('member_id')->references('member_id')->on('member');
            $table->unsignedBigInteger('id_pegawai');
            $table->foreign('id_pegawai')->references('id_pegawai')->on('pegawai');
            $table->text('keterangan');
            $table->enum('status_laundry', ['menunggu', 'diproses','selesai']);
            $table->enum('status_pembayaran', ['bayar', 'belum']);
            $table->text('lokasi_kirim');
            $table->timestamps();

             
            // Add indexes for member_id and id_pegawai
            $table->index('member_id');
            $table->index('id_pegawai'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_data_laundry_member');
    }
};
