<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use App\Models\Item;
use App\Models\Slider;
use App\Rules\FileTypeValidate;
use Illuminate\Http\Request;

class SliderController extends Controller {
    public function index() {
        $pageTitle = "Sliders";
        $items     = Item::select('id', 'title')->where('status', 1)->orderBy('id', 'desc')->get();
        $sliders   = Slider::orderBy('id', 'desc')->with('item')->paginate(getPaginate());
        return view('admin.sliders.index', compact('pageTitle', 'items', 'sliders'));
    }

    public function addSlider(Request $request) {
        $request->validate([
            'item'  => 'required|integer',
            // 'image' => ['required', 'image', new FileTypeValidate(['jpg', 'jpeg', 'png'])],
        ]);

        // if ($request->hasFile('image')) {
            try {
                $general    = GeneralSetting::first();
                $sliderPath = ($general->active_template == 'basic') ? 'slider' : 'labflixSlider';
                $image      = fileUploader($request->image, getFilePath($sliderPath), getFileSize($sliderPath), null);
            } catch (\Exception $e) {
                dd($e->getMessage());
                $notify[] = ['error', 'Image could not be uploaded'];
                return back()->withNotify($notify);
            }

        // }

        $slider               = new Slider();
        $slider->item_id      = $request->item;
        $slider->image        = $image;
        $slider->caption_show = $request->caption_show ? 1 : 0;
        $slider->save();

        $notify[] = ['success', 'Slider added successfully'];
        return back()->withNotify($notify);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'image' => ['nullable', 'image', new FileTypeValidate(['jpg', 'jpeg', 'png'])],

        ]);

        $slider = Slider::findOrFail($id);
        $image  = $slider->image;

        if ($request->hasFile('image')) {
            try {
                $general    = GeneralSetting::first();
                $sliderPath = ($general->active_template == 'basic') ? 'slider' : 'labflixSlider';
                $image      = fileUploader($request->image, getFilePath($sliderPath), getFileSize($sliderPath), $slider->image);
            } catch (\Exception$e) {
                $notify[] = ['error', 'Image could not be uploaded'];
                return back()->withNotify($notify);
            }

        }

        $slider->image        = $image;
        $slider->caption_show = $request->caption_show ? 1 : 0;
        $slider->status       = $request->status ? 1 : 0;
        $slider->save();

        $notify[] = ['success', 'Slider updated successfully'];
        return back()->withNotify($notify);
    }

    public function remove($id) {
        $slider = Slider::findOrFail($id);
        fileManager()->removeFile(getFilePath('slider') . '/' . $slider->image);
        $slider->delete();

        $notify[] = ['success', 'Slider deleted successfully'];
        return back()->withNotify($notify);
    }

}
