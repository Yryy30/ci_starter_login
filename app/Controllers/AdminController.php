<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;

class AdminController extends BaseController
{
    public function __construct()
    {
        if (session()->get('role') != "admin") {
            echo 'Access denied';
            exit;
        }
    }

    public function index()
    {
        return view("admin/dashboard_v");
    }

    public function listUser()
    {
        $userModel = new UsersModel();
        $user = $userModel->findAll();
        
        return view("admin/users/users_v", ["user" => $user,]);
    }

    public function formUser()
    {
        return view("admin/users/formUsers_v");
    }

    //Add User
    public function addUser()
    {
        if($this->request->getPost()){
            $rules = [
                "name" => "required|min_length[3]|max_length[40]",
                "email" => "required|valid_email",
                "password" => "required|min_length[3]|max_length[40]",
                "phone" => "required|min_length[3]|max_length[40]",
                "role" => "required|min_length[3]|max_length[40]",
                "profile_image" => [
                    "rules" => "uploaded[profile_image]|max_size[profile_image,1024]|is_image[profile_image]|mime_in[profile_image,image/jpg,image/jpeg,image/gif,image/png]",
                    "label" => "Profile Image",
                ],
            ];

            if(!$this->validate($rules)){
                return view("admin/users/formUsers_v", ["validation" => $this->validator,]);
            }else{
                $userModel = new UsersModel();
                $file = $this->request->getFile("profile_image");
                $profile_image = $file->getRandomName();
                $pass = $this->request->getVar("password");
                
                if($file->move("images/_profile", $profile_image)){
                    $data = [
                        "name" => $this->request->getVar("name"),
                        "email" => $this->request->getVar("email"),
                        "phone" => $this->request->getVar("phone"),
                        "role" => $this->request->getVar("role"),
                        "password" => password_hash($pass, PASSWORD_DEFAULT),
                        "profile_image" => $profile_image,
                    ];

                    $userModel->save($data);
                    $session = session();
                    $session->setFlashdata("success", "Add User Success");
                    return redirect()->to(base_url("admin/listUser"));
                }

            }

        }
        return view("admin/users/formUsers_v");
    }

    //Update User
    public function updateUser($id = null)
    {
        $userModel = new UsersModel();
        $user = $userModel->where("id", $id)->first();

        if($this->request->getPost()){
            $rules = [
                "name" => "required|min_length[3]|max_length[40]",
                "email" => "required|valid_email",
                "phone" => "required|min_length[3]|max_length[40]",               
            ];

            if(!$this->validate($rules)){
                return view("admin/users/formEdit_v", ["validation" => $this->validator, "user" => $user]);
            }else{                
                $data = [
                    "name" => $this->request->getVar("name"),
                    "email" => $this->request->getVar("email"),
                    "phone" => $this->request->getVar("phone"),
                ];    

                $userModel->update($id, $data);
                $session = session();
                $session->setFlashdata("success", "Edit User Success");
                return redirect()->to(base_url("admin/listUser"));
            }            
        }
        return view("admin/users/formEdit_v", ["user" => $user]);
    }

    //Delete User
    public function deleteUser($id = null)
    {
        $userModel = new UsersModel();
        $img = $userModel->find($id);
        if($img['profile_image']== true){
            unlink('images/_profile/'.$img['profile_image']);
        }
        $user = $userModel->delete($id);

        $session = session();
        $session->setFlashdata("success", "Delete User Success");

        return redirect()->to(base_url('admin/listUser'));
    }
}
