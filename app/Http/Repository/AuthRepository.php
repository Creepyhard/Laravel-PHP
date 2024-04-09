<?php

namespace App\Http\Repository;

use App\Models\User;
use Spatie\QueryBuilder\QueryBuilder;

class AuthRepository
{
    private User $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function findById(int $id): ?User {
        $user = QueryBuilder::for(User::class)
            ->where('uuid', $id)
            ->first();

        return $user;
    }

    public function store(array $data): User {
        return $this->model->create($data);
    }

    public function update(int $id, array $data): bool {
        $vehicle = $this->findById($id);

        if(!$vehicle) {
            return false;
        }

        return $vehicle->update($data);
    }
}
