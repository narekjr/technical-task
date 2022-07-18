<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_emails', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('subscriber_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->timestamp('sent_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_emails');
    }
};
