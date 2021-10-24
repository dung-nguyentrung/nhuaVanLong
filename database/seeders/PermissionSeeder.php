<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = [
            [
                'id'    => '1',
                'title' => 'permission_access'
            ],
            [
                'id'    => '2',
                'title' => 'permission_create'
            ],
            [
                'id'    => '3',
                'title' => 'permission_edit'
            ],
            [
                'id'    => '4',
                'title' => 'permission_delete'
            ],
            [
                'id'    => '5',
                'title' => 'permission_show'
            ],
            [
                'id'    => '6',
                'title' => 'role_access'
            ],
            [
                'id'    => '7',
                'title' => 'role_create'
            ],
            [
                'id'    => '8',
                'title' => 'role_edit'
            ],
            [
                'id'    => '9',
                'title' => 'role_delete'
            ],
            [
                'id'    => '10',
                'title' => 'role_show'
            ],
            [
                'id'    => '11',
                'title' => 'admin_access'
            ],
            [
                'id'    => '12',
                'title' => 'user_access'
            ],
            [
                'id'    => '13',
                'title' => 'user_create'
            ],
            [
                'id'    => '14',
                'title' => 'user_edit'
            ],
            [
                'id'    => '15',
                'title' => 'user_delete'
            ],
            [
                'id'    => '16',
                'title' => 'user_show'
            ],
            [
                'id'    => '17',
                'title' => 'category_access'
            ],
            [
                'id'    => '18',
                'title' => 'category_create'
            ],
            [
                'id'    => '19',
                'title' => 'category_edit'
            ],
            [
                'id'    => '20',
                'title' => 'category_delete'
            ],
            [
                'id'    => '21',
                'title' => 'category_show'
            ],
            [
                'id'    => '22',
                'title' => 'product_access'
            ],
            [
                'id'    => '23',
                'title' => 'product_create'
            ],
            [
                'id'    => '24',
                'title' => 'product_edit'
            ],
            [
                'id'    => '25',
                'title' => 'product_delete'
            ],
            [
                'id'    => '26',
                'title' => 'product_show'
            ],
            [
                'id'    => '27',
                'title' => 'product_restore'
            ],
            [
                'id'    => '28',
                'title' => 'post_category_access'
            ],
            [
                'id'    => '29',
                'title' => 'post_category_create'
            ],
            [
                'id'    => '30',
                'title' => 'post_category_edit'
            ],
            [
                'id'    => '31',
                'title' => 'post_category_delete'
            ],
            [
                'id'    => '32',
                'title' => 'post_category_show'
            ],
            [
                'id'    => '33',
                'title' => 'tag_access'
            ],
            [
                'id'    => '34',
                'title' => 'tag_create'
            ],
            [
                'id'    => '35',
                'title' => 'tag_edit'
            ],
            [
                'id'    => '36',
                'title' => 'tag_delete'
            ],
            [
                'id'    => '37',
                'title' => 'tag_show'
            ],
            [
                'id'    => '38',
                'title' => 'post_access'
            ],
            [
                'id'    => '39',
                'title' => 'post_create'
            ],
            [
                'id'    => '40',
                'title' => 'post_edit'
            ],
            [
                'id'    => '41',
                'title' => 'post_delete'
            ],
            [
                'id'    => '42',
                'title' => 'post_show'
            ],
            [
                'id'    => '43',
                'title' => 'post_restore'
            ],
            [
                'id'    => '44',
                'title' => 'order_access'
            ],
            [
                'id'    => '45',
                'title' => 'order_create'
            ],
            [
                'id'    => '46',
                'title' => 'order_edit'
            ],
            [
                'id'    => '47',
                'title' => 'order_delete'
            ],
            [
                'id'    => '48',
                'title' => 'order_show'
            ],
            [
                'id'    => '49',
                'title' => 'testimonial_access'
            ],
            [
                'id'    => '50',
                'title' => 'testimonial_create'
            ],
            [
                'id'    => '51',
                'title' => 'testimonial_edit'
            ],
            [
                'id'    => '52',
                'title' => 'testimonial_delete'
            ],
            [
                'id'    => '53',
                'title' => 'testimonial_show'
            ],
            [
                'id'    => '54',
                'title' => 'setting_access'
            ],
        ];

        Permission::insert($permission);
    }
}
