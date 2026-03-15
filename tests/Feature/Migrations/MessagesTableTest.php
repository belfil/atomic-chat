<?php

declare(strict_types=1);

namespace Belfil\AtomicChat\Tests\Feature\Migrations;

use Belfil\AtomicChat\Tests\Helpers\Database;
use Belfil\AtomicChat\Tests\TestCase;
use Illuminate\Support\Facades\Schema;

class MessagesTableTest extends TestCase
{
    use Database;

    public function test_create_messages_table_with_default_name(): void
    {
        $this->assertMessageStructure($this->messageTableName());
    }

    public function test_create_messages_table_with_custom_name(): void
    {
        $table = 'custom_chat_messages';
        config(['atomic-chat.core.models.message.table' => $table]);
        $this->migrateFresh();
        $this->assertMessageStructure($table);
    }

    private function assertMessageStructure(string $table): void
    {
        $this->assertTrue(Schema::hasTable($table));
        $this->assertEqualColumns($table, [
            'id',
            'chat_id',
            'actor_id',
            'content',
            'created_at',
            'updated_at',
        ]);
        $this->assertIndexExists($table, $table . '_chat_id_idx');
        $this->assertIndexExists($table, $table . '_actor_id_idx');
    }
}
