<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class UsersController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    { 
        $this->authorize('view', Role::class);
        $users = User::all();

        $this->content = view('admin.users.index', ['users' => $users])->render();
        return $this->renderOutput();
    }

    public function edit(User $user)
    {
        $this->content = view('admin.users.edit', ['user' => $user])->render();
        return $this->renderOutput();
    }

    public function update(Request $request, User $user)
    { 
        $user->update($request->only($user->getFillable()));
        return redirect()->route('admin.users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index');
    }
}
