<?php

namespace App\Controllers;

class ThemePreview extends BaseController
{
    public function silversheen(): string
    {
        return view('themes/silversheen/index');
    }

    public function silversheen_story(): string
    {
        return view('themes/silversheen/story');
    }

    public function silversheen_product(): string
    {
        return view('themes/silversheen/product');
    }

    public function products(): string
    {
        return view('themes/silversheen/products');
    }
}
