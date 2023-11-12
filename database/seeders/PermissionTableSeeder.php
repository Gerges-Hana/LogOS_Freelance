<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $permissions = [
      'تعديل الفرع',
      'عرض الفرع',
      'حذف الفرع',
      ' اضافه الفرع',
      'تعديل بيانات Admin',
      'اضافه فئه اصناف',
      'تعديل فئه الاصناف',
      'حذف فئه الاصناف',
      'اضافة صنف',
      'تعديل صنف',
      'حذف صنف',
      'اضافه فئه المصاريف',
      'تعديل فئه المصاريف',
      'حذف فئه المصاريف',
      'اضافه فئه اسعار',
      'تعديل فئه اسعار',
      'حذف فئه اسعار',
      'اعتماد الطلبات',
      'رفض الطلبات',
      'تعديل الطلبات',
      'اضافه مستخدم',
      'عرض مستخدم',
      'حذف مستخدم',
      'الرئسيه',
      'Admin',
      'الفروع',
      'فئات الاصناف',
      'الاصناف',
      'فئات المصاريف',
      'جدول المصاريف',
      'فئات الاسعار',
      'الطلبيات',
      'جدول المبيعات',
      'المستخدمين',
      'عرض صلاحية',
      'اضافة صلاحية',
      'تعديل صلاحية',
      'حذف صلاحية'

    ];

    foreach ($permissions as $permission) {
      Permission::create(['name' => $permission]);
    }
  }
}
