<?php

namespace Modules\Dashboard\src\Repositories;

use App\Repositories\RepositoryInterface;

interface DashboardRepositoryInterface extends RepositoryInterface
{
    //Lấy danh sách người dùng
    public function getDashboards();
}
