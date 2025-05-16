<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\CreateRequest;
use App\Http\Requests\Admin\LoginRequest;
use App\Http\Requests\Admin\UpdateRequest;
use App\Models\Admin;
use App\Services\AdminService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    private const VIEW_PAGE = 'admin.admin.';

    public function __construct(public readonly AdminService $service)
    {}

    public function index(Request $request)
    {
        $data['title'] = trans('messages.admin_index_page');
        $data['admins'] = $this->service->showAll($request->all());

        return view(self::VIEW_PAGE . 'index', compact('data'));
    }

    public function create()
    {
        $data['title'] = trans('messages.admin_register_page_title');

        return view('pages.auth.register', compact('data'));
    }


    public function register(CreateRequest $request)
    {
        $admin = $this->service->register(data: $request->validated());

        Auth::guard('admins')->loginUsingId($admin->id);

        return redirect()->route('home');
    }

    public function loginPage()
    {
        if (Auth::guard('admins')->check()) {
            return redirect()->route('home');
        }

        $data['title'] = trans('messages.admin_login_page_title');

        return view('pages.auth.login', compact('data'));
    }

    public function login(LoginRequest $request)
    {
        $this->service->login(data: $request->validated());

        return redirect()->route('home');
    }

    public function update(Admin $admin, UpdateRequest $request)
    {
        $this->service->update(admin: $admin, data: $request->validated());

        return redirect()->back()->with(key: 'success', value: trans('messages.success '));
    }
}
