<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
public function index()
    {
        $news = News::latest()->paginate(6); // ambil 6 berita per halaman
        return view('user.index', compact('news'));
    }

    /**
     * Tampilkan detail berita berdasarkan slug.
     */
    public function show($slug)
    {
        $news = News::where('slug', $slug)->firstOrFail();
        return view('user.show', compact('news'));
    }
}
