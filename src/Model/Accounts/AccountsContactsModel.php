<?php
namespace App\Model\Accounts;

class AccountsContactsModel
{
    public int $id;
    public string $firstName;
    public string $lastName;
    public string $fullName;

    public function __construct(int $id, string $firstName, string $lastName, string $fullName)
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->fullName = $fullName;
    }

}