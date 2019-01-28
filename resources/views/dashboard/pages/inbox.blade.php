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
                <h4>Inbox</h4>

            </div>
            

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
                        @foreach($inbox as $inbo)
                        <tr>
                            <td>{{$inbo->id}}</td>
                            <td>{{$inbo->name}}</td>
                            <td>{{$inbo->email}}</td>
                            
                            <td class="td-actions">
                                <a href="#"  data-toggle="modal" data-target="#edit{{$inbo->id}}"><i class="la la-eye eye"></i></a>
                                <a href="#" onclick="event.preventDefault();
                                        document.getElementById('delete-form{{$inbo->id}}').submit();"><i class="la la-close delete"></i></a>
                                <form id="delete-form{{$inbo->id}}"
                                      action="{{url('/inbox/'.$inbo->id) }}"
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






            {{--Start edit modal --}}
            @foreach($inbox as $inbo)

            <div id="edit{{$inbo->id}}" class="modal fade" role="dialog">
                <div class="modal-dialog ">

                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Message</h4>
                        </div>
                        <div class="modal-body">

                            <form action="{{url('/')}}/inbox/{{$inbo->id}}"   enctype="multipart/form-data" method="post">
                                @csrf
                                <input type="hidden" name="_method" value="PUT">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <luabel for="nameAdd">Name</label>
                                            <input disabled="" type="text" name="name" class="form-control" id="nameAdd"
                                                  value="{{$inbo->name}}" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nameAdd">Email</label>
                                            <input disabled type="text" name="email" class="form-control" id="nameAdd"
                                                  value="{{$inbo->email}}" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nameAdd">Message</label>
                                                  <textarea disabled name="message" class="form-control"
                                                  >
                                                      {{$inbo->message}}
                                                  </textarea>
                                        </div>
                                    </div>
                                    

                                </div>
                                <div class="modal-footer">
                                    
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