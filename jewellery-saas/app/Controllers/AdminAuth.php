<?php

namespace App\Controllers;

class AdminAuth extends BaseController
{
    public function login(): string
    {
        return view('admin/login');
    }

    public function attemptLogin()
    {
        // Placeholder for authentication logic
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $adminModel = new \App\Models\AdminModel();
        $admin = $adminModel->where('email', $email)->first();

        if ($admin && password_verify($password, $admin['password_hash'])) {
            // Set Session Data
            session()->set([
                'isLoggedIn' => true,
                'role'       => 'admin',
                'adminId'    => $admin['id'],
                'shopSlug'   => $admin['slug'],
                'shopName'   => $admin['shop_name'],
            ]);
            return redirect()->to(base_url('admin/dashboard'))->with('message', 'Logged in successfully!');
        }

        return redirect()->back()->with('error', 'Invalid email or password.');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('admin'));
    }
}
