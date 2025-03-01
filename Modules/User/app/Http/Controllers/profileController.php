<?php
namespace Modules\User\Http\Controllers;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\User\Models\UserProfile;
use Cloudinary\Cloudinary;
use Illuminate\Support\Facades\Auth;
class ProfileController extends Controller
{
    public function store(Request $request)
{
    try {
        // Validate incoming request
        $validated = $request->validate([
            'father_name' => 'required|string|max:255',
            'father_contact' => 'required|numeric|digits:10',
            'aadhar_card' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048', // Cover image validation
            'home_address' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Handle file uploads (Aadhar Card)
        if ($request->hasFile('aadhar_card')) {
            // Get the file from the request
            $aadharCardFile = $request->file('aadhar_card');
            
            // Generate a unique name for the file
            $fileName = 'aadhar_card_' . time() . '.' . $aadharCardFile->getClientOriginalExtension();
            
            // Move the file to the public directory (inside aadhar_card folder)
            $aadharCardFile->move(public_path('aadhar_card'), $fileName);
            
            // Get the file URL
            $aadharImageUrl = asset('aadhar_card/' . $fileName);
        }

        // Insert or update the data in the UserProfile table
        $feature = UserProfile::create([
            'user_id' => Auth::id(),
            'father_name' => $request->input('father_name'),
            'father_contact' => $request->input('father_contact'),
            'aadhar_card' => $aadharImageUrl, // Store the local file URL
            'home_address' => $request->input('home_address'),
            'description' => $request->input('description'),
        ]);
        User::where('id', Auth::id())->update(['profile' => '1']);
        return redirect()->back()->with('success', 'Profile added successfully.');

    } catch (\Exception $e) {
        // Handle exceptions
        echo($e);
        // return back()->withErrors(['database' => 'Failed to save data: ' . $e->getMessage()]);
    }
}

    
    /**
     * Display the user's profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
    
    }

   
}