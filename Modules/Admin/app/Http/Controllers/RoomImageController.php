<?php

namespace Modules\Admin\Http\Controllers;
use Modules\Admin\Models\Room;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Admin\Models\RoomRule;
use Modules\Admin\Models\RoomImage;
use Modules\Admin\Models\RoomsGallery;
use Cloudinary\Cloudinary;
class RoomImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch rooms with gallery and cover images
        $rooms = Room::with(['gallery_images', 'cover_images'])->get();

        // Fetch all gallery images
        $galleryImages = RoomsGallery::all();

        // Fetch all cover images
        $coverImages = RoomImage::all();

        return view('admin::Room.images', compact('rooms', 'galleryImages', 'coverImages'));
    }

    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Validate the input
            $validated = $request->validate([
                'room_id' => 'required|exists:rooms,id', // Ensure room exists
                'cover_image' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048', // Cover image validation
                'gallery' => 'required|array', // Gallery images
                'gallery.*' => 'image|mimes:jpg,jpeg,png,gif,svg|max:2048', // Each gallery image
            ]);

            // Initialize Cloudinary instance
            $cloudinary = new Cloudinary(env('CLOUDINARY_URL'));

            // Handle the cover image upload to Cloudinary
            if ($request->hasFile('cover_image')) {
                $coverImageFile = $request->file('cover_image');
                $coverImageUpload = $cloudinary->uploadApi()->upload($coverImageFile->getRealPath(), [
                    'folder' => 'room_images/cover',
                ]);
                $coverImageUrl = $coverImageUpload['secure_url'];

                // Save the cover image record
                RoomImage::create([
                    'room_id' => $validated['room_id'],
                    'cover_image_path' => $coverImageUrl,
                ]);
            }

            // Handle gallery images upload to Cloudinary
            if ($request->hasFile('gallery')) {
                foreach ($request->file('gallery') as $galleryImage) {
                    $galleryImageUpload = $cloudinary->uploadApi()->upload($galleryImage->getRealPath(), [
                        'folder' => 'room_images/gallery',
                    ]);
                    $galleryImageUrl = $galleryImageUpload['secure_url'];

                    // Save each gallery image record in `rooms_gallery`
                    RoomsGallery::create([
                        'room_id' => $validated['room_id'],
                        'gallery_image_path' => $galleryImageUrl,
                    ]);
                }
            }

            return redirect()->back()->with('success', 'Images uploaded successfully!');
        } catch (\Exception $e) {
            // Log the exception and display the error
            \Log::error('Error uploading images: ' . $e->getMessage());
            dd($e);
            die;
            // return redirect()->back()->with('error', 'Failed to upload images. Please try again.');
        }
    }
    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('admin::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('admin::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
