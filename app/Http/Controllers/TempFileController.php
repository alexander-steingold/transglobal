<?php

namespace App\Http\Controllers;

use App\Models\TempFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TempFileController extends Controller
{
    public function tmpUpload(Request $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $folder = uniqid('image-', true);
            $image->storeAs('uploads/tmp/' . $folder, $filename);
            $request->user()->tempfiles()->create([
                'folder' => $folder,
                'file' => $filename
            ]);
            logger('info', ['temp file uploaded: ' . $filename]);
            return $filename;
        }
        return '';

    }

    public function tmpDelete(Request $request)
    {
        $tmpfile = $request->user()->tempfiles->where('file', request()->getContent())->first();
        if ($tmpfile) {
            logger('info', ['temp file deleted: ' . $tmpfile->file]);
            Storage::deleteDirectory('uploads/tmp/' . $tmpfile->folder);
            $tmpfile->delete();
        }
        return response()->noContent();
    }
}
