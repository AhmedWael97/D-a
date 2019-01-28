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
                <h4>Coupons</h4>

            </div>
            <button data-toggle="modal" data-target="#add"
                    style="margin-bottom: 10px;" class="btn btn-success pull-right">
                <i class="fa fa-user-plus" aria-hidden="true"></i>
                Add coupon
            </button>

            <div class="widget-body">
                <div class="table-responsive">
                    <table id="sorting-table" class="table mb-0">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Coupon ID</th>
                            <th>End Date</th>
                            <th>Offer %</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($coupons as $coupon)
                        <tr>
                            <td>{{$coupon->id}}</td>
                            <td>{{$coupon->coupon_id}}</td>
                            <td>{{$coupon->end_date}}</td>
                            <td>{{$coupon->offer}}</td>
                            
                            <td class="td-actions">
                                <a href="#"  data-toggle="modal" data-target="#edit{{$coupon->id}}"><i class="la la-edit edit"></i></a>
                                <a href="#" onclick="event.preventDefault();
                                        document.getElementById('delete-form{{$coupon->id}}').submit();"><i class="la la-close delete"></i></a>
                                <form id="delete-form{{$coupon->id}}"
                                      action="{{url('/coupon/'.$coupon->id) }}"
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
                            <h4 class="modal-title">Add coupon</h4>
                        </div>
                        <div class="modal-body">

                            <form action="{{url('/')}}/coupon"  enctype="multipart/form-data" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nameAdd">Coupon Id</label>
                                            <input required type="text" value="{{old('coupon_id')}}" name="coupon_id" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nameAdd">End Date</label>
                                            <input type="date" value="{{old('end_date')}}" name="end_date" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nameAdd">offer %</label>
                                            <input type="number" value="{{old('offer')}}" name="offer" class="form-control">
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
            @foreach($coupons as $coupon)

            <div id="edit{{$coupon->id}}" class="modal fade" role="dialog">
                <div class="modal-dialog ">

                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Update coupon</h4>
                        </div>
                        <div class="modal-body">

                            <form action="{{url('/')}}/coupon/{{$coupon->id}}"   enctype="multipart/form-data" method="post">
                                @csrf
                                <input type="hidden" name="_method" value="PUT">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nameAdd">Coupon Id</label>
                                            <input required type="text" value="{{$coupon->coupon_id}}" name="coupon_id" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nameAdd">End Date</label>
                                            <input type="date" value="{{$coupon->end_date}}" name="end_date" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nameAdd">offer %</label>
                                            <input type="number" value="{{$coupon->offer}}" name="offer" class="form-control">
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