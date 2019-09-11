<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFolder;
use Illuminate\Http\Request;
use App\Folder;

class FolderController extends Controller
{
    
    public function showCreateForm() {
        return view('folders/create');

    }

    public function create(CreateFolder $request)
    {
        // Create Folder model's instance
        $folder = new Folder();
        
        // Put the input value to the title
        $folder->title = $request->title;

        // Write the status of the instance to the DB
        $folder->save(); 

        return redirect()->route('tasks.index', [
            'id' => $folder->id,
        ]);

    }


}
