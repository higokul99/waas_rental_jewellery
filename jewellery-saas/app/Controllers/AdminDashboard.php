<?php

namespace App\Controllers;

class AdminDashboard extends BaseController
{
    public function index(): string
    {
        // Load the customized Shopify Polaris view
        return view('dashboard/shopify_clone');
    }
}
