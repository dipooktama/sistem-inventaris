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

    public function store(Request $request) {
        try {
            Log::info($request);
            $validatedData = $request->validate([
                'name' => 'required',
                'merk_type' => 'required',
                'freq' => 'required',
            ]);

            $makeId = Uuid::generate();
            $validatedData['id'] = $makeId;

            $validatedData['group'] = $request->input('group');

            Log::info($validatedData);

            Device::create($validatedData);

            return redirect('/'.$request->input('group'))->with('success', 'the data is successfully inputted');
        } catch(\Exception $e) {
            Log::error($e);
            return redirect()->back()->with('error', 'An error occurred while processing your request.');
        }
    }

    public function update(Request $request) {
        try {
            Log::info($request);
            $validatedData = $request->validate([
                'name' => 'required',
                'merk_type' => 'required',
                'freq' => 'required',
            ]);

            $device_id = $request->input('device');

            $device = Device::find($device_id);

            if (!$device) {
                return redirect('/'.$request->input('group'))->with('error', 'Device not found.');
            }

            Log::info($validatedData);

            $device->update($validatedData);

            return redirect('/'.$request->input('group'))->with('success', 'the data is successfully inputted');
        } catch(\Exception $e) {
            Log::error($e);
            return redirect()->back()->with('error', 'An error occurred while processing your request.');
        }
    }

    public function delete(Request $request) {
        try {
            Log::info($request);

            $device_id = $request->input('device');

            $deviceToBeDeleted = Device::findOrFail($device_id);

            if(!$deviceToBeDeleted) {
                return redirect('/'.$request->input('group'))->with('error', 'Device not found.');
            }

            $deviceToBeDeleted->delete();

            return redirect('/'.$request->input('group'))->with('success', 'The Device had been deleted.');
        } catch(\Exception $e) {
            Log::error($e);
            return redirect()->back()->with('error', 'An error occurred while processing your request.');
        }
    }
}
