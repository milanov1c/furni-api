<?php

namespace App\Services\Contract;

use App\Models\Address;

interface AddressServiceContract
{
    public function create(array $data): Address;
    public function update(int $id, array $data): Address;
    public function getByUser(int $userId): ?Address;
}
