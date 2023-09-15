<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Webpatser\Uuid\Uuid;

class DeviceController extends Controller
{
    // TO DO: bikin supaya diakses dari dashboard controller aja:
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

    public function create()
    {
        return view('devices.create', [
            'siteName' => $this->siteName,
            'navMenu' => $this->navMenu,
        ]);
    }

    public function store(Request $request) {
        try {
            Log::info($request);
            $validatedData = $request->validate([
                'group' => 'required',
                'name' => 'required',
                'deviceGroup' => 'required'
            ]);

            $makeId = Uuid::generate();

            $validatedData['id'] = $makeId;

            Log::info($validatedData);

            Device::create($validatedData);

            return redirect('/communication');
        }
        catch (\Exception $e) {
            Log::error($e);
            return redirect()->back()->with('error', 'An error occurred while processing your request.');
        }
    }
}
