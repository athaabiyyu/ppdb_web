<?php
namespace App\Http\Controllers;

use App\Models\RegistrationRequirement;
use App\Models\HomeSetting;
use App\Models\RegistrationFlow;
use App\Models\SliderImage;
use Illuminate\Http\Request;

class AdminHomeSettingController extends Controller
{
    public function index()
    {
        return view('admin.home_settings.index', [
            'sliders' => SliderImage::all(),
            'requirements' => RegistrationRequirement::all(),
            'flows' => RegistrationFlow::orderBy('step_number')->get(),
            'setting' => HomeSetting::first() ?? HomeSetting::create([]),
        ]);
    }

    // ================ SLIDER =======================
    public function storeSlider(Request $request)
    {
        $request->validate([
            'image' => 'required|image'
        ]);

        $path = $request->file('image')->store('sliders', 'public');

        SliderImage::create(['image_path' => $path]);

        return back()->with('success', 'Slider berhasil ditambahkan');
    }

    public function deleteSlider($id)
    {
        SliderImage::findOrFail($id)->delete();
        return back();
    }

    // ================ SYARAT =======================
    public function storeRequirement(Request $request)
    {
        $request->validate([
            'text' => 'required'
        ]);

        RegistrationRequirement::create(['text' => $request->text]);
        return back();
    }

    public function deleteRequirement($id)
    {
        RegistrationRequirement::findOrFail($id)->delete();
        return back();
    }

    // ================ ALUR =======================
    public function storeFlow(Request $request)
    {
        $request->validate([
            'text' => 'required',
            'step_number' => 'required|integer'
        ]);

        RegistrationFlow::create($request->only('text', 'step_number'));
        return back();
    }

    public function deleteFlow($id)
    {
        RegistrationFlow::findOrFail($id)->delete();
        return back();
    }

    // ============ TOGGLE BUTTON ==================
    public function toggleRegisterButton()
    {
        $setting = HomeSetting::first() ?? HomeSetting::create([]);

        $setting->update([
            'show_register_button' => ! $setting->show_register_button
        ]);

        return back();
    }
}
