<?php

namespace App\Repositories\Contracts;

use App\Models\Address;

interface AddressRepositoryContract
{
    public function createAddress(array $data): Address;
    public function updateAddress(int $id, array $data): Address;
    public function findByUser(int $userId);
}
