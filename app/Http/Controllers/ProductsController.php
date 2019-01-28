<?php

namespace App\Http\Controllers;

use App\product_images;
use App\products;
use App\category;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('dashboard.pages.product.index')->with([
            'products'=>products::get(),
            'category'=>category::get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[

            'name_ar'=>'required',
            'description_ar'=>'required',
            'category_id'=>'required',
            'price'=>'required',
            'image'=>'required',
            'image_slider'=>'required',

        ]);

        $products = new products();

        $products->name_ar = $request['name_ar'];
        $products->description_ar = $request['description_ar'];
        $products->name_en = $request['name_en'];
        $products->description_en = $request['description_en'];
         $colors='';
        foreach($request['color'] as $color)
        {
            $colors .= $color.',';
        }
        $colors=rtrim($colors,",");
        $products->color = $colors;
        $products->category_id = $request['category_id'];
        $products->tags_ar = $request['tags_ar'];
        $products->tags_en = $request['tags_en'];
        $products->price = $request['price'];
        $products->offer = $request['offer'];
        $products->rate = $request['rate'];
        if($request['size']){
            $products->size = $request['size'];
        }
        if($request['volume']) {
            $products->volume = $request['volume'];
        }


        $file = $request->file('image');
        if($file)
        {
            $filename = $file->getClientOriginalName();
            $path = "img/alt_images";
            $file->move($path, $filename);
            $products->image =$filename;
        }

        $products->save();

        $file2 = $request->file('image_slider');
        if($file2) {
            foreach ($file2 as $image) {
                $destinationPath = "img/alt_images";
                $filename = $image->getClientOriginalName();
                $image->move($destinationPath, $filename);

                $product_images = new product_images();
                $product_images->product_id = $products->id;
                $product_images->image_slider = $filename;
                $product_images->save();
            }
        }
        session()->flash('success', 'Added Successfully');
        return redirect('product');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = products::where('id',$id)->first();
        return view('dashboard.pages.product.update')->with([
            'product'=>$product,
            'category'=>category::get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[

            'name_ar'=>'required',
            'description_ar'=>'required',
            'category_id'=>'required',
            'price'=>'required',
        ]);
        $products = products::where('id',$id)->first();
        $products->name_ar = $request['name_ar'];
        $products->description_ar = $request['description_ar'];
        $products->name_en = $request['name_en'];
        $products->description_en = $request['description_en'];
         $colors='';
        foreach($request['color'] as $color)
        {
            $colors .= $color.',';
        }
        $colors=rtrim($colors,",");
        $products->color = $colors;
        $products->category_id = $request['category_id'];
        $products->tags_ar = $request['tags_ar'];
        $products->tags_en = $request['tags_en'];
        $products->price = $request['price'];
        $products->offer = $request['offer'];
        $products->rate = $request['rate'];

        if($request['size']){
            $products->size = $request['size'];
        }
        if($request['volume']) {
            $products->volume = $request['volume'];
        }



        $file = $request->file('image');
        if($file)
        {
            $filename = $file->getClientOriginalName();
            $path = "img/alt_images";
            $file->move($path, $filename);
            $products->image =$filename;
        }

        $products->save();

        $file2 = $request->file('image_slider');

        if($file2) {
            $product_images =  product_images::where('product_id',$products->id)->delete();
            foreach ($file2 as $image) {
                $destinationPath = "img/alt_images";
                $filename = $image->getClientOriginalName();
                $image->move($destinationPath, $filename);

                $product_images = new product_images();
                $product_images->product_id = $products->id;
                $product_images->image_slider = $filename;
                $product_images->save();
            }
        }
        session()->flash('success', 'Updated Successfully');
        return redirect('product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = products::where('id',$id)->delete();
        $product_images = product_images::where('product_id',$id)->delete();
        session()->flash('success', 'Deleted Successfully');
        return redirect('product');
    }
}
