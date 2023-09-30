<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Obten el user_id de los parámetros de consulta
    $user_id = $request->input('user_id');

    // Consulta los blogs que coincidan con el user_id
    $blogs = Blog::where('user_id', $user_id)->get();

    return response()->json($blogs);
    }

    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $blog = Blog::create($request->post());
        $user = Auth::user();
        return response()->json([
            'blog'=>$blog
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        return response()->json($blog);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $user = Auth::user();
        $blog->fill($request->post())->save();
       
        return response()->json([
            'blog'=>$blog
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return response()->json([
            'mensaje'=>'blog eliminado'
        ]);
    }
}
