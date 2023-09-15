<?php

namespace App\Http\Controllers;

use App\Models\DeviceActivity;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public $siteName;
    public $navMenu;

    public function __construct() {
        $this->siteName = env('APP_NAME', 'sinta');
        $this->navMenu = [
            ['name' => 'Dashboard', 'route' => '/'],
            ['name' => 'Communication', 'route' => '/communication'],
            ['name' => 'Navigation', 'route' => '/navigation'],
            ['name' => 'Surveilance', 'route' => '/surveilance'],
            ['name' => 'Data Processing/Automation', 'route' => '/automation'],
            ['name' => 'Support', 'route' => '/support'],
        ];
    }
    // Home dashboard
    public function homeDashboard() {
        return view('dashboard-home', [
            'siteName' => $this->siteName,
            'navMenu' => $this->navMenu,
        ]);
    }

    // Communication dashboard
    public function comDashboard() {
        //$listCom = DeviceActivity::where('group', 'COMMUNICATION')->get();
        $listCom = DeviceActivity::all();
        return view('dashboard-communication', [
            'siteName' => $this->siteName,
            'navMenu' => $this->navMenu,
            'listCom' => $listCom,
        ]);
    }
}
