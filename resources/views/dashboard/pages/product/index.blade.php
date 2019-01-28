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

    <div class="" style="width: 100%;">

                <!-- Basic Alerts -->

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


        <div class="widget has-shadow" style="width: 100%;">
            <div class="widget-header bordered no-actions d-flex align-items-center">
                <h4>Product</h4>

            </div>
            <button data-toggle="modal" data-target="#add"
                    style="margin-bottom: 10px;" class="btn btn-success pull-right">
                <i class="fa fa-user-plus" aria-hidden="true"></i>
                Add product
            </button>

            <div class="widget-body">
                <div class="table-responsive">
                    <table id="sorting-table" class="table mb-0">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Product Name</th>
                            <th>Category</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->name_ar}}</td>
                            <td>{{$product->category->name_ar}}</td>
                            <td class="td-actions">
                                <a href="{{url('/')}}/product/{{$product->id}}/edit"><i class="la la-edit edit"></i></a>
                                <a href="#" onclick="event.preventDefault();
                                        document.getElementById('delete-form{{$product->id}}').submit();"><i class="la la-close delete"></i></a>
                                <form id="delete-form{{$product->id}}"
                                      action="{{url('/product/'.$product->id) }}"
                                      method="post"
                                      style="display: none;">
                                    @csrf
                                    <input type="hidden" name="_method" value="delete"/>

                                </form>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>




            {{--Start add modal --}}
            <div id="add" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Add Product</h4>
                        </div>
                        <div class="modal-body">

                            <form class="form-append" action="{{url('/')}}/product" enctype="multipart/form-data" method="post">
                                @csrf
                                
                           
                        <div class="row">
                            
                                
                                    <div class="form-group  col-lg-6">
                                        <label class="col-lg-3 form-control-label">Name</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="name_ar" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-6">
                                            <label class="col-lg-3 form-control-label">Name EN</label>
                                            <div class="col-lg-9">
                                                <input type="text" name="name_en" class="form-control">
                                            </div>
                                        </div>
                                    <div class="form-group col-lg-6">
                                        <label class="col-lg-3 form-control-label">Description</label>
                                        <div class="col-lg-9">
                                            <textarea type="text" name="description_ar" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-6">
                                            <label class="col-lg-3 form-control-label">Description EN</label>
                                            <div class="col-lg-9">
                                                <textarea type="text" name="description_en" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    <div class="form-group col-lg-12 tab-unit">
                                        <label class="col-lg-3 form-control-label">Color</label>
                                        <div class="row">
                                        
                                        <div class="col-md-3 ">
                                            <input value="#639e27" type="color" name="color[]" class="form-control color" id="nameAdd"
                                                   >
                                        </div>
                                        <div class="col-md-3">
<button type="button" class="appendText btn btn-primary">Add More Colors</button>
                                        </div>
                                        </div>
                                        

                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label class="col-lg-3 form-control-label">Image</label>
                                        <div class="col-lg-6">
                                            <input type="file" name="image" class="form-control" id="nameAdd"
                                                   placeholder="">
                                        </div>
                                        <div class="col-lg-3">
                                            
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label class="col-lg-3 form-control-label">Slider Image</label>
                                        <div class="col-lg-5">
                                            <input type="file" name="image_slider[]" multiple class="form-control" id="nameAdd"
                                                   placeholder="">
                                        </div>
                                        <div class="col-lg-4">
                                            
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label class="col-lg-3 form-control-label">Category</label>
                                        <div class="col-lg-9">
                                            <select name="category_id" class="selectpicker show-menu-arrow" data-live-search="true">
                                                @foreach($category as $categories)
                                                    <option value="{{$categories->id}}">{{$categories->name_ar}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label class="col-lg-3 form-control-label">tags</label>
                                        <div class="col-lg-9">
                                            <input type="text" data-role="tagsinput" name="tags_ar" class="form-control" id="nameAdd"
                                                   placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-6 maxs">
                                            <label class="col-lg-3 form-control-label">Tags EN</label>
                                            <div class="col-lg-9">
                                                <input type="text" data-role="tagsinput" name="tags_en" class="form-control" id="nameAdd"
                                                       placeholder="">
                                            </div>
                                        </div>
                                    <div class="form-group col-lg-6">
                                        <label class="col-lg-3 form-control-label">Size</label>
                                        <div class="col-lg-9">
                                            <input data-role="tagsinput" type="text" name="size" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label class="col-lg-3 form-control-label">Volume</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="volume" class="form-control" id="nameAdd"
                                                   placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label class="col-lg-3 form-control-label">Price</label>
                                        <div class="col-lg-9">
                                            <input type="number" name="price" class="form-control" id="nameAdd"
                                                   placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label class="col-lg-3 form-control-label">Offer</label>
                                        <div class="col-lg-9">
                                            <input type="number" name="offer" class="form-control" id="nameAdd"
                                                   placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label class="col-lg-3 form-control-label">Rate</label>
                                        <div class="col-lg-9">
                                            <select name="rate" class="selectpicker show-menu-arrow" data-live-search="true">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                            </select>
                                        </div>
                                    </div>
                                
                                        
                                        
                                        
                                   
                            
                        </div>
                 




                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success pull-right">Add</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                </div>
                            </form>

                        </div>

                    </div>

                </div>
            </div>
            {{--end add modl--}}







        </div>
    </div>



<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/bootstrap.tagsinput/0.4.2/bootstrap-tagsinput.min.js"></script>

<script type="text/javascript">
    
    var row = '<div class="row delete">'+
    '<div class="col-lg-5">'+
    '<input value="#639e27" type="color" '+
    'name="color[]" class="form-control color">'+
    '</div>'+
    '<div class="col-lg-5">'+
    '<button type="button" class="remove btn btn-primary">'+
    'Remove Color</button>'
    '</div>';
    '</div>';
    '</div>';

    $('.appendText').on('click', function () {
            $(this).closest('.form-append').find('.tab-unit').append(row);

        });


    $(document).on('click', '.remove', function (e) {

            console.log('remove');
            var whichtr = $(this).closest(".delete");
            whichtr.remove();
            console.log('removed');
        });

</script>

@endsection