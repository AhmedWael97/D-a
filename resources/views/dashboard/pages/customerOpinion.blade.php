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
                <h4>Customers Opinion</h4>

            </div>
            <button data-toggle="modal" data-target="#add"
                    style="margin-bottom: 10px;" class="btn btn-success pull-right">
                <i class="fa fa-user-plus" aria-hidden="true"></i>
                Add Customer Opinion
            </button>

            <div class="widget-body">
                <div class="table-responsive">
                    <table id="sorting-table" class="table mb-0">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Opinion</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($CustomerOpinions as $CustomerOpinion)
                        <tr>
                            <td>{{$CustomerOpinion->id}}</td>
                            <td>{{$CustomerOpinion->opinion_ar}}</td>
                            <td class="td-actions">
                                <a href="#"  data-toggle="modal" data-target="#edit{{$CustomerOpinion->id}}"><i class="la la-edit edit"></i></a>
                                <a href="#" onclick="event.preventDefault();
                                        document.getElementById('delete-form{{$CustomerOpinion->id}}').submit();"><i class="la la-close delete"></i></a>
                                <form id="delete-form{{$CustomerOpinion->id}}"
                                      action="{{url('/CustomerOpinion/'.$CustomerOpinion->id) }}"
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
                            <h4 class="modal-title">Add Customer Opinion</h4>
                        </div>
                        <div class="modal-body">

                            <form action="{{url('/')}}/CustomerOpinion"  enctype="multipart/form-data" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="nameAdd">Opinion</label>
                                            <textarea type="text" name="opinion_ar" class="form-control">{{old('opinion_ar')}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="nameAdd">Opinion EN</label>
                                            <textarea name="opinion_en" class="form-control">{{old('opinion_en')}}</textarea>
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
            @foreach($CustomerOpinions as $CustomerOpinion)

            <div id="edit{{$CustomerOpinion->id}}" class="modal fade" role="dialog">
                <div class="modal-dialog ">

                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Update Customer Opinion</h4>
                        </div>
                        <div class="modal-body">

                            <form action="{{url('/')}}/CustomerOpinion/{{$CustomerOpinion->id}}"   enctype="multipart/form-data" method="post">
                                @csrf
                                <input type="hidden" name="_method" value="PUT">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="nameAdd">Opinion</label>
                                            <textarea type="text" name="opinion_ar" class="form-control">{{$CustomerOpinion->opinion_ar}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="nameAdd">Opinion EN</label>
                                            <textarea type="text" name="opinion_en" class="form-control">{{$CustomerOpinion->opinion_en}}</textarea>
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