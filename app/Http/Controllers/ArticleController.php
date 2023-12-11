<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    //

    public function index()
    {
        $data = [
            'data' => Article::all()
        ];
        return view('admin.article.index', $data);
    }



    public function category()
    {
        $data = ['data' => Category::all()];
        return view('admin.category.index', $data);
    }

    public function add_category()
    {
        return view('admin.category.add_category');
    }

    public function store_category(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories'
        ]);

        if (Category::create($validatedData)) {
            return redirect('/category')->with('success', 'Kategori berhasil di simpan');
        } else {
            return redirect()->back()->with('error', 'Kategori gagal di simpan');
        }
    }

    public function edit_category($id)
    {
        $data = [
            'data' => Category::find($id),
        ];
        return view('admin.category.edit_category', $data);
    }



    public function update_category(Request $request)
    {
        $data = Category::find($request->id);

        $rules = [
            'name' => 'required',
            'slug' => 'required'
        ];

        if ($request->slug != $data->slug) {
            $rules['slug'] = 'required|unique:categories';
        }

        $validatedData = $request->validate($rules);

        if (Category::where('id', $request->id)->update($validatedData)) {
            return redirect('/category')->with('success', 'Kategori berhasil di update');
        } else {
            return redirect()->back()->with('error', 'Kategori gagal di update');
        }
    }


    public function delete_category(Request $request) {
        if (Category::destroy($request->id)) {
            return redirect('/category')->with('success', 'Kategori berhasil di hapus');
        } else {
            return redirect()->back()->with('error', 'Kategori gagal di hapus');
        }
    }



    public function add_article()
    {
        $data = [
            'data' => Category::all(),
        ];
        return view('admin.article.add_article', $data);
    }

    public function store_article(Request $request) {

        $validatedData = $request->validate([
            'title' => 'required',
            'category_slug' => 'required',
            'body'  => 'required',
            'article_images' => 'required|image|dimensions:min_width=1024,min_height=768'
        ]);

        if ($request->file('article_images')) {
            $validatedData['article_images'] = $request->file('article_images')->store('article_images');
        }

        if(Article::create($validatedData)) {
            return redirect('/article')->with('success', 'Artikel berhasil di tambahkan');
        }else {
            return redirect()->back()->with('error', 'Artikel gagal ditambahkan');
        }

    }


    public function edit_article($id) {
        
        $data = [
            'data' => Article::find($id),
            'category' => Category::all()
        ];

        return view('admin.article.edit_article', $data);

    }


    public function update_article(Request $request) {
       
        $rules = [
            'title'           => 'required',
            'category_slug'   => 'required',
            'body'            => 'required',
            'article_images'  => 'image|dimensions:min_width=1024,min_height=768'
        ];

        $validatedData = $request->validate($rules);
        if ($request->file('article_images')) {
            if ($request->old_article_images) {
                Storage::delete($request->old_article_images);
            }
            $validatedData['article_images'] = $request->file('article_images')->store('article_images');
        }

        if (Article::where('id', $request->id)->update($validatedData)) {
            return redirect('/article')->with('success', 'Artikel berhasil di update');
        } else {
            return redirect()->back()->with('error', 'Artikel gagal di update');
        }
    }


    public function delete_article(Request $request) {
        $data = Article::find($request->id);
        $gambar = $data->article_images;
        Storage::delete($gambar);
        if (Article::destroy($request->id)) {
            return redirect('/article')->with('success', 'Artikel berhasil di hapus');
        } else {
            return redirect()->back()->with('error', 'Artikel gagal di hapus');
        }
    }


}
