<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class FinanceController extends BaseController
{
    protected $helpers = ['admin_template'];

    public function index()
    {
        $data = [
            'title' => "Finance",
        ];

        return render('finance.html', $data);
    }
}