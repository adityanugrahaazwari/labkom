<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VisionMission;
use Illuminate\Http\Request;

class VisionMissionController extends Controller
{
    /**
     * Show the form for editing Visi & Misi.
     */
    public function edit()
    {
        $visionMission = VisionMission::first();
        if (!$visionMission) {
            $visionMission = VisionMission::create([
                'vision' => 'Default Vision',
                'missions' => ['Default Mission 1']
            ]);
        }
        return view('admin.vision-mission.edit', compact('visionMission'));
    }

    /**
     * Update the Visi & Misi.
     */
    public function update(Request $request)
    {
        $request->validate([
            'vision' => ['required', 'string'],
            'missions' => ['required', 'array'],
            'missions.*' => ['required', 'string'],
        ]);

        $visionMission = VisionMission::first();
        if (!$visionMission) {
            $visionMission = new VisionMission();
        }

        $visionMission->vision = $request->vision;
        
        // Filter out empty items
        $missionsArray = array_filter($request->missions, fn($item) => !is_null($item) && trim($item) !== '');
        $visionMission->missions = array_values($missionsArray);
        
        $visionMission->save();

        return redirect()->route('admin.vision-mission.edit')
            ->with('success', 'Vision & Mission updated successfully.');
    }
}
