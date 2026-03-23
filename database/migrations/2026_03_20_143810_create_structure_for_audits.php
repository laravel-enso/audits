<?php

use LaravelEnso\Migrator\Database\Migration;

return new class extends Migration {
    protected array $permissions = [
        ['name' => 'system.audit.index', 'description' => 'Show index for audits', 'is_default' => false],

        ['name' => 'system.audit.create', 'description' => 'Create audit', 'is_default' => false],
        ['name' => 'system.audit.store', 'description' => 'Store a new audit', 'is_default' => false],
        ['name' => 'system.audit.edit', 'description' => 'Edit audit', 'is_default' => false],
        ['name' => 'system.audit.update', 'description' => 'Update audit', 'is_default' => false],
        ['name' => 'system.audit.destroy', 'description' => 'Delete audit', 'is_default' => false],
        ['name' => 'system.audit.initTable', 'description' => 'Init table for audits', 'is_default' => false],

        ['name' => 'system.audit.tableData', 'description' => 'Get table data for audits', 'is_default' => false],

        ['name' => 'system.audit.exportExcel', 'description' => 'Export excel for audits', 'is_default' => false],

        ['name' => 'system.audit.options', 'description' => 'Get audit options for select', 'is_default' => false],
    ];

    protected array $menu = [
        'name' => 'Audit', 'icon' => 'poll', 'route' => 'system.audit.index', 'order_index' => 150, 'has_children' => false
    ];

    protected ?string $parentMenu = 'System';
};
