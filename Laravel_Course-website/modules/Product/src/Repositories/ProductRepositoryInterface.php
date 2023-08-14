<?php

namespace Modules\Product\src\Repositories;

use App\Repositories\RepositoryInterface;

interface ProductRepositoryInterface extends RepositoryInterface
{
    //Lấy danh sách người dùng
    public function getProducts();
}
