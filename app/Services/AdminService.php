<?php

 namespace App\Services;

 use App\Models\Admin;
 use App\Services\Service;
 use Illuminate\Support\Facades\Auth;
 use Illuminate\Support\Facades\Hash;

 class AdminService extends Service
{

 	public function model()
	{
        $this->model = Admin::class;
	}

     public function register(array $data): Admin
     {
         $data['password'] = Hash::make($data['password']);

         return Admin::create($data);
     }

     public function login(array $data)
     {
         $admin = Admin::query()->where('email', $data['email'])->first();

         if (!$admin) {
             abort(401, trans('messages.not_found_admin'));
         }

         $checkPassword = Hash::check($data['password'], $admin->password);
         if (!$checkPassword) {
             abort(401, trans('messages.not_found_admin'));
         }

         Auth::guard('admins')->loginUsingId($admin->id);

         return $admin;
     }

     public function update(Admin $admin, array $data): Admin
     {
         $admin->update($data);

         return $admin;
     }

 }
