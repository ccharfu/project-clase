<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function index()
    {
        return response()->json(Profile::all(), 200);
    }

    public function show($id)
    {
        $the_profile = Profile::find($id);
        if (is_null($the_profile)) {
            return response()->json(['message' => 'Not found'], 404);
        } else {
            return response()->json($the_profile, 200);
        }
    }

    public function store(Request $request)
    {
        $the_profile = Profile::create($request->all());
        return response($the_profile, 201);
    }

    public function update(Request $request, $id)
    {
        $the_profile = Profile::find($id);
        if (is_null($the_profile)) {
            return response()->json(['message' => 'Not found'], 404);
        } else {
            $the_profile->update($request->all());
            return response()->json($the_profile, 200);
        }
    }

    public function destroy(Request $request, $id)
    {
        $the_profile = Profile::find($id);

        if (is_null($the_profile)) {
            return response()->json(['message' => 'Not found'], 404);
        } else {
            $the_profile->delete();
            return response()->json(null, 204);
        }
    }
}
