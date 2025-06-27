<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the gallery.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallery::latest('event_date')->take(6)->get();
        return view('pages.gallery', compact('galleries'));
    }

    /**
     * Display all gallery items.
     *
     * @return \Illuminate\Http\Response
     */
    public function all(Request $request)
    {
        $query = Gallery::latest('event_date');
        
        // Filter berdasarkan kategori jika ada
        if ($request->has('category') && $request->category != 'all') {
            $query->where('category', $request->category);
        }
        
        $galleries = $query->paginate(12)->withQueryString();
        $categories = Gallery::select('category')->distinct()->pluck('category');
        
        return view('pages.gallery-all', compact('galleries', 'categories'));
    }
}