<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ListMenusTableSeeder extends Seeder
{
    /**
     * Auto generated seeder file.
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('list_menus')->delete();
        
        \DB::table('list_menus')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Dashboard',
                'icon' => 'ri-apps-line',
                'route' => '/dashboard',
                'path' => 'Modules/Laboratory/Dashboard',
                'group' => 'Menu',
                'module' => 'Laboratory',
                'order' => 1,
                'has_child' => 0,
                'is_mother' => 1,
                'is_active' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Customers',
                'icon' => 'ri-team-fill',
                'route' => '/customers',
                'path' => 'Modules/Laboratory/Customers',
                'group' => 'Menu',
                'module' => 'Laboratory',
                'order' => 2,
                'has_child' => 0,
                'is_mother' => 1,
                'is_active' => 1,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Quotations',
                'icon' => 'ri-price-tag-3-fill',
                'route' => '/quotations',
                'path' => 'Modules/Laboratory/Quotations',
                'group' => 'Menu',
                'module' => 'Laboratory',
                'order' => 3,
                'has_child' => 0,
                'is_mother' => 1,
                'is_active' => 1,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'TS Requests',
                'icon' => 'ri-hand-coin-fill',
                'route' => '/requests',
                'path' => 'Modules/Laboratory/Tsr',
                'group' => 'Menu',
                'module' => 'Laboratory',
                'order' => 4,
                'has_child' => 0,
                'is_mother' => 1,
                'is_active' => 1,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Insights',
                'icon' => 'ri-line-chart-fill',
                'route' => '',
                'path' => 'Modules/Laboratory/Insights',
                'group' => 'Menu',
                'module' => 'Laboratory',
                'order' => 5,
                'has_child' => 1,
                'is_mother' => 1,
                'is_active' => 1,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Customers',
                'icon' => NULL,
                'route' => '/insights/customers',
                'path' => '/insights/customers',
                'group' => 'Insights',
                'module' => 'Laboratory',
                'order' => 1,
                'has_child' => 0,
                'is_mother' => 0,
                'is_active' => 1,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Laboratories',
                'icon' => '',
                'route' => '/insights/laboratories',
                'path' => '/insights/laboratories',
                'group' => 'Insights',
                'module' => 'Laboratory',
                'order' => 2,
                'has_child' => 0,
                'is_mother' => 0,
                'is_active' => 1,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Reports',
                'icon' => 'ri-file-text-fill',
                'route' => '',
                'path' => 'Modules/Laboratory/Reports',
                'group' => 'Menu',
                'module' => 'Laboratory',
                'order' => 6,
                'has_child' => 1,
                'is_mother' => 1,
                'is_active' => 1,
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Test Reports',
                'icon' => '',
                'route' => '/reports/testreports',
                'path' => '/reports/testreports',
                'group' => 'Reports',
                'module' => 'Laboratory',
                'order' => 1,
                'has_child' => 0,
                'is_mother' => 0,
                'is_active' => 1,
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Sample Register',
                'icon' => '',
                'route' => '/reports/samples',
                'path' => '/reports/samples',
                'group' => 'Reports',
                'module' => 'Laboratory',
                'order' => 2,
                'has_child' => 0,
                'is_mother' => 0,
                'is_active' => 1,
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Dashboard',
                'icon' => 'ri-apps-line',
                'route' => '/inventory',
                'path' => 'Modules/Inventory/Dashboard',
                'group' => 'Menu',
                'module' => 'Inventory',
                'order' => 1,
                'has_child' => 0,
                'is_mother' => 1,
                'is_active' => 1,
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Items',
                'icon' => 'ri-list-check-2',
                'route' => '/inventory/items',
                'path' => 'Modules/Inventory/Items',
                'group' => 'Menu',
                'module' => 'Inventory',
                'order' => 2,
                'has_child' => 0,
                'is_mother' => 1,
                'is_active' => 1,
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Equipments',
                'icon' => 'ri-scales-2-fill',
                'route' => '/inventory/equipments',
                'path' => 'Modules/Inventory/Equipments',
                'group' => 'Menu',
                'module' => 'Inventory',
                'order' => 3,
                'has_child' => 0,
                'is_mother' => 1,
                'is_active' => 1,
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Suppliers',
                'icon' => 'ri-group-2-fill',
                'route' => '/inventory/suppliers',
                'path' => 'Modules/Inventory/Suppliers',
                'group' => 'Menu',
                'module' => 'Inventory',
                'order' => 4,
                'has_child' => 0,
                'is_mother' => 1,
                'is_active' => 1,
            ),
        ));

        
    }
}