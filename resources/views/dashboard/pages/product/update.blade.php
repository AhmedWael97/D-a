@extends('dashboard.layout.App')
@section('content')


<link rel="stylesheet" href="http://getbootstrap.com/dist/css/bootstrap.css" />
<link rel="stylesheet" href="//cdn.jsdelivr.net/bootstrap.tagsinput/0.4.2/bootstrap-tagsinput.css" />

<style>
    .bootstrap-tagsinput .tag{
        background-color: black;
        border-radius: 5px;
        padding: 5px;
    }

</style>



<hr>
<div class="row flex-row">
    @if($errors->all())
            <div style="color: #a94442; background-color: #f2dede; border-color: #ebccd1;" class="alert ">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            @if (session()->has('success'))

                <div class="alert alert-success alert-dissmissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                    {{session('success')}}
                </div>

            @endif

        @if (session()->has('permission'))

            <div style="color: #a94442; background-color: #f2dede; border-color: #ebccd1;" class="alert ">

                <ul>
                    <li>{{session('permission')}}</li>
                </ul>
            </div>

        @endif
    <div class="col-12">
        <!-- Form -->
        <div class="widget has-shadow">
            <div class="widget-header bordered no-actions d-flex align-items-center">
                <h4>Update Product</h4>
            </div>
            <div class="widget-body">

                <form class="form-append" action="{{url('/')}}/product/{{$product->id}}" method="POST" enctype="multipart/form-data" id="example-form">
                    <input type="hidden" name="_method" value="PUT">
                    @csrf
                    <div class="row">
                    
                        <div class="form-group col-lg-6">
                            <label class="col-lg-3 form-control-label">Name</label>
                            <div class="col-lg-9">
                                <input type="text" value="{{$product->name_ar}}" name="name_ar" class="form-control">
                            </div>
                        </div>
                        <div class="form-group col-lg-6">
                                <label class="col-lg-3 form-control-label">Name EN</label>
                                <div class="col-lg-9">
                                    <input type="text" value="{{$product->name_en}}" name="name_en" class="form-control">
                                </div>
                            </div>
                            
                        <div class="form-group col-lg-6">
                            <label class="col-lg-3 form-control-label">Description</label>
                            <div class="col-lg-9">
                                <textarea name="description_ar" class="form-control">{{$product->description_ar}}</textarea>
                            </div>
                        </div>
                        <div class="form-group col-lg-6">
                                <label class="col-lg-6 form-control-label">Description EN</label>
                                <div class="col-lg-9">
                                    <textarea name="description_en" class="form-control">{{$product->description_en}}</textarea>
                                </div>
                            </div>
                        <div class="form-group col-lg-12">
                            <label class="col-lg-3 form-control-label">Color</label>
                            <div class="col-lg-8 tab-unit">
                                <?php $colors = explode(",",$product->color); ?>
                                @foreach($colors as $color)
                                <input value="{{$color}}" type="color" name="color[]" class="form-control" id="nameAdd"
                                       placeholder="">
                               @endforeach
                            </div>
                            <div class="text-center" style="padding: 10px">
<button type="button" class=" appendText btn btn-primary"> Add More Colors
                                    </button>
                                        </div>

                        </div>
                        <div class="form-group col-lg-12">
                            <label class="col-lg-3 form-control-label">Image</label>
                            <div class="col-lg-6">
                                <input type="file" name="image" class="form-control" id="nameAdd"
                                       placeholder="">
                            </div>
                            <div class="col-lg-6">
                                <img src="{{url('/')}}/img/alt_images/{{$product->image}}" alt="" width="50"
                                     height="50">
                            </div>
                        </div>
                        <div class="form-group col-lg-12">
                            <label class="col-lg-3 form-control-label">Slider Image</label>
                            <div class="col-lg-5">
                                <input type="file" name="image_slider[]" multiple class="form-control" id="nameAdd"
                                       placeholder="">
                            </div>
                            <div class="col-lg-4">
                                @foreach($product->product_images as $images)
                                <img src="{{url('/')}}/img/alt_images/{{$images->image_slider}}" alt="" width="50"
                                     height="50">
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="col-lg-3 form-control-label">Category</label>
                            <div class="col-lg-9">
                                <select name="category_id" class="selectpicker show-menu-arrow" data-live-search="true">
                                    @foreach($category as $categories)
                                        <option {{ $categories->id == $product->category->id ? "selected" : "" }} value="{{$categories->id}}">{{$categories->name_ar}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="col-lg-3 form-control-label">tags</label>
                            <div class="col-lg-9">
                                <input   value="{{$product->tags_ar}}" type="text" name="tags_ar" class="form-control" id="nameAdd"
                                       data-role="tagsinput">
                            </div>
                        </div>
                        <div class="form-group col-lg-6 maxs">
                                <label class="col-lg-3 form-control-label">Tags EN</label>
                                <div class="col-lg-9">
                                    <input   value="{{$product->tags_en}}" type="text" name="tags_en" class="form-control" id="nameAdd"
                                           data-role="tagsinput">
                                </div>
                            </div>
                        <div class="form-group col-lg-6">
                            <label class="col-lg-3 form-control-label">Size</label>
                            <div class="col-lg-9">
                                <input data-role="tagsinput" type="text" value="{{$product->size}}" name="size" class="form-control">
                            </div>
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="col-lg-3 form-control-label">Volume</label>
                            <div class="col-lg-9">
                                <input type="text" value="{{$product->volume}}" name="volume" class="form-control" id="nameAdd"
                                       placeholder="">
                            </div>
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="col-lg-3 form-control-label">Price</label>
                            <div class="col-lg-9">
                                <input type="number" value="{{$product->price}}" name="price" class="form-control" id="nameAdd"
                                       placeholder="">
                            </div>
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="col-lg-3 form-control-label">Offer</label>
                            <div class="col-lg-9">
                                <input type="number" value="{{$product->offer}}" name="offer" class="form-control" id="nameAdd"
                                       placeholder="">
                            </div>
                        </div>
                        <div class="form-group col-lg-6">
                                        <label class="col-lg-3 form-control-label">Rate</label>
                                        <div class="col-lg-9">
                                            <select name="rate" class="selectpicker show-menu-arrow" data-live-search="true">
                                                    <option {{ $product->rate == 1 ? "selected" : "" }} value="1">1</option>
                                                    <option {{ $product->rate == 2 ? "selected" : "" }} value="2">2</option>
                                                    <option {{ $product->rate == 3 ? "selected" : "" }} value="3">3</option>
                                                    <option {{ $product->rate == 4 ? "selected" : "" }} value="4">4</option>
                                                    <option {{ $product->rate == 5 ? "selected" : "" }} value="5">5</option>
                                            </select>
                                        </div>
                                    </div>
                    
                           
                        
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-success text-center">Submit</button>
                    </div>

                </form>

            </div>
        </div>
        <!-- End Form -->
    </div>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/bootstrap.tagsinput/0.4.2/bootstrap-tagsinput.min.js"></script>
<script type="text/javascript">
    
    var row ='<input value="#639e27" type="color" name="color[]" class="form-control">'
    $('.appendText').on('click', function () {
            $(this).closest('.form-append').find('.tab-unit').append(row);

        });
</script>


@endsection