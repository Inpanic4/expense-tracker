<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
use Illuminate\Support\Facades\Storage;

class FileAccessController extends Controller
{
    public function getFile(Expense $expense, $filename)
    {

        // fullpath is private/{image_name} 
        $fullpath = "private/{$filename}";

        // If file exists on storage /private{filename}
        if (Storage::disk()->exists($filename)) {
            // dd();
            // prevent showing images with different id's to the url
            if ($expense->path == "$filename") {
                // Show it only to the user if is the expense's owner or admin
                if ($expense->user_id == auth()->user()->id || auth()->user()->id == 1) {
                    // The fourth argument null prevents the browser from downloading the file and it only shows it
                    return response()->download(storage_path($fullpath), null, [], null);
                }
            }
        }
        // else abort (image not exist or anauthorised)
        abort('404');
    }
}
