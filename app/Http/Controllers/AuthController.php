<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users; // Use the Users model
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // Login function
    public function login(Request $request)
    {
        // Validate the input
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Check validation
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Find the user by email
        $user = Users::where('email', $request->email)->first(); // Change to `Users` model

        // Check if user exists and password matches
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        // Create a token (if you're using Laravel Sanctum or Passport for token generation)
        // Uncomment the following line if you're using Sanctum or Passport
        // $token = $user->createToken('UserApp')->plainTextToken;

        // Since you're not using token now, return user details
        return response()->json([
            'user' => $user,
            // 'token' => $token, // Uncomment this if you are using token-based authentication
        ]);
    }

    // Logout function to clear the session
    public function logout()
    {
        // Clear the session
        session()->flush();

        // Return success message
        return response()->json([
            'message' => 'Logged out successfully'
        ]);
    }
}
