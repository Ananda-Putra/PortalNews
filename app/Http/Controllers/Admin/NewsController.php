<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Tampilkan daftar berita (halaman admin).
     */
    public function index()
    {
        //dd('Controller index masuk');
        $news = News::latest()->paginate(10);
        return view('admin.index', compact('news'));
    }

    /**
     * Tampilkan form tambah berita.
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Simpan berita baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'excerpt' => 'nullable|max:500',
        ]);

        $data = $request->only(['title', 'content', 'excerpt']);
        $data['slug'] = Str::slug($request->title);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('news', 'public');
            $data['image'] = $path;
        }

        News::create($data);

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil ditambahkan.');
    }

    /**
     * Tampilkan detail berita (untuk admin preview).
     */
    public function show(News $news)
    {
        return view('admin.show', compact('news'));
    }

    /**
     * Tampilkan form edit berita.
     */
    public function edit(News $news)
    {
        return view('admin.edit', compact('news'));
    }

    /**
     * Update berita.
     */
    public function update(Request $request, News $news)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'excerpt' => 'nullable|max:500',
        ]);

        $data = $request->only(['title', 'content', 'excerpt']);
        $data['slug'] = Str::slug($request->title);

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($news->image) {
                Storage::disk('public')->delete($news->image);
            }
            $path = $request->file('image')->store('news', 'public');
            $data['image'] = $path;
        }

        $news->update($data);

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil diperbarui.');
    }

    /**
     * Hapus berita.
     */
    public function destroy(News $news)
    {
        if ($news->image) {
            Storage::disk('public')->delete($news->image);
        }
        $news->delete();

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil dihapus.');
    }
}
