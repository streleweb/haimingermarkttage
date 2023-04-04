<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeContentController extends Controller
{
    public function store(Request $request)
    {
        $title = $request->input('homeContentTitle');
        $description = $request->input('homeContentDescription');

        if ($title !== null) {
            Storage::put('homeContentTitle.txt', $title);
        }

        if ($description !== null) {
            Storage::put('homeContentDescription.txt', $description);
        }
    }

    public function index()
    {
        $title = Storage::exists('homeContentTitle.txt') ? Storage::get('homeContentTitle.txt') : null;
        $description = Storage::exists('homeContentDescription.txt') ? Storage::get('homeContentDescription.txt') : null;

        return response()->json([
            'homeContentTitle' => $title,
            'homeContentDescription' => $description,
        ]);
    }

    /**
     * Remove by emptying
     */
    public function destroy()
    {
        Storage::put('homeContenttitle.txt', '');
        Storage::put('homeContentdescription.txt', '');

        return response()->json(['message' => 'Home content deleted.']);
    }
}
