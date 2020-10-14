<?php
namespace App\Repositories\Image;

use App\Models\Image;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;

interface ImageRepositoryInterface
{
   public function all(): Collection;
   
   public function validate(Request $request);
   
   public function upload(Request $request);

   public function update(Request $request,Image $image);

   public function delete(Request $request,Image $image);
   
   
}