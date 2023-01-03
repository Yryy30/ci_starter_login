<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\UsersModel;

class Users extends Seeder
{
    public function run()
    {
        $user_object = new UsersModel();
		$user_object->insertBatch([
			 [
			 "name" => "Yryy",
			 "email" => "admin@mail.com",
			 "phone" => "9988776655",
			 "role" => "admin",
			 "password" => password_hash("admin123", PASSWORD_DEFAULT)
			 ],
			 [
			 "name" => "ReiiG",
			 "email" => "operator@mail.com",
			 "phone" => "8888888888",
			 "role" => "operator",
			 "password" => password_hash("operator123", PASSWORD_DEFAULT)
			 ]
		 ]);
    }
}
