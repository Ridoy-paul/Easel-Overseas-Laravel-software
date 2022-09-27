<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class RolePermission extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->delete();

        $permissions = [
            ['name' => 'dashboard.view', 'guard_name' => 'web', 'group_name' => 'Dashboard'],
            ['name' => 'settings', 'guard_name' => 'web', 'group_name' => 'Dashboard'],

            ['name' => 'role.view', 'guard_name' => 'web', 'group_name' => 'Role'],
            ['name' => 'create.role', 'guard_name' => 'web', 'group_name' => 'Role'],
            ['name' => 'update.role', 'guard_name' => 'web', 'group_name' => 'Role'],
            ['name' => 'permissions', 'guard_name' => 'web', 'group_name' => 'Role'],

            ['name' => 'crm.view', 'guard_name' => 'web', 'group_name' => 'CRM'],
            ['name' => 'crm.create', 'guard_name' => 'web', 'group_name' => 'CRM'],
            ['name' => 'crm.update', 'guard_name' => 'web', 'group_name' => 'CRM'],

            ['name' => 'country.view', 'guard_name' => 'web', 'group_name' => 'Country'],
            ['name' => 'country.create', 'guard_name' => 'web', 'group_name' => 'Country'],
            ['name' => 'country.edit', 'guard_name' => 'web', 'group_name' => 'Country'],
            // ['name' => 'country.delete', 'guard_name' => 'web', 'group_name' => 'Country'],

            ['name' => 'visa.view', 'guard_name' => 'web', 'group_name' => 'Visa'],
            ['name' => 'visa.create', 'guard_name' => 'web', 'group_name' => 'Visa'],
            ['name' => 'visa.edit', 'guard_name' => 'web', 'group_name' => 'Visa'],
            // ['name' => 'visa.delete', 'guard_name' => 'web', 'group_name' => 'Visa'],

            ['name' => 'passport.view', 'guard_name' => 'web', 'group_name' => 'Passport'],
            ['name' => 'passport.create', 'guard_name' => 'web', 'group_name' => 'Passport'],
            ['name' => 'passport.edit', 'guard_name' => 'web', 'group_name' => 'Passport'],
            // ['name' => 'passport.delete', 'guard_name' => 'web', 'group_name' => 'Passport'],
            
            ['name' => 'agents.view', 'guard_name' => 'web', 'group_name' => 'Agents'],
            ['name' => 'agents.create', 'guard_name' => 'web', 'group_name' => 'Agents'],
            ['name' => 'agents.edit', 'guard_name' => 'web', 'group_name' => 'Agents'],
            ['name' => 'agents.report', 'guard_name' => 'web', 'group_name' => 'Agents'],
            
            // ['name' => 'agents.delete', 'guard_name' => 'web', 'group_name' => 'Agents'],
            
            ['name' => 'expenses.category.view', 'guard_name' => 'web', 'group_name' => 'Expenses_Category'],
            ['name' => 'expenses.category.create', 'guard_name' => 'web', 'group_name' => 'Expenses_Category'],
            ['name' => 'expenses.category.edit', 'guard_name' => 'web', 'group_name' => 'Expenses_Category'],
            // ['name' => 'expenses.category.delete', 'guard_name' => 'web', 'group_name' => 'Expenses_Category'],
            
            ['name' => 'work.all.view', 'guard_name' => 'web', 'group_name' => 'Work'],
            ['name' => 'work.single.view', 'guard_name' => 'web', 'group_name' => 'Work'],
            ['name' => 'work.create', 'guard_name' => 'web', 'group_name' => 'Work'],
            ['name' => 'work.edit', 'guard_name' => 'web', 'group_name' => 'Work'],
            ['name' => 'work.edit.status', 'guard_name' => 'web', 'group_name' => 'Work'],
            // ['name' => 'work.delete', 'guard_name' => 'web', 'group_name' => 'Work'],

            ['name' => 'income.view', 'guard_name' => 'web', 'group_name' => 'Income'],
            ['name' => 'income.create', 'guard_name' => 'web', 'group_name' => 'Income'],
            //['name' => 'income.edit', 'guard_name' => 'web', 'group_name' => 'Income'],
            ['name' => 'income.delete', 'guard_name' => 'web', 'group_name' => 'Income'],

            ['name' => 'expenses.view', 'guard_name' => 'web', 'group_name' => 'Expenses'],
            ['name' => 'expenses.create', 'guard_name' => 'web', 'group_name' => 'Expenses'],
            //['name' => 'expenses.edit', 'guard_name' => 'web', 'group_name' => 'Expenses'],
            ['name' => 'expenses.delete', 'guard_name' => 'web', 'group_name' => 'Expenses'],

            ['name' => 'owners.view', 'guard_name' => 'web', 'group_name' => 'Owners'],
            ['name' => 'owners.create', 'guard_name' => 'web', 'group_name' => 'Owners'],
            ['name' => 'owners.edit', 'guard_name' => 'web', 'group_name' => 'Owners'],
            // ['name' => 'owners.delete', 'guard_name' => 'web', 'group_name' => 'Expenses'],

            ['name' => 'owners.transaction.view', 'guard_name' => 'web', 'group_name' => 'Owners'],
            ['name' => 'owners.transaction.create', 'guard_name' => 'web', 'group_name' => 'Owners'],
            ['name' => 'owners.transaction.delete', 'guard_name' => 'web', 'group_name' => 'Owners'],

            ['name' => 'owners.report', 'guard_name' => 'web', 'group_name' => 'Reports'],

            

            

        ];

        Permission::insert($permissions);

    }
}
