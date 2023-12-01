@extends('link')
@section('content')
<div class="box1 bg-image" style="height: 100vh">

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-6" >


            </div>
            <div class="col-md-4" style="padding-top: 50vh;margin-left: 70vw;">
                <a class="btn btn-primary"  href="{{route('questions.index')}}" style="width: 20%" >
                    o'qituvchi
                </a>
                <a class="btn btn-primary" style="width: 20%"  href="{{route('start')}}">
                    Talaba
                </a>
            </div>
        </div>
    </div>
</div>


@endsection
