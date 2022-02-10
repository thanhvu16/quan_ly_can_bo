<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Common\AllPermission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $role = Role::where('name', QUAN_TRI_HT)->first();

        if (empty($role)) {
            $role = Role::create(['name' => QUAN_TRI_HT]);
            $user = \App\User::where('username', 'admin')->update([
                'role_id' => $role->id
            ]);

        }

        //nguoi dung
        $nguoiDung = Permission::findOrCreate(AllPermission::nguoiDung());
        Permission::findOrCreate(AllPermission::themNguoiDung(), $nguoiDung->id);
        Permission::findOrCreate(AllPermission::suaNguoiDung(), $nguoiDung->id);
        Permission::findOrCreate(AllPermission::xoaNguoiDung(), $nguoiDung->id);

        // can bo
        $canBo = Permission::findOrCreate(AllPermission::canBo());
        Permission::findOrCreate(AllPermission::xemCanBo(), $canBo->id);
        Permission::findOrCreate(AllPermission::themCanBo(), $canBo->id);
        Permission::findOrCreate(AllPermission::suaCanBo(), $canBo->id);
        Permission::findOrCreate(AllPermission::xoaCanBo(), $canBo->id);

        if ($role) {
            $permissions = Permission::all();
            $role->syncPermissions($permissions);
        }

    }
}
