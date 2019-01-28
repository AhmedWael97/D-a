@extends('dashboard.layout.App')
@section('content')

<hr>
    <div class="row flex-row">
        <div class="widget has-shadow" style="width: 100%;">
            
            <div class="widget-header bordered no-actions d-flex align-items-center">
                <h4>Analysis</h4>
            </div>
            
            <div class="widget-body">
                <div class="table-responsive">
                        {!! $chart->render() !!}
                </div>
                <br>
                    <hr>
                <br>
                <div class="table-responsive">
                        {!! $userschart->render() !!}
                </div>
                <br>
                    <hr>
                <br>
                <div class="table-responsive">
                        {!! $Orderschart->render() !!}
                </div>
                <br>
                    <hr>
                <br>
                <div class="table-responsive">
                        {!! $chartSizeOfView->render() !!}
                </div>
                
            </div>
        </div>
    </div>


@endsection