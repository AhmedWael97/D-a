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
                <h4>Send Mails</h4>

            </div>
            

            <div class="widget-body">
                

                    <form action="{{url('/')}}/sende-mail" method="POST" enctype="multipart/form-data" id="example-form">
                            @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row d-flex align-items-center mb-5">
                                    <label class="col-lg-3 form-control-label">E-mail</label>
                                    <div class="col-lg-9">
                                    <textarea name="mail" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
<div class="row">
    
    <div class="col-md-12">
                            <span>Select All</span>
                                 <input id="select_all" type="checkbox" name="checkbox">
                                    
                    </div>
                    <br>
                @foreach($users as $user)

                    <div class="col-md-4">
                            <span>{{$user->email}}</span>
                                 <input value="{{$user->id}}" type="checkbox" name="ids[]">
                                    
                    </div>

                @endforeach
</div>
<br>
<br>
<div class="text-center">
                        <button type="submit" class="btn btn-success text-center">Submit</button>
                    </div>
                        
                    </form>


                
            </div>

        </div>
    </div>


<script type="text/javascript">
    $('#select_all').change(function() {
        var checkboxes = $(this).closest('form').find(':checkbox');
        checkboxes.prop('checked', $(this).is(':checked'));
    });
</script>

@endsection