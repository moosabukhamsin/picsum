<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use App\Repositories\Image\ImageRepositoryInterface;
use Session;

class ImageController extends Controller
{
    private $imageRepository;

    public function __construct(ImageRepositoryInterface $ImageRepository)
    {
        $this->imageRepository = $ImageRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $images = $this->imageRepository->all();
            return view('front.image.index', ['images' => $images]);
        }
        catch (Exception $exception)
        {
            Session::flash('error',$exception->getMessage());
            return back();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('front.image.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->imageRepository->validate($request);
            $this->imageRepository->upload($request);
            Session::flash('success','Image has been created successfully!');
            return redirect()->route('image.index');
        }
        catch (Exception $exception)
        {
            Session::flash('error',$exception->getMessage());
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        try {
            return view('front.image.show', ['image' => $image]);
        }
        catch (Exception $exception)
        {
            Session::flash('error',$exception->getMessage());
            return back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, image $image)
    {
        try {
            $this->imageRepository->validate($request);
            $this->imageRepository->update($request,$image);
            Session::flash('success','Image has been created successfully!');
            return redirect()->route('images.index');
        }
        catch (Exception $exception)
        {
            Session::flash('error',$exception->getMessage());
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(image $image)
    {
        try {
            $this->imageRepository->delete($image);
            Session::flash('success','Image has been deleted successfully!');
            return redirect()->route('images.index');
        }
        catch (Exception $exception)
        {
            Session::flash('error',$exception->getMessage());
            return back();
        }
    }
}
