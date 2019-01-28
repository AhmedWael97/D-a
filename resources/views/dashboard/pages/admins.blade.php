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
                <h4>Admins</h4>

            </div>
            <button data-toggle="modal" data-target="#add"
                    style="margin-bottom: 10px;" class="btn btn-success pull-right">
                <i class="fa fa-user-plus" aria-hidden="true"></i>
                Add Admin
            </button>

            <div class="widget-body">
                <div class="table-responsive">
                    <table id="sorting-table" class="table mb-0">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($admins as $admin)
                        <tr>
                            <td>{{$admin->id}}</td>
                            <td>{{$admin->name}}</td>
                            <td>{{$admin->email}}</td>
                            
                            <td class="td-actions">
                                <a href="#"  data-toggle="modal" data-target="#edit{{$admin->id}}"><i class="la la-edit edit"></i></a>
                                <a href="#" onclick="event.preventDefault();
                                        document.getElementById('delete-form{{$admin->id}}').submit();"><i class="la la-close delete"></i></a>
                                <form id="delete-form{{$admin->id}}"
                                      action="{{url('/admins/'.$admin->id) }}"
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
                            <h4 class="modal-title">Add Admin</h4>
                        </div>
                        <div class="modal-body">

                            <form action="{{url('/')}}/admins"  enctype="multipart/form-data" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nameAdd">Name</label>
                                            <input type="text" value="{{old('name')}}" name="name" class="form-control" id="nameAdd"
                                                   placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nameAdd">Email</label>
                                            <input type="text" value="{{old('email')}}" name="email" class="form-control" id="nameAdd"
                                                   placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nameAdd">Password</label>
                                            <input type="password" value="" name="password" class="form-control" id="nameAdd"
                                                   placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nameAdd">Confirm Password</label>
                                            <input type="password" value="" name="password_confirmation" class="form-control" id="nameAdd"
                                                   placeholder="">
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
            @foreach($admins as $admin)

            <div id="edit{{$admin->id}}" class="modal fade" role="dialog">
                <div class="modal-dialog ">

                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Update Admin</h4>
                        </div>
                        <div class="modal-body">

                            <form action="{{url('/')}}/admins/{{$admin->id}}"   enctype="multipart/form-data" method="post">
                                @csrf
                                <input type="hidden" name="_method" value="PUT">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nameAdd">Name</label>
                                            <input type="text" name="name" class="form-control" id="nameAdd"
                                                  value="{{$admin->name}}" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nameAdd">Email</label>
                                            <input type="text" name="email" class="form-control" id="nameAdd"
                                                  value="{{$admin->email}}" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nameAdd">password</label>
                                            <input type="password" name="password" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nameAdd">Confirm Password</label>
                                            <input type="password" name="password_confirmation" class="form-control">
                                        </div>
                                    </div>
                                    

                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success pull-right">Update</button>
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