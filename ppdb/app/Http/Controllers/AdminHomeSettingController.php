<?php
namespace App\Http\Controllers;

use App\Models\RegistrationRequirement;
use App\Models\HomeSetting;
use App\Models\RegistrationFlow;
use App\Models\SliderImage;
use Illuminate\Http\Request;
use App\Models\Unit;

class AdminHomeSettingController extends Controller
{
    public function index()
    {
        return view('admin.home_settings.index', [
            'sliders' => SliderImage::all(),
            'requirements' => RegistrationRequirement::all(),
            'flows' => RegistrationFlow::orderBy('step_number')->get(),
            'setting' => HomeSetting::first() ?? HomeSetting::create([]),
            'units' => Unit::orderBy('name')->get(),
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

    public function storeUnit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Unit::create([
            'name' => $request->name,
            'google_drive_link' => null,
        ]);

        return redirect()->route('admin.home_settings.index')->with('success', 'Unit pendidikan berhasil ditambahkan!');
    }

    public function updateUnitLink(Request $request, $id)
    {
        $request->validate([
            'google_drive_link' => 'nullable|url',
        ]);

        $unit = Unit::findOrFail($id);
        $unit->update([
            'google_drive_link' => $request->google_drive_link,
        ]);

        return redirect()->route('admin.home_settings.index')->with('success', 'Link Google Drive berhasil diperbarui!');
    }

    public function destroyUnit($id)
    {
        $unit = Unit::findOrFail($id);
        $unit->delete();

        return redirect()->route('admin.home_settings.index')->with('success', 'Unit pendidikan berhasil dihapus!');
    }
}
