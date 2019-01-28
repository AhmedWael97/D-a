@extends('dashboard.layout.App')
@section('content')

<hr>
    <div class="row flex-row">
        <div class="widget has-shadow" style="width: 100%;">
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
            <div class="widget-header bordered no-actions d-flex align-items-center">
                <h4>Deal</h4>

            </div>
            

            <div class="widget-body">
                <div class="table-responsive">
                    <table id="sorting-table" class="table mb-0">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>product</th>
                            <th>Image</th>
                            <th>Edit</th>
                        </tr>
                        </thead>
                        <tbody>
                        
                        <tr>
                            @if($deal)
                            <td>{{$deal->id}}</td>
                            <td>{{$deal->title_ar}}</td>
                            <td>{{$deal->products->name_ar}}</td>
                            
                            <td><img src="{{url('/')}}/img/alt_images/{{$deal->image}}" alt="" width="50"
                                     height="50"></td>
                            <td class="td-actions">
                                <a href="#"  data-toggle="modal" data-target="#edit{{$deal->id}}"><i class="la la-edit edit"></i></a>
                                
                            </td>
                            @endif
                        </tr>
                        
                        </tbody>
                    </table>
                </div>
            </div>




            



            {{--Start edit modal --}}

@if($deal)
            <div id="edit{{$deal->id}}" class="modal fade" role="dialog">
                <div class="modal-dialog ">

                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Update Image</h4>
                        </div>
                        <div class="modal-body">

                            <form action="{{url('/')}}/deal/{{$deal->id}}"  enctype="multipart/form-data" method="post">
                                @csrf
                                <input type="hidden" name="_method" value="PUT">
                                <div class="row">
                                    
                    <div class="col-md-12">
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-3 form-control-label">Image</label>
                            <div class="col-lg-6">
                                <input type="file" name="image" class="form-control" id="nameAdd"
                                       placeholder="">
                            </div>
                            <div class="col-lg-6">
                                <img src="{{url('/')}}/img/alt_images/{{$deal->image}}" alt="" width="50" height="50">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-3 form-control-label">Title</label>
                            <div class="col-lg-6">
                                <input value="{{$deal->title_ar}}" type="text" name="title_ar" class="form-control" id="nameAdd"
                                       placeholder="">
                            </div>
                            
                            
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-3 form-control-label">Title EN</label>
                            <div class="col-lg-6">
                                <input value="{{$deal->title_en}}" type="text" name="title_en" class="form-control" id="nameAdd"
                                       placeholder="">
                            </div>
                            
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-3 form-control-label">Select Product</label>
                            <div class="col-lg-6">
                                <select name="product_id" class="selectpicker show-menu-arrow" data-live-search="true">
                                    @foreach($product as $produc)
                                        <option {{ $deal->product_id == $produc->id ? "selected" : "" }} value="{{$produc->id}}">{{$produc->name_ar}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-6">
                               
                            </div>
                            
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

       @endif
            {{--end edit modl--}}



        </div>
    </div>




@endsection