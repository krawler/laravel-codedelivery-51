<?php
/**
 * Created by PhpStorm.
 * User: rafaelaugust
 * Date: 18/05/2016
 * Time: 14:46
 */

namespace CodeDelivery\Services;


use CodeDelivery\Repositories\ClientRepository;
use CodeDelivery\Repositories\UserRepository;

class ClientService {

    private $userRepository;

    private $clientRepository;

    public function __construct(ClientRepository $clientRepository, UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
        $this->clientRepository = $clientRepository;
    }

    public function update(array $data, $id)
    {
        $this->clientRepository->update($data, $id);
        $userId = $this->clientRepository->find($id,['user_id'])->user_id;
        $this->userRepository->update($data['user'],$userId);
    }

    public function create(array $data)
    {
        $data['user']['password'] = bcrypt(123456);
        $user = $this->userRepository->create($data['user']);
        $data['user_id'] = $user->id;
        $this->clientRepository->create($data);
    }
}