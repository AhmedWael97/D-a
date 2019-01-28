@extends('dashboard.layout.App')
@section('content')
<style>
    
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
                <h4>Update Offer</h4>
            </div>
            <div class="widget-body">

                <form action="{{url('/')}}/OfferSection/{{$OfferSection->id}}" method="POST" enctype="multipart/form-data" id="example-form">
                    <input type="hidden" name="_method" value="PUT">
                    @csrf
                    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-3 form-control-label">Title</label>
                            <div class="col-lg-9">
                                <input type="text" value="{{$OfferSection->title_ar}}" name="title_ar" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-3 form-control-label">Description</label>
                            <div class="col-lg-9">
                                <textarea value="" name="description_ar" class="form-control">{{$OfferSection->description_ar}}</textarea>
                            </div>
                        </div>
                        
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-3 form-control-label">Image</label>
                            <div class="col-lg-6">
                                <input type="file" name="image" class="form-control" id="nameAdd"
                                       placeholder="">
                            </div>
                            <div class="col-lg-3">
                                <img src="{{url('/')}}/img/alt_images/{{$OfferSection->image}}" alt="" width="50"
                                     height="50">
                            </div>
                        </div>
                        
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-3 form-control-label">Product</label>
                            <div class="col-lg-9">
                                <select name="product_id" class="selectpicker show-menu-arrow" data-live-search="true">
                                    @foreach($products as $product)
                                        <option {{ $product->id == $OfferSection->product_id ? "selected" : "" }} value="{{$product->id}}">{{$product->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                    </div>


                    <div class="col-md-6">
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-3 form-control-label">Title EN</label>
                                <div class="col-lg-9">
                                    <input type="text" value="{{$OfferSection->title_en}}" name="title_en" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-3 form-control-label">Description EN</label>
                                <div class="col-lg-9">
                                    <textarea type="text" name="description_en" class="form-control">{{$OfferSection->description_en}}</textarea>
                                </div>
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




@endsection