<?php
namespace App\Mapper\Accounts;

use App\Model\Accounts\AccountsContactsModel;

class AccountsContactsMapper
{
    public function mapToModel(array $data): AccountsContactsModel
    {
        $id = $data['id'];
        $firstName = $data['firstName'];
        $lastName = $data['lastName'];
        $fullName = $data['fullName'];

        return new AccountsContactsModel($id, $firstName, $lastName, $fullName);
    }

   

}