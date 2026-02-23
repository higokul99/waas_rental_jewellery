<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class CustomerAuth extends Controller
{
    /**
     * Display the customer login page.
     * URL: /login
     */
    public function login()
    {
        return view('themes/silversheen/login');
    }

    /**
     * Handle login form submission (phone + PIN).
     * For now this is a stub that always redirects back with an error if fields are empty.
     */
    public function attemptLogin()
    {
        $phone = $this->request->getPost('phone');
        $pin   = $this->request->getPost('pin');

        if (! preg_match('/^\d{10}$/', $phone) || ! preg_match('/^\d{4}$/', $pin)) {
            return redirect()->back()->with('error', 'Please enter a valid 10‑digit phone number and 4‑digit PIN.');
        }

        // TODO: add authentication logic here (lookup user by phone, verify PIN, set session, etc.)
        // For now we'll just redirect back with a success flash or error.
        return redirect()->back()->with('error', 'Login functionality not implemented yet.');
    }

    /**
     * Display registration page (stub).
     */
    public function register()
    {
        return view('themes/silversheen/register');
    }
}
