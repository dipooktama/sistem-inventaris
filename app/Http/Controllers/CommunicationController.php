<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\DeviceActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Webpatser\Uuid\Uuid;

class CommunicationController extends Controller
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
        $listDevice = Device::select('id', 'name')->get();
        return view('communication.create', [
            'siteName' => $this->siteName,
            'navMenu' => $this->navMenu,
            'listDevice' => $listDevice,
        ]);
    }

    public function store(Request $request) {
        try {
            Log::info($request);
            $validatedData = $request->validate([
            'device_uuid' => 'required', // Validate UUID format
            'activities' => 'required',
            'minutes' => 'required|integer',
            'time_category' => 'required|in:daily,weekly,monthly,yearly',
            'total_minutes_in_year' => 'required|integer',
            ]);

            $makeId = Uuid::generate();

            $validatedData['id'] = $makeId;

            Log::info($validatedData);

            DeviceActivity::create($validatedData);

            return redirect('/communication')->with('success', 'Device activity has been added.');
        }
        catch (\Exception $e) {
            Log::error($e);
            return redirect()->back()->with('error', 'An error occurred while processing your request.');
        }
    }
}
