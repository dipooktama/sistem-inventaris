<?php

namespace App\Http\Controllers;

use App\Models\DeviceActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Webpatser\Uuid\Uuid;

class DeviceActivityController extends Controller
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

    public function store(Request $request) {
        try {
            Log::info($request);
            $validatedData = $request->validate([
                'activities' => 'required',
                'hasil' => 'required',
            ]);

            $makeId = Uuid::generate();
            $validatedData['id'] = $makeId;

            $device_id = $request->input('device');
            $validatedData['device_uuid'] = $device_id;

            Log::info($validatedData);
            DeviceActivity::create($validatedData);

            return redirect('/communication/detail?device=' . $device_id)->with('success', 'the data is successfully inputted');
        } catch(\Exception $e) {
            Log::error($e);
            return redirect()->back()->with('error', 'An error occurred while processing your request.');
        }
    }
}
