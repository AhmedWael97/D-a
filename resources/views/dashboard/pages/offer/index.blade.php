@extends('dashboard.layout.App')
@section('content')

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
                <h4>Offers</h4>

            </div>
            <button data-toggle="modal" data-target="#add"
                    style="margin-bottom: 10px;" class="btn btn-success pull-right">
                <i class="fa fa-user-plus" aria-hidden="true"></i>
                Add Offer
            </button>

            <div class="widget-body">
                <div class="table-responsive">
                    <table id="sorting-table" class="table mb-0">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Product Name</th>
                            <th>imgae</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($OfferSection as $OfferSectio)
                        <tr>
                            <td>{{$OfferSectio->id}}</td>
                            <td>{{$OfferSectio->products->name_ar}}</td>
                            <td><img src="{{url('/')}}/img/alt_images/{{$OfferSectio->image}}" alt="" width="50"
                                     height="50"></td>
                            <td class="td-actions">
                                <a href="{{url('/')}}/OfferSection/{{$OfferSectio->id}}/edit"><i class="la la-edit edit"></i></a>
                                <a href="#" onclick="event.preventDefault();
                                        document.getElementById('delete-form{{$OfferSectio->id}}').submit();"><i class="la la-close delete"></i></a>
                                <form id="delete-form{{$OfferSectio->id}}"
                                      action="{{url('/OfferSection/'.$OfferSectio->id) }}"
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
                            <h4 class="modal-title">Add Offer</h4>
                        </div>
                        <div class="modal-body">

                            <form action="{{url('/')}}/OfferSection" enctype="multipart/form-data" method="post">
                                @csrf
                                
                    <div class="col-md-12">        
                        <div class="row">
                            
                                <div class="col-md-6">
                                    <div class="form-group row d-flex align-items-center mb-5">
                                        <label class="col-lg-3 form-control-label">Title</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="title_ar" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row d-flex align-items-center mb-5">
                                        <label class="col-lg-3 form-control-label">Description</label>
                                        <div class="col-lg-9">
                                            <textarea name="description_ar" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row d-flex align-items-center mb-5">
                                        <label class="col-lg-3 form-control-label">Image</label>
                                        <div class="col-lg-6">
                                            <input type="file" name="image" class="form-control" id="nameAdd"
                                                   placeholder="">
                                        </div>
                                        <div class="col-lg-3">
                                            
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row d-flex align-items-center mb-5">
                                        <label class="col-lg-3 form-control-label">Product</label>
                                        <div class="col-lg-9">
                                            <select name="product_id" class="selectpicker show-menu-arrow" data-live-search="true">
                                                @foreach($product as $produc)
                                                    <option value="{{$produc->id}}">{{$produc->name_ar}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    
                                </div>


                                <div class="col-md-6">
                                        <div class="form-group row d-flex align-items-center mb-5">
                                            <label class="col-lg-3 form-control-label">Title EN</label>
                                            <div class="col-lg-9">
                                                <input type="text" name="title_en" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row d-flex align-items-center mb-5">
                                            <label class="col-lg-3 form-control-label">Description EN</label>
                                            <div class="col-lg-9">
                                                <textarea name="description_en" class="form-control"></textarea>
                                            </div>
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







        </div>
    </div>




@endsection