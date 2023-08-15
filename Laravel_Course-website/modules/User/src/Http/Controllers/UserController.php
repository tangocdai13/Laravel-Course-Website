<?php

namespace Modules\User\src\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\User\src\Models\User;

class UserController extends Controller
{
    protected $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function index()
    {
        return view('user::lists', [
            'pageTitle' => 'Quản lý người dùng',
            'lists' => $this->user->orderBy('id', 'desc')->get()
        ]);
    }

    public function create()
    {
        return view('user::add', [
            'pageTitle' => 'Thêm người dùng',
        ]);
    }
}
