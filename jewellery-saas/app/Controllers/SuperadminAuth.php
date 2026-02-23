<?php

namespace App\Controllers;

class SuperadminAuth extends BaseController
{
    public function login(): string
    {
        return view('superadmin/login');
    }

    public function attemptLogin()
    {
        // Placeholder for authentication logic
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $superadminModel = new \App\Models\SuperAdminModel();
        $superadmin = $superadminModel->where('email', $email)->first();

        if ($superadmin && password_verify($password, $superadmin['password_hash'])) {
            // Set Session Data
            session()->set([
                'isLoggedIn'   => true,
                'role'         => 'superadmin',
                'superadminId' => $superadmin['id'],
            ]);
            return redirect()->to(base_url('superadmin/dashboard'))->with('message', 'Superadmin logged in successfully!');
        }

        return redirect()->back()->with('error', 'Invalid email or password.');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('superadmin'));
    }
}
