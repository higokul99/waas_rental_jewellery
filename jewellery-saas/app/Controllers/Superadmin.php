<?php

namespace App\Controllers;

class Superadmin extends BaseController
{
    public function index(): string
    {
        return view('superadmin/index');
    }
}
