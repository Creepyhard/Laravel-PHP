<?php

namespace App\Http\Services;

use App\Http\Repository\AuthRepository;
use Illuminate\Contracts\Auth\Access\Authorizable;
use Illuminate\Http\Request;

class AuthServices
{
    protected $authRepository;

    public function __construct(AuthRepository $_authRepository) {
        $this->authRepository = $_authRepository;
    }

    public function findById(string $id) {
        return $this->authRepository->findById($id);
    }

    public function updateMoney(int $id, Request $request) {
        $payer = $this->authRepository->findById($request->input('payer'));
        $payee = $this->authRepository->findById($request->input('payee'));
        $data = $request->all();
        if ($payer->where('type_id') == 1 && $payer->where('money') >= $request->input('value')) {
            //consult mock
            //create transaction
            //send notification payment
        }
        return $this->authRepository->update($id, $data);
    }

}
