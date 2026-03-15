<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    private const CONFIG_TABLE_NAME = 'atomic-chat.core.models.chat.table';

    public function up(): void
    {
        $tableName = config(self::CONFIG_TABLE_NAME);
        Schema::create($tableName, function(Blueprint $table) use ($tableName) {
            $table->id();
            $table->string('hash')->nullable();
            $table->string('type')->default('');
            $table->timestamps();
            $table->unique(['hash'], $tableName . '_unique_hash');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(config(self::CONFIG_TABLE_NAME));
    }
};
