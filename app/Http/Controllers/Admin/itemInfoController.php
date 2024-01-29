<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Item;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Str;

class itemInfoController extends Controller
{


    public function __construct()
    {
        $this->middleware('role:admin');

    }

    public function index()
    {
        return view('admin.itemInfoList')->with('items',Item::paginate(15));
    }

    public function uploadImage(Request $request)
    {
        $imageData = [];

        foreach ($request->file('po_image') as $index => $imageFile) {
            $filename = Str::random(10) . '.png';
            $storagePath = "storage/uploads/images/{$filename}";


            Image::make($imageFile)->resize(320, 240)->save(public_path($storagePath));

            $imageData[] = [
                'image_url' => $filename,
                'name' => $request->input('name')[$index],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        Item::insert($imageData);

        // Session Message
        session()->flash('success', '鹿角蕨建立成功');

        // Redirect Route
        return redirect()->back();
    }
}
