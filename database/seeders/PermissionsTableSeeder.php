<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'course_create',
            ],
            [
                'id'    => 18,
                'title' => 'course_edit',
            ],
            [
                'id'    => 19,
                'title' => 'course_show',
            ],
            [
                'id'    => 20,
                'title' => 'course_delete',
            ],
            [
                'id'    => 21,
                'title' => 'course_access',
            ],
            [
                'id'    => 22,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 23,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 24,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 25,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 26,
                'title' => 'faq_management_access',
            ],
            [
                'id'    => 27,
                'title' => 'faq_category_create',
            ],
            [
                'id'    => 28,
                'title' => 'faq_category_edit',
            ],
            [
                'id'    => 29,
                'title' => 'faq_category_show',
            ],
            [
                'id'    => 30,
                'title' => 'faq_category_delete',
            ],
            [
                'id'    => 31,
                'title' => 'faq_category_access',
            ],
            [
                'id'    => 32,
                'title' => 'faq_question_create',
            ],
            [
                'id'    => 33,
                'title' => 'faq_question_edit',
            ],
            [
                'id'    => 34,
                'title' => 'faq_question_show',
            ],
            [
                'id'    => 35,
                'title' => 'faq_question_delete',
            ],
            [
                'id'    => 36,
                'title' => 'faq_question_access',
            ],
            [
                'id'    => 37,
                'title' => 'lesson_create',
            ],
            [
                'id'    => 38,
                'title' => 'lesson_edit',
            ],
            [
                'id'    => 39,
                'title' => 'lesson_show',
            ],
            [
                'id'    => 40,
                'title' => 'lesson_delete',
            ],
            [
                'id'    => 41,
                'title' => 'lesson_access',
            ],
            [
                'id'    => 42,
                'title' => 'account_access',
            ],
            [
                'id'    => 43,
                'title' => 'bank_detail_create',
            ],
            [
                'id'    => 44,
                'title' => 'bank_detail_edit',
            ],
            [
                'id'    => 45,
                'title' => 'bank_detail_show',
            ],
            [
                'id'    => 46,
                'title' => 'bank_detail_delete',
            ],
            [
                'id'    => 47,
                'title' => 'bank_detail_access',
            ],
            [
                'id'    => 48,
                'title' => 'payment_method_create',
            ],
            [
                'id'    => 49,
                'title' => 'payment_method_edit',
            ],
            [
                'id'    => 50,
                'title' => 'payment_method_show',
            ],
            [
                'id'    => 51,
                'title' => 'payment_method_delete',
            ],
            [
                'id'    => 52,
                'title' => 'payment_method_access',
            ],
            [
                'id'    => 53,
                'title' => 'payment_create',
            ],
            [
                'id'    => 54,
                'title' => 'payment_edit',
            ],
            [
                'id'    => 55,
                'title' => 'payment_show',
            ],
            [
                'id'    => 56,
                'title' => 'payment_delete',
            ],
            [
                'id'    => 57,
                'title' => 'payment_access',
            ],
            [
                'id'    => 58,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
