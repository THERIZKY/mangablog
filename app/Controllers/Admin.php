<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard Admin || OsanagoManga'
        ];

        return view('admin/index', $data);
    }
}
