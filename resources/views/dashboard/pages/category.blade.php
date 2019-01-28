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
                <h4>Categories</h4>

            </div>
            <button data-toggle="modal" data-target="#add"
                    style="margin-bottom: 10px;" class="btn btn-success pull-right">
                <i class="fa fa-user-plus" aria-hidden="true"></i>
                Add category
            </button>

            <div class="widget-body">
                <div class="table-responsive">
                    <table id="sorting-table" class="table mb-0">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Name EN</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name_ar}}</td>
                            <td>{{$category->name_en}}</td>
                            <td><img src="{{url('/')}}/img/alt_images/{{$category->image}}" alt="" width="50"
                                     height="50"></td>
                            <td class="td-actions">
                                <a href="#"  data-toggle="modal" data-target="#edit{{$category->id}}"><i class="la la-edit edit"></i></a>
                                <a href="#" onclick="event.preventDefault();
                                        document.getElementById('delete-form{{$category->id}}').submit();"><i class="la la-close delete"></i></a>
                                <form id="delete-form{{$category->id}}"
                                      action="{{url('/category/'.$category->id) }}"
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
                <div class="modal-dialog ">

                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Add Category</h4>
                        </div>
                        <div class="modal-body">

                            <form action="{{url('/')}}/category"  enctype="multipart/form-data" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nameAdd">Name</label>
                                            <input required type="text" value="{{old('name_ar')}}" name="name_ar" class="form-control" id="nameAdd"
                                                   placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nameAdd">Name EN</label>
                                            <input type="text" value="{{old('name_en')}}" name="name_en" class="form-control" id="nameAdd"
                                                   placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row d-flex align-items-center mb-5">
                                            <label class="col-lg-3 form-control-label">Image</label>
                                            <div class="col-lg-6">
                                                <input required type="file" name="image" class="form-control" id="nameAdd"
                                                       placeholder="">
                                            </div>
                                            <div class="col-lg-3">
                                                
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
            {{--end add modl--}}



            {{--Start edit modal --}}
            @foreach($categories as $category)

            <div id="edit{{$category->id}}" class="modal fade" role="dialog">
                <div class="modal-dialog ">

                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Update Category</h4>
                        </div>
                        <div class="modal-body">

                            <form action="{{url('/')}}/category/{{$category->id}}"   enctype="multipart/form-data" method="post">
                                @csrf
                                <input type="hidden" name="_method" value="PUT">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nameAdd">Name</label>
                                            <input required type="text" name="name_ar" class="form-control" id="nameAdd"
                                                  value="{{$category->name_ar}}" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nameAdd">Name EN</label>
                                            <input type="text" name="name_en" class="form-control" id="nameAdd"
                                                  value="{{$category->name_en}}" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                    <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-3 form-control-label">Image</label>
                            <div class="col-lg-6">
                                <input type="file" name="image" class="form-control" id="nameAdd"
                                       placeholder="">
                            </div>
                            <div class="col-lg-6">
                                <img src="{{url('/')}}/img/alt_images/{{$category->image}}" alt="" width="50" height="50">
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

            @endforeach
            {{--end edit modl--}}



        </div>
    </div>




@endsection