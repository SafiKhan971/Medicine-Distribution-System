<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller {
    /**
    * Display a listing of the resource.
    */

    public function index() {
        $blogs = Blog::all();
        return view( 'backend.admin.blog.index', compact( 'blogs' ) );
    }

    /**
    * Show the form for creating a new resource.
    */

    public function create() {
        return view( 'backend.admin.blog.create' );
    }

    /**
    * Store a newly created resource in storage.
    */

    public function store( Request $request ) {
        // Validate the request data
        $validator = Validator::make( $request->all(), [
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ] );

        // If validation fails, redirect back with validation errors
        if ( $validator->fails() ) {
            return redirect()->back()
            ->withErrors( $validator )
            ->withInput();
        }

        // Validation passed, create the blog post

        $image_name = null;

        if ( $request->hasFile( 'image' ) ) {
            $image = $request->file( 'image' );
            $image->storeAs( 'public/blogimages', $image->getClientOriginalName() );
            $image_name = $image->getClientOriginalName();
        }

        $blog = Blog::create( [
            'title' => $request->input( 'title' ),
            'content' => $request->input( 'content' ),
            'admin_id' => session( 'admin_id' ),
            'image' => $image_name,
        ] );

        // Redirect with a success message
        return redirect()->route( 'blogs.index' )->with( 'success', 'Blog created successfully!' );
    }

    /**
    * Display the specified resource.
    */

    public function show( Blog $blog ) {
        //
    }

    /**
    * Show the form for editing the specified resource.
    */

    public function edit( Blog $blog ) {
        //
    }

    /**
    * Update the specified resource in storage.
    */

    public function update( Request $request, Blog $blog ) {
        //
    }

    /**
    * Remove the specified resource from storage.
    */

    public function destroy( Blog $blog ) {
        //
    }
}
