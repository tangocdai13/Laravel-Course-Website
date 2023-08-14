<?php

namespace Modules\User\src\Http\Controllers;

use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        return view('user::lists', [
            'pageTitle' => 'Quản lý người dùng',
        ]);
    }

    public function create()
    {
        return view('user::add', [
            'pageTitle' => 'Thêm người dùng',
        ]);
    }
}
