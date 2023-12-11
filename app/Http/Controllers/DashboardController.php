<?php

namespace App\Http\Controllers;

use App\Models\Cms;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    //
    public function index()
    {


        return view('admin.index');
    }


    public function banner()
    {

        $data = [
            'data' => Cms::all()
        ];
        return view('admin.banner.index', $data);
    }

    public function add_banner()
    {
        return view('admin.banner.add_banner');
    }

    public function store_banner(Request $request)
    {

        $validatedData = $request->validate([
            'title'         => 'required',
            'banner_label'  => 'required',
            'banner_image'  => 'required|image|dimensions:min_width=1920,min_height=1080'
        ]);
        if ($request->file('banner_image')) {
            $validatedData['banner_image'] = $request->file('banner_image')->store('banner_image');
        }
        if (Cms::create($validatedData)) {
            return redirect('/banner')->with('success', 'Banner berhasil di tambahkan');
        } else {
            return redirect()->back()->with('error', 'Banner gagal ditambahkan');
        }
    }

    public function edit_banner($id)
    {

        $data = [
            'data' => Cms::find($id)
        ];
        return view('admin.banner.edit_banner', $data);
    }

    public function update_banner(Request $request)
    {
        $rules = [
            'title'         => 'required',
            'banner_label'  => 'required',
            'banner_image'  => 'image|dimensions:min_width=1920,min_height=1080'
        ];

        $validatedData = $request->validate($rules);
        if ($request->file('banner_image')) {
            if ($request->old_banner_image) {
                Storage::delete($request->old_banner_image);
            }
            $validatedData['banner_image'] = $request->file('banner_image')->store('banner_image');
        }

        if (Cms::where('id', $request->id)->update($validatedData)) {
            return redirect('/banner')->with('success', 'Banner berhasil di update');
        } else {
            return redirect()->back()->with('error', 'Banner gagal di update');
        }
    }

    public function delete_banner(Request $request)
    {
        $data = Cms::find($request->id);
        $gambar = $data->banner_image;
        Storage::delete($gambar);
        if (Cms::destroy($request->id)) {
            return redirect('/banner')->with('success', 'Banner berhasil di hapus');
        } else {
            return redirect()->back()->with('error', 'Banner gagal di hapus');
        }
    }


    public function gallery()
    {
        $data = [
            'kapal'     => Gallery::where('name', 'KAPAL')->get(),
            'truck'     => Gallery::where('name', 'TRUCK')->get(),
            'eskavator' => Gallery::where('name', 'ESKAVATOR')->get()
        ];
        return view('admin.gallery.index', $data);
    }

    public function add_gallery()
    {
        return view('admin.gallery.add_gallery');
    }

    public function store_gallery(Request $request)
    {

        $validatedData = $request->validate([
            'name'           => 'required',
            'gallery_images'  => 'required|image|dimensions:min_width=1024,min_height=768'
        ]);
        if ($request->file('gallery_images')) {
            $validatedData['gallery_images'] = $request->file('gallery_images')->store('gallery_images');
        }
        if (Gallery::create($validatedData)) {
            return redirect('/gallery')->with('success', 'Foto berhasil di tambahkan');
        } else {
            return redirect()->back()->with('error', 'Foto gagal ditambahkan');
        }
    }

    public function edit_gallery($id)
    {

        $data = [
            'data' => Gallery::find($id)
        ];
        return view('admin.gallery.edit_gallery', $data);
    }

    public function update_gallery(Request $request)
    {
        $rules = [
            'name'           => 'required',
            'gallery_images'  => 'image|dimensions:min_width=1024,min_height=768'
        ];

        $validatedData = $request->validate($rules);
        if ($request->file('gallery_images')) {
            if ($request->old_gallery_images) {
                Storage::delete($request->old_gallery_images);
            }
            $validatedData['gallery_images'] = $request->file('gallery_images')->store('gallery_images');
        }

        if (Gallery::where('id', $request->id)->update($validatedData)) {
            return redirect('/gallery')->with('success', 'Foto berhasil di update');
        } else {
            return redirect()->back()->with('error', 'Foto gagal di update');
        }
    }

    public function delete_gallery(Request $request)
    {
        $data = Gallery::find($request->id);
        $gambar = $data->gallery_images;
        Storage::delete($gambar);
        if (Gallery::destroy($request->id)) {
            return redirect('/gallery')->with('success', 'Foto berhasil di hapus');
        } else {
            return redirect()->back()->with('error', 'Foto gagal di hapus');
        }
    }
}
