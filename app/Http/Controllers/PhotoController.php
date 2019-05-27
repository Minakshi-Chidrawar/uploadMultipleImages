<?php
 
namespace App\Http\Controllers;
 
use File;
use App\Photo;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
 
class PhotoController extends Controller
{
    protected $photo;
 
    /**
     * [__construct description]
     * @param Photo $photo [description]
     */
    public function __construct(
        Photo $photo )
    {
        $this->photo = $photo;
    }
 
    /**
     * Display photo input and recent images
     * @return view [description]
     */
    public function index()
    {
        $photos = Photo::all();
        return view('photo', compact('photos'));
    }
 
    public function uploadImage(Request $request)
    {
        $request->validate([
            'folderName' => 'required',
            'filename' => 'required',
            'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $folder = $request->folderName;
        // create new directory for uploading image if doesn't exist
        if( ! File::exists('images/' . $folder . '/'))
        {
            $org_img = File::makeDirectory('images/' . $folder . '/', 0777, true);
        }
        if ( ! File::exists('images/thumbnails/'))
        {
            $thm_img = File::makeDirectory('images/thumbnails', 0777, true);
        }
 
        //check if image exist
        if ($request->hasFile('filename'))
        {
            $images = $request->file('filename');
 
            //setting flag for condition
            $org_img = $thm_img = true;
 
            // loop through each image to save and upload
            foreach($images as $key => $image)
            {
                //create new instance of Photo class
                $newPhoto = new $this->photo;

                //get file name of image  and concatenate with 4 random integer for unique
                $filename = rand(1111,9999).time().'.'.$image->getClientOriginalExtension();

                //path of image for upload
                $org_path = 'images/' . $folder . '/' . $filename;
                $thm_path = 'images/thumbnails/' . $filename;
 
                $newPhoto->image     = 'images/' . $folder . '/' . $filename;
                $newPhoto->thumbnail = 'images/thumbnails/'.$filename;
                $newPhoto->imageDir  = $folder;
 
                //don't upload file when unable to save name to database
                if ( ! $newPhoto->save()) {
                    return false;
                }
 
                // upload image to server
                if (($org_img && $thm_img) == true)
                {
                   Image::make($image)->resize(500, 500, function ($constraint) {
                           $constraint->upsize();
                       })->save($org_path);
                   Image::make($image)->resize(270, 160, function ($constraint) {
                       $constraint->upsize();
                   })->save($thm_path);
                }
            }
        }
 
        return redirect()->action('PhotoController@index'); 
    }

    public function displayImage()
    {
        $folders = Photo::groupBy('imageDir')->orderBy('imageDir')->get();
        //dd($folders[0]->imageDir);

        return view('display', compact('folders'));
    }
}