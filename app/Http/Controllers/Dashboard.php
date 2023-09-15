<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\DeviceActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            ['name' => 'Surveillance', 'route' => '/surveillance'],
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

    // Communication
    public function comDashboard() {
        $listDevice = Device::where('group', 'communication')->orderBy('created_at', 'asc')->get();
        return view('dashboard-communication', [
            'siteName' => $this->siteName,
            'navMenu' => $this->navMenu,
            'listCom' => $listDevice,
            'group' => 'communication',
        ]);
    }

    public function comCreate() {
        $group = 'communication';
        $actionUrl = '/communication/store?group=communication';
        return view('konten.create', [
            'siteName' => $this->siteName,
            'navMenu' => $this->navMenu,
            'group' => $group,
            'actionUrl' => $actionUrl,
        ]);
    }

    public function comDetail(Request $request) {
        $group = 'communication';
        $device_id = $request->input('device');
        $device_name = Device::where('id', $device_id)->where('group', $group)->orderBy('created_at', 'asc')->get('name');
        $deviceActivities = DeviceActivity::where('device_uuid', $device_id)->orderBy('created_at', 'asc')->get();
        return view('konten.detail', [
            'siteName' => $this->siteName,
            'navMenu' => $this->navMenu,
            'device' => $device_name[0]->name,
            'device_id' => $device_id,
            'group' => $group,
            'listCom' => $deviceActivities,
        ]);
    }

    public function comCreateActivity(Request $request) {
        $group = 'communication';
        $device_id = $request->input('device');
        $actionUrl = '/communication/storeActivity?device=' . $device_id;
        return view('konten.createActivity', [
            'siteName' => $this->siteName,
            'navMenu' => $this->navMenu,
            'group' => $group,
            'actionUrl' => $actionUrl,
        ]);
    }

    public function comUpdate(Request $request) {
        $group = 'communication';
        $device_id = $request->input('device');
        $actionUrl = '/communication/update?device='.$device_id.'&group='.$group;
        $device = Device::findOrFail($device_id);

        return view('konten.update', [
            'siteName' => $this->siteName,
            'navMenu' => $this->navMenu,
            'group' => $group,
            'actionUrl' => $actionUrl,
            'deviceValues' => $device,
        ]);
    }

    // Navigation
    public function navDashboard() {
        $listDevice = Device::where('group', 'navigation')->orderBy('created_at', 'asc')->get();
        return view('dashboard-navigation', [
            'siteName' => $this->siteName,
            'navMenu' => $this->navMenu,
            'listCom' => $listDevice,
            'group' => 'navigation',
        ]);
    }

    public function navCreate() {
        $group = 'navigation';
        $actionUrl = '/navigation/store?group=navigation';
        return view('konten.create', [
            'siteName' => $this->siteName,
            'navMenu' => $this->navMenu,
            'group' => $group,
            'actionUrl' => $actionUrl,
        ]);
    }

    public function navDetail(Request $request) {
        $group = 'navigation';
        $device_id = $request->input('device');
        $device_name = Device::where('id', $device_id)->where('group', $group)->orderBy('created_at', 'asc')->get('name');
        $deviceActivities = DeviceActivity::where('device_uuid', $device_id)->orderBy('created_at', 'asc')->get();
        return view('konten.detail', [
            'siteName' => $this->siteName,
            'navMenu' => $this->navMenu,
            'device' => $device_name[0]->name,
            'device_id' => $device_id,
            'group' => $group,
            'listCom' => $deviceActivities,
        ]);
    }

    public function navCreateActivity(Request $request) {
        $group = 'navigation';
        $device_id = $request->input('device');
        $actionUrl = '/navigation/storeActivity?device=' . $device_id;
        return view('konten.createActivity', [
            'siteName' => $this->siteName,
            'navMenu' => $this->navMenu,
            'group' => $group,
            'actionUrl' => $actionUrl,
        ]);
    }

    public function navUpdate(Request $request) {
        $group = 'navigation';
        $device_id = $request->input('device');
        $actionUrl = '/navigation/update?device='.$device_id.'&group='.$group;
        $device = Device::findOrFail($device_id);

        return view('konten.update', [
            'siteName' => $this->siteName,
            'navMenu' => $this->navMenu,
            'group' => $group,
            'actionUrl' => $actionUrl,
            'deviceValues' => $device,
        ]);
    }

    // Surveillance
    public function survDashboard() {
        $listDevice = Device::where('group', 'surveillance')->orderBy('created_at', 'asc')->get();
        return view('dashboard-surveillance', [
            'siteName' => $this->siteName,
            'navMenu' => $this->navMenu,
            'listCom' => $listDevice,
            'group' => 'surveillance',
        ]);
    }

    public function survCreate() {
        $group = 'surveillance';
        $actionUrl = '/surveillance/store?group=surveillance';
        return view('konten.create', [
            'siteName' => $this->siteName,
            'navMenu' => $this->navMenu,
            'group' => $group,
            'actionUrl' => $actionUrl,
        ]);
    }

    public function survDetail(Request $request) {
        $group = 'surveillance';
        $device_id = $request->input('device');
        $device_name = Device::where('id', $device_id)->where('group', $group)->orderBy('created_at', 'asc')->get('name');
        $deviceActivities = DeviceActivity::where('device_uuid', $device_id)->orderBy('created_at', 'asc')->get();
        return view('konten.detail', [
            'siteName' => $this->siteName,
            'navMenu' => $this->navMenu,
            'device' => $device_name[0]->name,
            'device_id' => $device_id,
            'group' => $group,
            'listCom' => $deviceActivities,
        ]);
    }

    public function survCreateActivity(Request $request) {
        $group = 'surveillance';
        $device_id = $request->input('device');
        $actionUrl = '/surveillance/storeActivity?device=' . $device_id;
        return view('konten.createActivity', [
            'siteName' => $this->siteName,
            'navMenu' => $this->navMenu,
            'group' => $group,
            'actionUrl' => $actionUrl,
        ]);
    }

    public function survUpdate(Request $request) {
        $group = 'surveillance';
        $device_id = $request->input('device');
        $actionUrl = '/surveillance/update?device='.$device_id.'&group='.$group;
        $device = Device::findOrFail($device_id);

        return view('konten.update', [
            'siteName' => $this->siteName,
            'navMenu' => $this->navMenu,
            'group' => $group,
            'actionUrl' => $actionUrl,
            'deviceValues' => $device,
        ]);
    }

    // automation
    public function autoDashboard() {
        $listDevice = Device::where('group', 'automation')->orderBy('created_at', 'asc')->get();
        return view('dashboard-automation', [
            'siteName' => $this->siteName,
            'navMenu' => $this->navMenu,
            'listCom' => $listDevice,
            'group' => 'automation',
        ]);
    }

    public function autoCreate() {
        $group = 'automation';
        $actionUrl = '/automation/store?group=automation';
        return view('konten.create', [
            'siteName' => $this->siteName,
            'navMenu' => $this->navMenu,
            'group' => $group,
            'actionUrl' => $actionUrl,
        ]);
    }

    public function autoDetail(Request $request) {
        $group = 'automation';
        $device_id = $request->input('device');
        $device_name = Device::where('id', $device_id)->where('group', $group)->orderBy('created_at', 'asc')->get('name');
        $deviceActivities = DeviceActivity::where('device_uuid', $device_id)->orderBy('created_at', 'asc')->get();
        return view('konten.detail', [
            'siteName' => $this->siteName,
            'navMenu' => $this->navMenu,
            'device' => $device_name[0]->name,
            'device_id' => $device_id,
            'group' => $group,
            'listCom' => $deviceActivities,
        ]);
    }

    public function autoCreateActivity(Request $request) {
        $group = 'automation';
        $device_id = $request->input('device');
        $actionUrl = '/automation/storeActivity?device=' . $device_id;
        return view('konten.createActivity', [
            'siteName' => $this->siteName,
            'navMenu' => $this->navMenu,
            'group' => $group,
            'actionUrl' => $actionUrl,
        ]);
    }

    public function autoUpdate(Request $request) {
        $group = 'automation';
        $device_id = $request->input('device');
        $actionUrl = '/automation/update?device='.$device_id.'&group='.$group;
        $device = Device::findOrFail($device_id);

        return view('konten.update', [
            'siteName' => $this->siteName,
            'navMenu' => $this->navMenu,
            'group' => $group,
            'actionUrl' => $actionUrl,
            'deviceValues' => $device,
        ]);
    }

    // Suppport
    public function suppDashboard() {
        $listDevice = Device::where('group', 'support')->orderBy('created_at', 'asc')->get();
        return view('dashboard-support', [
            'siteName' => $this->siteName,
            'navMenu' => $this->navMenu,
            'listCom' => $listDevice,
            'group' => 'support',
        ]);
    }

    public function suppCreate() {
        $group = 'support';
        $actionUrl = '/support/store?group=support';
        return view('konten.create', [
            'siteName' => $this->siteName,
            'navMenu' => $this->navMenu,
            'group' => $group,
            'actionUrl' => $actionUrl,
        ]);
    }

    public function suppDetail(Request $request) {
        $group = 'support';
        $device_id = $request->input('device');
        $device_name = Device::where('id', $device_id)->where('group', $group)->orderBy('created_at', 'asc')->get('name');
        $deviceActivities = DeviceActivity::where('device_uuid', $device_id)->orderBy('created_at', 'asc')->get();
        return view('konten.detail', [
            'siteName' => $this->siteName,
            'navMenu' => $this->navMenu,
            'device' => $device_name[0]->name,
            'device_id' => $device_id,
            'group' => $group,
            'listCom' => $deviceActivities,
        ]);
    }

    public function suppCreateActivity(Request $request) {
        $group = 'support';
        $device_id = $request->input('device');
        $actionUrl = '/support/storeActivity?device=' . $device_id;
        return view('konten.createActivity', [
            'siteName' => $this->siteName,
            'navMenu' => $this->navMenu,
            'group' => $group,
            'actionUrl' => $actionUrl,
        ]);
    }

    public function suppUpdate(Request $request) {
        $group = 'support';
        $device_id = $request->input('device');
        $actionUrl = '/support/update?device='.$device_id.'&group='.$group;
        $device = Device::findOrFail($device_id);

        return view('konten.update', [
            'siteName' => $this->siteName,
            'navMenu' => $this->navMenu,
            'group' => $group,
            'actionUrl' => $actionUrl,
            'deviceValues' => $device,
        ]);
    }
}
