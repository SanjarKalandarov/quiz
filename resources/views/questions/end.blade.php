@extends('link')
@section('content')


    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5"></div>
            <div class="col-md-4">
                <label for="">
                    To'g'ri: <smel>{{\Illuminate\Support\Facades\Session::get('correct')}}</smel>
                </label>
                <label for="">
                    Noto'g'ri: <smel>{{\Illuminate\Support\Facades\Session::get('wrongans')}}</smel>
                </label>
                <label for="">
                    Natija: <smel>{{\Illuminate\Support\Facades\Session::get('correct')}}/{{\Illuminate\Support\Facades\Session::get('wrongans')}}</smel>
                </label>
                <a href="" class="btn btn-primary" style="display: block;width: 30%;margin-left: 7%;">Viktorinani yakunlash</a>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>






    {{--    <!-- Button trigger modal -->--}}
    {{--    <button type="button" class="btn btn-primary" id="myModal" data-toggle="modal" data-target="#exampleModal">--}}
    {{--        Launch demo modal--}}
    {{--    </button>--}}

    {{--    <!-- Modal -->--}}
    {{--    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
    {{--        <div class="modal-dialog" role="document">--}}
    {{--            <div class="modal-content">--}}
    {{--                <div class="modal-header">--}}
    {{--                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>--}}
    {{--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
    {{--                        <span aria-hidden="true">&times;</span>--}}
    {{--                    </button>--}}
    {{--                </div>--}}
    {{--                <div class="modal-body">--}}
    {{--                    ...--}}
    {{--                </div>--}}
    {{--                <div class="modal-footer">--}}
    {{--                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
    {{--                    <button type="button" class="btn btn-primary">Save changes</button>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    {{--<script>--}}
    {{--    $('#myModal').on('shown.bs.modal', function () {--}}
    {{--        $('#myInput').trigger('focus')--}}
    {{--    })--}}
    {{--</script>--}}
@endsection

