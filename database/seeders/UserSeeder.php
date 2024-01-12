<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class UserSeeder extends Seeder
{

    public function run(): void
    {
        $data = [

            [
                'name' => 'Kanzul',
                'email' => 'kanzul@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'phone' => '081234567890',
                'roles' => 'admin',
                'identity_number' => '205150700111044',
                'address' => 'Jl Kedawung Lowokwaru Malang'
            ],
            [
                'name' => 'Drs. Aldy M P.d',
                'email' => 'aldy@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'phone' => '081234567891',
                'roles' => 'guru',
                'identity_number' => '205150700112344',
                'address' => 'Jl Mayjen Panjaitan Lowokwaru Malang'
            ],
            [
                'name' => 'Drs. Ari',
                'email' => 'ari@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'phone' => '081234567892',
                'roles' => 'guru',
                'identity_number' => '20515070546444',
                'address' => 'Jl Soekarno Hatta Lowokwaru Malang'
            ],
            [
                'name' => 'Drs. Eko Patrio',
                'email' => 'ekopatrio@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'phone' => '081234567893',
                'roles' => 'guru',
                'identity_number' => '205150893284',
                'address' => 'Jl Bendungan Sutami Malang'
            ],
            [
                'name' => 'Drs. Fadhil',
                'email' => 'fadhil@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'phone' => '081234567894',
                'roles' => 'guru',
                'identity_number' => '205152200111055',
                'address' => 'Jl Merdeka No. 33'
            ],
            [
                'name' => 'Drs. Joko Suyatno',
                'email' => 'jokosuyatno@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'phone' => '081234567895',
                'roles' => 'guru',
                'identity_number' => '205152223266',
                'address' => 'Jl Manggis No. 643 Madiun'
            ],
            [
                'name' => 'Drs. Widodo',
                'email' => 'widodo@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'phone' => '081234567896',
                'roles' => 'guru',
                'identity_number' => '205152200111055',
                'address' => 'Jl Lempuyangan No. 11'
            ],
            [
                'name' => 'Aulia',
                'email' => 'aulia@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'phone' => '081234567897',
                'roles' => 'siswa',
                'identity_number' => '205150700111066',
                'address' => 'Jl Pahlawan Kecil No. 45'
            ],
            [
                'name' => 'Rizki',
                'email' => 'rizki@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'phone' => '081234567800',
                'roles' => 'siswa',
                'identity_number' => '205150700111077',
                'address' => 'Jl Gatot Subroto No. 87'
            ],
            [
                'name' => 'Siti',
                'email' => 'siti@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'phone' => '081234567801',
                'roles' => 'siswa',
                'identity_number' => '205150700111088',
                'address' => 'Jl Diponegoro No. 56'
            ],
            [
                'name' => 'Alex',
                'email' => 'alex@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'phone' => '081234567802',
                'roles' => 'siswa',
                'identity_number' => '205150700111342',
                'address' => 'Jl Empu Tantular No. 1'
            ],
            [
                'name' => 'Budi',
                'email' => 'budi@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'phone' => '081234567803',
                'roles' => 'siswa',
                'identity_number' => '205150700111099',
                'address' => 'Jl Panglima Sudirman No. 34'
            ],
            [
                'name' => 'Cahya',
                'email' => 'cahya@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'phone' => '081234567804',
                'roles' => 'siswa',
                'identity_number' => '205150700111009',
                'address' => 'Jl Gatot Subroto No. 4'
            ],
        ];
        DB::table('users')->insert($data);
    }
}
