<?php

namespace App\Repositories\Image;

use App\Models\Image;
use App\Repositories\BaseRepository;
use App\Repositories\Image\ImageRepositoryInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Image as ImageInter;


class ImageRepository extends BaseRepository implements ImageRepositoryInterface
{

   /**
    * ImageRepository constructor.
    *
    * @param Image $model
    */
   public function __construct(Image $model)
   {
       parent::__construct($model);
   }

   /**
    * @return Collection
    */
   public function all(): Collection
   {
       return Image::all();    
   }

   public function validate(Request $request)
   {
        Validator::make($request->files->all(), [
            // 'image' => config('media.photo'),
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ])->validate(); 
        return;   
   }

   public function upload(Request $request)
    {
        $file = $request->file('image');
        $extension = $file->extension();
        $imageName = time() . rand(1000,9999) . '.' . $extension;
        
        // upload for reqular size image
        $originalPath = public_path('uploads');
        $ImageUpload = ImageInter::make($file);
        $ImageUpload->save($originalPath."/".$imageName);

        // upload for thumnail image
        $thumbnailPath = public_path('thumbs');
        $ImageUpload->resize(250,125);
        $ImageUpload = $ImageUpload->save($thumbnailPath."/".$imageName);

        // saveing the model to the database
        Image::create([
            'name' => $request->get('name'),
            'file_name' => $imageName,
        ]);
        return;
    }

    public function update(Request $request,Image $image){
        
    }

    public function delete(Request $request,Image $image){
        
    }
}