<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function __construct()
	{
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        $id = 0;
        if (isset($_GET['id'])) $id = $_GET['id'];

        $sliders = Slider::all();
        if ($id !== 0) {
            $slider = Slider::where('id', (int)$id)->get();
            return view('admin.slider', ['slider' => $slider[0], 'sliders' => $sliders, 'edit' => true]);
        }
        return view('admin.slider', ['sliders' => $sliders]);
    }

    public function create(Request $request)
    {
        $data = [];
        if (isset($request->path)) {
            $imageName = time() . '.' . $request->path->extension();
            $request->path->move(public_path('images/slide'), $imageName);
            $img = 'images/slide/' . $imageName;
            $data['path'] = $img;
            $data['name'] = $imageName;
        }

        $slider = Slider::create($data);
        return redirect()->route('slider')->with('message', 'Slider created!');
    }

    public function update(Request $request, $id)
    {
        $slider = Slider::find($id);

        if (isset($request->path)) {
            $imageName = time() . '.' . $request->path->extension();
            $request->path->move(public_path('images/slide'), $imageName);
            $img = 'images/slide/' . $imageName;
            $slider->path = $img;
            $slider->name = $imageName;
        }

        $slider->save();
		$slider->update();
		return redirect()
			->route('slider')
			->with('message', 'Slider updated successfully!');
    }

    public function destroy($id)
    {
        $slider = Slider::find($id);
        $deleted = $slider->delete();
        if ($deleted === 0)
            return redirect()
                ->route('slider')
                ->with('warning', 'Can\'t delete Slider!');

		return redirect()
			->route('slider')
			->with('delete_success', 'Slider deleted successfully');
    }
}
