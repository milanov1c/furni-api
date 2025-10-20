<?php

namespace App\Repositories;

use App\Models\Address;
use App\Repositories\Contracts\AddressRepositoryContract;

class AddressRepository extends BaseRepository implements AddressRepositoryContract
{
    public function __construct(protected Address $address)
    {
        parent::__construct($address);
    }

    public function createAddress(array $data): Address
    {
        return $this->address->create($data);
    }

    public function updateAddress(int $id, array $data): Address
    {
        $address = $this->address->findOrFail($id);
        $address->update($data);
        return $address;
    }

    public function findByUser(int $userId)
    {
        return $this->address->where('user_id', $userId)->first();
    }
}
