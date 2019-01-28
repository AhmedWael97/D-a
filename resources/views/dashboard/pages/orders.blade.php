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
                <h4>Orders</h4>

            </div>
            

            <div class="widget-body">
                <div class="table-responsive">
                    <table id="sorting-table" class="table mb-0">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Type</th>
                            
                            <th>statuse</th>
                            <th>Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($Orders as $Order)
                        <tr>
                            <td>{{$Order->id}}</td>
                            <td>{{$Order->name}}</td>
                            <td>{{$Order->email}}</td>
                            <td>{{$Order->address}}</td>
                            <td>{{$Order->type == 1? 'paypal' : 'Cash on Delevery'}}</td>
                           
                            <td>{{$Order->statuse}}</td>
                            <td class="td-actions">
                                <a href="#"  data-toggle="modal" data-target="#view{{$Order->id}}"><i class="la la-eye eye"></i></a>
                                <a href="#"  data-toggle="modal" data-target="#edit{{$Order->id}}"><i class="la la-edit edit"></i></a>
                                <a href="#" onclick="event.preventDefault();
                                        document.getElementById('delete-form{{$Order->id}}').submit();"><i class="la la-close delete"></i></a>
                                <form id="delete-form{{$Order->id}}"
                                      action="{{url('/deleteOrders/'.$Order->id) }}"
                                      method="post"
                                      style="display: none;">
                                    @csrf
                                    <input type="hidden" name="_method" value="delete"/>

                                </form>
                            </td>
                        </tr>

                        <div id="edit{{$Order->id}}" class="modal fade" role="dialog">
                <div class="modal-dialog ">

                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Update Statuse</h4>
                        </div>
                        <div class="modal-body">

                            <form action="{{url('/')}}/updatestatuse/{{$Order->id}}"   enctype="multipart/form-data" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nameAdd">Statuse</label>
                                            <select name="statuse" class="form-control" id="nameAdd" placeholder="">
                                                <option value="pendding">pendding</option>
                                                <option value="delevered">delevered</option>
                                                <option value="refund">refund</option>
                                            </select>
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
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

@foreach($Orders as $Order)
 <div id="view{{$Order->id}}" class="modal fade" role="dialog">
                <div class="modal-dialog ">

                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"></h4>
                        </div>
                        <div class="modal-body">

                            
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nameAdd">name:</label>
                                            <span>{{$Order->name}}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nameAdd">Phone:</label>
                                            <span>{{$Order->phone}}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nameAdd">Email:</label>
                                            <span>{{$Order->email}}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nameAdd">Address:</label>
                                            <span>{{$Order->address}}</span>
                                        </div>
                                    </div>
                                    </div>
        <table class="table mb-0">
            <thead>
                 <tr>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Size</th>
                    <th>Color</th>
                </tr>
            </thead>

            <body>
                @foreach($Order->order_products as $order_products)
                <?php 
                $product = \App\products::where('id',$order_products->product_id)->first();
                ?>
                <tr>
                    <th>{{$product->name_ar }}</th>
                    <th>{{$order_products->quantity }}</th>
                    <th>{{$order_products->size }}</th>
                    <th>{{$order_products->color }}</th>
                </tr>
                @endforeach
            </body>
        </table>
                                    

                                
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                </div>
                            

                        </div>

                    </div>

                </div>
            </div>
@endforeach

@endsection