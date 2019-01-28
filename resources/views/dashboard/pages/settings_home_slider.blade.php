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
                <h4>Slider Images</h4>

            </div>
            <button data-toggle="modal" data-target="#add"
                    style="margin-bottom: 10px;" class="btn btn-success pull-right">
                <i class="fa fa-user-plus" aria-hidden="true"></i>
                Add Images
            </button>

            <div class="widget-body">
                <div class="table-responsive">
                    <table id="sorting-table" class="table mb-0">
                        <thead>
                        <tr>
                            <th>#</th>
                            
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($settings_home_slider as $settings_home_slide)
                        <tr>
                            <td>{{$settings_home_slide->id}}</td>
                            
                            <td><img src="{{url('/')}}/img/alt_images/{{$settings_home_slide->image_slider}}" alt="" width="50"
                                     height="50"></td>
                            <td class="td-actions">
                                <a href="#"  data-toggle="modal" data-target="#edit{{$settings_home_slide->id}}"><i class="la la-edit edit"></i></a>
                                <a href="#" onclick="event.preventDefault();
                                        document.getElementById('delete-form{{$settings_home_slide->id}}').submit();"><i class="la la-close delete"></i></a>
                                <form id="delete-form{{$settings_home_slide->id}}"
                                      action="{{url('/settings_home_slider/'.$settings_home_slide->id) }}"
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
                            <h4 class="modal-title">Add Images</h4>
                        </div>
                        <div class="modal-body">

                            <form action="{{url('/')}}/settings_home_slider"  enctype="multipart/form-data" method="post">
                                @csrf
                                <div class="row">
                                    
                                    <div class="col-md-12">
                                        <div class="form-group row d-flex align-items-center mb-5">
                                            <label class="col-lg-3 form-control-label">Image</label>
                                            <div class="col-lg-6">
                                                <input type="file" multiple name="image_slider[]" class="form-control" id="nameAdd"
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
            @foreach($settings_home_slider as $settings_home_slide)

            <div id="edit{{$settings_home_slide->id}}" class="modal fade" role="dialog">
                <div class="modal-dialog ">

                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Update Image</h4>
                        </div>
                        <div class="modal-body">

                            <form action="{{url('/')}}/settings_home_slider/{{$settings_home_slide->id}}"  enctype="multipart/form-data" method="post">
                                @csrf
                                <input type="hidden" name="_method" value="PUT">
                                <div class="row">
                                    
                                    <div class="col-md-12">
                                    <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-3 form-control-label">Image</label>
                            <div class="col-lg-6">
                                <input type="file" name="image_slider" class="form-control" id="nameAdd"
                                       placeholder="">
                            </div>
                            <div class="col-lg-6">
                                <img src="{{url('/')}}/img/alt_images/{{$settings_home_slide->image_slider}}" alt="" width="50"
                                     height="50">
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