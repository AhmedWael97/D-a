@extends('dashboard.layout.App')
@section('content')
<style>
    
</style>

<hr>
<div class="row flex-row">
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
    <div class="col-12">
        <!-- Form -->
        <div class="widget has-shadow">
            <div class="widget-header bordered no-actions d-flex align-items-center">
                <h4>About & Social</h4>
            </div>
            <div class="widget-body">
@if($about)
                <form action="{{url('/')}}/about/{{$about->id}}" method="POST" enctype="multipart/form-data" id="example-form">
                    <input type="hidden" name="_method" value="PUT">
                    @csrf
                    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-3 form-control-label">About</label>
                            <div class="col-lg-9">
                                <textarea name="about_ar" class="form-control">{{$about->about_ar}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-3 form-control-label">About EN</label>
                            <div class="col-lg-9">
                                <textarea name="about_en" class="form-control">{{$about->about_en}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-3 form-control-label">FaceBook</label>
                            <div class="col-lg-9">
                                <input type="text" value="{{$about->facebook}}" name="facebook" class="form-control">
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-3 form-control-label">twitter</label>
                            <div class="col-lg-9">
                                <input type="text" value="{{$about->twitter}}" name="twitter" class="form-control">
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-3 form-control-label">google</label>
                            <div class="col-lg-9">
                                <input type="text" value="{{$about->google}}" name="google" class="form-control">
                            </div>
                        </div>
                    </div>
                    
                    
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-success text-center">Submit</button>
                    </div>

                </form>
@endif
            </div>
        </div>
        <!-- End Form -->
    </div>
</div>




@endsection