<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DefaultAdminSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'shop_name'     => 'Silver Sheen',
            'slug'          => 'silver-sheen',
            'owner_name'    => 'Demo Subscriber',
            'email'         => 'admin@silversheen.com',
            'password_hash' => password_hash('password123', PASSWORD_DEFAULT),
            'subscription_status' => 'active',
            'created_at'    => date('Y-m-d H:i:s'),
            'updated_at'    => date('Y-m-d H:i:s'),
        ];

        // Using Query Builder
        $this->db->table('admins')->insert($data);
    }
}
