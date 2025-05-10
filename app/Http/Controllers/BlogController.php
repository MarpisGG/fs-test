<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index()
    {
        // Get all blogs
        $blogs = Blog::all();

        // Loop through each blog to add the full URL for the image
        $blogs->each(function($blog) {
            if ($blog->image) {
                $blog->image = asset('storage/' . $blog->image); // Convert to full URL
            }
        });

        return response()->json($blogs);
    }

    public function store(Request $request)
    {
        // Validate request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Generate slug
        $slug = Str::slug($request->title);
        $originalSlug = $slug;
        $count = 1;
        while (Blog::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }

        // Store image if provided
        $imagePath = $request->file('image') ? $request->file('image')->store('blog', 'public') : null;

        // Create blog post
        $blog = Blog::create([
            'title' => $request->title,
            'content' => $request->content,
            'slug' => $slug,
            'image' => $imagePath,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return response()->json(['message' => 'Blog post created successfully!', 'blog' => $blog]);
    }

    public function update(Request $request, $id)
    {
        // Validate request data
        $data = $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
            'image'   => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Find the blog by ID
        $blog = Blog::findOrFail($id);

        // Update slug if title changes
        if ($data['title'] !== $blog->title) {
            $slug = Str::slug($data['title']);
            $base = $slug;
            $i = 1;
            while (Blog::where('slug', $slug)->where('id', '!=', $id)->exists()) {
                $slug = "{$base}-{$i}";
                $i++;
            }
            $data['slug'] = $slug;
        }

        // Handle image update
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($blog->image) {
                Storage::disk('public')->delete($blog->image);
            }

            // Store new image
            $data['image'] = $request->file('image')->store('blog', 'public');
        } else {
            // Keep the old image if no new image is provided
            $data['image'] = $blog->image;
        }

        // Update other blog data (except image)
        $blog->update($data);

        // Convert image path to full URL
        if ($blog->image) {
            $blog->image = asset('storage/' . $blog->image);
        }

        return response()->json($blog);
    }

    public function show($slug)
    {
        // Find the blog by ID
        $blog = Blog::where('slug', $slug)->firstOrFail();

        // Convert image path to full URL
        if ($blog->image) {
            $blog->image = asset('storage/' . $blog->image);
        }

        return response()->json($blog);
    }




    public function destroy($id)
    {
        // Find the blog by ID
        $blog = Blog::findOrFail($id);

        // Delete the image if exists
        if ($blog->image) {
            Storage::disk('public')->delete($blog->image);
        }

        // Delete the blog post
        $blog->delete();

        return response()->json(['message' => 'Blog post deleted successfully!']);
    }

}
