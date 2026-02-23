<?php

namespace App\Controllers;

class SuperadminDashboard extends BaseController
{
    public function index(): string
    {
        // Load the customized Shopify Polaris view
        return view('dashboard/shopify_clone');
    }
}
