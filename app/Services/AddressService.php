<?php

namespace App\Services;

use App\Models\Address;
use App\Repositories\AddressRepository;
use App\Services\Contract\AddressServiceContract;

class AddressService implements AddressServiceContract
{
    public function __construct(protected AddressRepository $addressRepository) {}

    public function create(array $data): Address
    {
        return $this->addressRepository->createAddress($data);
    }

    public function update(int $id, array $data): Address
    {
        return $this->addressRepository->updateAddress($id, $data);
    }

    public function getByUser(int $userId): ?Address
    {
        return $this->addressRepository->findByUser($userId);
    }
}
