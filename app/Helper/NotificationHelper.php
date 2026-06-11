<?php

namespace App\Helper;

use App\Models\Notification;
use App\Models\User;

class NotificationHelper
{
    /**
     * Kirim notifikasi ke semua user yang memiliki Role tertentu.
     *
     * @param string $roleName (Contoh: 'Staff LPPM', 'LppmKetua')
     * @param string $title
     * @param string $message
     * @param int|null $refId (Opsional: ID referensi buku/kegiatan)
     * @param string $type ('Info', 'Sukses', 'Peringatan', 'Error')
     */
    public static function sendToRole($roleName, $title, $message, $refId = null, $type = 'Info')
    {
        // 1. Cari user berdasarkan Role
        // Jika kamu pakai Spatie Permission:
        // $users = User::role($roleName)->get(); 
        
        // Jika kamu pakai kolom 'role' atau 'usertype' biasa di tabel users:
        // Sesuaikan 'role' dengan nama kolom di tabel users kamu (misal: roles, role_name, dll)
        $users = User::whereHas('roles', function($q) use ($roleName) {
            $q->where('name', $roleName);
        })->get();

        // JIKA KEGAGALAN (Users kosong), uncomment baris bawah untuk debug manual pakai where biasa:
        // $users = User::where('role', $roleName)->get();

        // 2. Loop dan simpan ke database notifikasi
        foreach ($users as $user) {
            Notification::create([
                'user_id' => $user->id,
                'title'   => $title,
                'message' => $message,
                'type'    => $type,
                'is_read' => false,
                // 'ref_id' => $refId // Jika kamu menambahkan kolom ref_id di tabel notification nanti
            ]);
        }
    }
    
    /**
     * Kirim notifikasi ke satu user spesifik (opsional, untuk kegunaan lain)
     */
    public static function sendToUser($userId, $title, $message, $type = 'Info')
    {
        Notification::create([
            'user_id' => $userId,
            'title'   => $title,
            'message' => $message,
            'type'    => $type,
            'is_read' => false,
        ]);
    }
}