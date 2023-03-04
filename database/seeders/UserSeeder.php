<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('users')->delete();
        $user = [
            ['id'=>1,'user_name'=>"admin",'name'=>"admin", 'email'=>"admin@admin.com",'email_verified_at'=>"2023-01-09 18:53:08",'password'=>"$2y$10$0UOlF.QIiZdXnacj56pw1eRV04n/nm0IpIwYM84AL.kUOjVIevA3K", 'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')],
        ];

        User::insert($user);
    }
}
