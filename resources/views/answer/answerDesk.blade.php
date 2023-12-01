@extends('link')
@section('content')
<div class="box2">

    <div class="container-fluid">
        <form action="{{route('submitans')}}" method="post">
        <div class="row" style="padding-top: 10vh;">
            <div class=" pt-5 text-center">
                <h1>Viktorina testi</h1>
            </div>
            <div class="col-md-3"></div>
            <div class="col-md-4">
                <h4 style="margin-left: 8%;">#{{\Illuminate\Support\Facades\Session::get('nextq')}}:{{$question->question}}</h4>
                <br>

                    @csrf
                    <input type="radio" checked="true" name="ans" id="">
                    (A) <small>{{$question->a}}</small>
                    <br>
                    <input type="radio" name="ans" id="">
                    (B) <small>{{$question->b}}</small>
                    <br>

                    <input type="radio" name="ans" id="">
                    (C) <small>{{$question->c}}</small>
                    <br>

                    <input type="radio" name="ans" id="">
                    (D) <small>{{$question->d}}</small>
                    <input type="hidden" style="visibility: hidden" value="{{$question->ans}}" name="dbans">


            </div>
            <div class="col-md-5">

            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-3"></div>
            <div class="col-md-4">
          <button type="submit" style="float: right" class="btn btn-danger">Keyingisi</button>
            </div>
            <div class="col-md-5"></div>
        </div>
        </form>
    </div>
</div>
@endsection
