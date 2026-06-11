<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the migrations.
     */
    public function run(): void
    {
<<<<<<< Updated upstream
<<<<<<< Updated upstream
        // 1. Ambil ID User Utama dari .env
        // Jika di .env kosong, pakai default '12e0...' (Punya Anda)
        $mainUserId = env('DEV_DEFAULT_USER_ID', '12e091b8-f227-4a58-8061-dc4a100c60f1');

        // 2. Buat User Utama (Dosen yang Login)
        User::create([
            'id' => $mainUserId, 
            'name' => 'Abdullah Ubaid',
            'email' => 'dosen@del.ac.id',
            'password' => Hash::make('password'),
        ]);

        // 3. Dosen Dummy 1 (Budi)
        User::create([
            'id' => '22e091b8-f227-4a58-8061-dc4a100c60f2',
            'name' => 'Dr. Budi Santoso',
            'email' => 'budi@del.ac.id',
            'password' => Hash::make('password'),
        ]);

        // 4. Dosen Dummy 2 (Siti)
        User::create([
            'id' => '33e091b8-f227-4a58-8061-dc4a100c60f3',
            'name' => 'Siti Aminah, M.T.',
            'email' => 'siti@del.ac.id',
            'password' => Hash::make('password'),
        ]);

        // 4. Dosen Dummy 3
        User::create([
            'id' => '44e091b8-f227-4a58-8061-dc4a100c60f4',
            'name' => 'Prof. Rahmat Hidayat',
            'email' => 'rahmat@del.ac.id',
            'password' => Hash::make('password'),
        ]);
=======
        // 1. Ambil ID User Utama dari .env (ID Admin/Anda)
        $mainUserId = env('DEV_DEFAULT_USER_ID', '12e091b8-f227-4a58-8061-dc4a100c60f1');
>>>>>>> Stashed changes

=======
        // 1. Ambil ID User Utama dari .env (ID Admin/Anda)
        $mainUserId = env('DEV_DEFAULT_USER_ID', '12e091b8-f227-4a58-8061-dc4a100c60f1');

>>>>>>> Stashed changes
        // Buat User Utama (Admin)

        // 2. Definisi User Dosen (Harus sama ID-nya dengan yang ada di seed.ts)
        $dosenUsers = [
            [
                'id' => '22e091b8-f227-4a58-8061-dc4a100c60f2',
                'name' => 'Budi Dosen',
                'email' => 'budi@del.ac.id',
            ],
            [
                'id' => '33e091b8-f227-4a58-8061-dc4a100c60f3',
                'name' => 'Siti Dosen',
                'email' => 'siti@del.ac.id',
            ],
            [
                'id' => '44e091b8-f227-4a58-8061-dc4a100c60f4',
                'name' => 'Rahmat Dosen',
                'email' => 'rahmat@del.ac.id',
            ],
        ];

        // Loop untuk membuat user dosen jika belum ada
        foreach ($dosenUsers as $user) {
            User::firstOrCreate(
                ['id' => $user['id']], // Cari berdasarkan ID (Primary Key)
                [
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'password' => Hash::make('password'),
                ]
            );
        }
    }
}