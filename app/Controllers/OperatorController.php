<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class OperatorController extends BaseController
{
    public function __construct()
    {
        if (session()->get('role') != "operator") {
            echo 'Access denied';
            exit;
        }
    }

    public function index()
    {
        return view("operator/dashboard_v");
    }
}
