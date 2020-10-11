<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\DirectoryFIle;

class FileController extends Controller
{
    public function viewUploadFiles()
    {
    	$files = DirectoryFIle::paginate(3);
    	return view("viewfiles",compact('files'));
    }
    public function uploadFiles()
    {
    	 
    	return view("uploadfiles");
    }
    public function storeFile(Request $request)
    {
    	$request->validate([
            'image' => 'required|file|max:2048|mimes:doc,docx,pdf,txt,jpeg,png,gif,jpg',
        ]);
        $image_name = $request->file('image')->getClientOriginalName();
        $image_sizein_byte = $request->file('image')->getSize();
        $image_size = number_format($image_sizein_byte / 1048576,2);
        //dd($image_size.' MB');
  	 	$file = new DirectoryFIle;
  	 	$file->filename = $image_name;
  	 	$file->filesize = $image_size;
  	 	$file->save();
  	 	return back()
            ->with('success','File has been uploaded.')
            ->with('file', $image_name);

    }
    public function searchFiles(Request $request)
    {
    	//dd($request->input('searchquery'));
    	$q = $request->input('searchquery');
    	
	    if($q != "" || $q != null){
	    $files = DirectoryFIle::where ( 'filename', 'LIKE', '%' . $q . '%' )->paginate (3);
	    //dd($files);
	    $pagination = $files->appends ( array (
	                'searchquery' =>$request->input('searchquery')
	        ) );
		    if (count ( $files) > 0)
		    {
		        return view ( 'viewfiles' ,compact('files'));
		    }
		    
		    else
		    {
		    	//dd("awd");
		     return view ( 'viewfiles' ,compact('files'))->with('nodata','No Files found.');
		    }
		}
		else
		{
			return back();
		}
	}
	public function deleteFile($fileid)
    {
    	$res=DirectoryFIle::where('id',$fileid)->delete();
    	return back()->with('success','File has been deleted.');
    }
    public function deletedfiles()
    {
    	$deletedfiles = DirectoryFIle::onlyTrashed()->paginate(3);
    	return view("deletedfiles",compact('deletedfiles'));
    }

}
