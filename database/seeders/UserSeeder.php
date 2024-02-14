<?php

namespace Database\Seeders;

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
                'roles' => '1',
                'address' => 'Jl Kedawung Lowokwaru Malang',
                'created_at' => now()
            ],
            [
                'name' => 'Drs. Aldy M P.d',
                'email' => 'aldy@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'phone' => '081234567891',
                'roles' => '4',
                'address' => 'Jl Mayjen Panjaitan Lowokwaru Malang',
                'created_at' => now()
            ],
            [
                'name' => 'Kurnia Efendi M P.d',
                'email' => 'kurnia@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'phone' => '08129837458',
                'roles' => '4',
                'address' => 'Jl Borobudur No 78',
                'created_at' => now()
            ],
            [
                'name' => 'Drs. Ari',
                'email' => 'ari@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'phone' => '081234567892',
                'roles' => '4',
                'address' => 'Jl Soekarno Hatta Lowokwaru Malang',
                'created_at' => now()
            ],
            [
                'name' => 'Zulfikar Hasan M.T',
                'email' => 'zulfikar@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'phone' => '0812345233801',
                'roles' => '4',
                'address' => 'Sukun Malang',
                'created_at' => now()
            ],
            [
                'name' => 'Suyatno M.Pd',
                'email' => 'suyatno@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'phone' => '08837242301',
                'roles' => '4',
                'address' => 'Sukun Malang',
                'created_at' => now()
            ],
            [
                'name' => 'Drs. Eko Patrio',
                'email' => 'ekopatrio@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'phone' => '081234567893',
                'roles' => '2',
                'address' => 'Jl Bendungan Sutami Malang',
                'created_at' => now()
            ],
            [
                'name' => 'Drs. Fadhil',
                'email' => 'fadhil@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'phone' => '081234567894',
                'roles' => '2',
                'address' => 'Jl Merdeka No. 4',
                'created_at' => now()
            ],
            [
                'name' => 'Moh. Rafli S.Pd',
                'email' => 'rafli@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'phone' => '08976343232',
                'roles' => '2',
                'address' => 'Jl Bungan Merak No. 7',
                'created_at' => now()
            ],
            [
                'name' => 'Gading Nur S.Pd',
                'email' => 'gading@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'phone' => '089923676238',
                'roles' => '2',
                'address' => 'Jl Cendekiawan No. 15',
                'created_at' => now()
            ],
            [
                'name' => 'Lely Nursusilowait S.Pd',
                'email' => 'lely@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'phone' => '08989239922',
                'roles' => '2',
                'address' => 'Jl Parang No. 17 Lowokwaru',
                'created_at' => now()
            ],
            [
                'name' => 'Drs. Joko Tarman',
                'email' => 'joko@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'phone' => '089819238992',
                'roles' => '5',
                'address' => 'Jl Delima No. 9 Blimbing',
                'created_at' => now()
            ],
            [
                'name' => 'Andrea M.Pd',
                'email' => 'andrea@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'phone' => '0812344582226',
                'roles' => '5',
                'address' => 'Jl Garuda Indonesia No. 9 Surabaya Barat',
                'created_at' => now()
            ],
            [
                'name' => 'Yulia Lorena S.Pd',
                'email' => 'yulis@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'phone' => '089829138674',
                'roles' => '5',
                'address' => 'Jl Salak Timur No 7 Madiun',
                'created_at' => now()
            ],
            [
                'name' => 'Drs. Bambang Sujatmiko',
                'email' => 'bambang@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'phone' => '078989236723',
                'roles' => '5',
                'address' => 'Sukun Malang',
                'created_at' => now()
            ],
            [
                'name' => 'Drs. Aisyah Florentina',
                'email' => 'aisyah@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'phone' => '081234567895',
                'roles' => '5',
                'address' => 'Jl Delima Malang',
                'created_at' => now()
            ],
            [
                'name' => 'Putri',
                'email' => 'putri@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'phone' => '081234567897',
                'roles' => '6',
                'address' => 'Jl Pahlawan Kecil No. 45',
                'created_at' => now()
            ],
            [
                'name' => 'Rizki Nugraha',
                'email' => 'rizkinghagsd@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'phone' => '081234567800',
                'roles' => '6',
                'address' => 'Jl Gatot Subroto No. 87',
                'created_at' => now()
            ],
            [
                'name' => 'Siti Amelia Puspitasari',
                'email' => 'itisamel23@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'phone' => '081234567801',
                'roles' => '6',
                'address' => 'Jl Diponegoro No. 56',
                'created_at' => now()
            ],
            [
                'name' => 'Prisma Jutari',
                'email' => 'prismarjutari@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'phone' => '081234567802',
                'roles' => '6',
                'address' => 'Perum Merjosari malang',
                'created_at' => now()
            ],
            [
                'name' => 'Budi Doremi Fa Solasi',
                'email' => 'budisolsol@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'phone' => '081234567803',
                'roles' => '6',
                'address' => 'Jl Pasar Blimbing ',
                'created_at' => now()
            ],
            [
                'name' => 'Cahya Purbaningrum Sari',
                'email' => 'sari69@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'phone' => '081234567804',
                'roles' => '6',
                'address' => 'Jl Gatot Subroto No. 4',
                'created_at' => now()
            ],
            [
                'name' => 'Laurentcya Sinaga',
                'email' => 'orenciya@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'phone' => '081234567897',
                'roles' => '6',
                'address' => 'Jl Kembang No 8 Turi Lowokwaru',
                'created_at' => now()
            ],
            [
                'name' => 'Rizal Pradana',
                'email' => 'pradana@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'phone' => '07988793241',
                'roles' => '6',
                'address' => 'Jl Gatot Kaca No 24',
                'created_at' => now()
            ],
            [
                'name' => 'Cia Nara',
                'email' => 'cia@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'phone' => '078273423445',
                'roles' => '6',
                'address' => 'Jl Soekarno Hatta No 115',
                'created_at' => now()
            ],
            [
                'name' => 'Ananda Zulfa',
                'email' => 'anandada@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'phone' => '09788738434',
                'roles' => '6',
                'address' => 'Jl Margatama Gang 7 No 41',
                'created_at' => now()
            ],
            [
                'name' => 'Dyah Rachmawati',
                'email' => 'dyah@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'phone' => '081674957534',
                'roles' => '7',
                'address' => 'Jl Wijaya Kusuma No. 36',
                'created_at' => now()
            ],
            [
                'name' => 'Melani C',
                'email' => 'melani@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'phone' => '089636453873',
                'roles' => '7',
                'address' => 'Jl Raya Pandeglang Kebun Teh No. 7',
                'created_at' => now()
            ],
        ];
        DB::table('users')->insert($data);
    }
}
