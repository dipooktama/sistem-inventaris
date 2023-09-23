<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Webpatser\Uuid\Uuid;

class UserController extends Controller
{
    public $siteName;
    public $navMenu;
    public $group;

    public function __construct() {
        $this->siteName = env('APP_NAME', 'sinta');
        $this->navMenu = [
            ['name' => 'Dashboard', 'route' => '/'],
            ['name' => 'Communication', 'route' => '/communication'],
            ['name' => 'Navigation', 'route' => '/navigation'],
            ['name' => 'Surveillance', 'route' => '/surveillance'],
            ['name' => 'Data Processing/Automation', 'route' => '/automation'],
            ['name' => 'Support', 'route' => '/support'],
        ];
        $this->group = 'user';
    }

    // User dashboard
    public function index() {
        $listUser = User::all();
        return view('user.index', [
            'siteName' => $this->siteName,
            'navMenu' => $this->navMenu,
            'listUser' => $listUser,
            'group' => $this->group,
        ]);
    }

    public function create() {
        $actionUrl = '/admin/user/store';
        return view('user.create',[
            'siteName' => $this->siteName,
            'navMenu' => $this->navMenu,
            'group' => $this->group,
            'actionUrl' => $actionUrl,
            'listRole' => ['user', 'admin'],
        ]);
    }

    public function store(Request $request) {
        try {
            Log::info($request);
            $validatedData = $request->validate([
                'username' => 'required',
                'password' => 'required',
                'name' => 'required',
                'position' => 'nullable',
                'role' => 'required',
            ]);

            $makeId = Uuid::generate();
            $validatedData['id'] = $makeId;

            $makePassword = Hash::make($validatedData['password']);
            $validatedData['password'] = $makePassword;

            Log::info($validatedData);

            User::create($validatedData);

            return redirect('/admin/user')->with('success', 'successfully added the user');

        } catch(\Exception $e) {
            Log::error($e);
            return redirect()->back()->with('error', 'An error occurred while processing your request.');
        }
    }
}