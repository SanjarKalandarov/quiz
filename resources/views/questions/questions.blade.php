
@extends('link')
@section('content')

    <h3 style="text-align: center;">IT-professionallar  Sanjar</h3>
    <br>
    <br>

    <br>


    <div class="container-fluid">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                @foreach($errors->all() as $error)
                 <div class="alert alert-danger alert-dismissible fade show" role="alert">
                     <strong>Xato!</strong>
                     {{$error}}
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>

                @endforeach
                @if(\Illuminate\Support\Facades\Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Muvaffaqiyat!</strong>
                            {{\Illuminate\Support\Facades\Session::get('success')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
<?php  echo \Illuminate\Support\Facades\Session::forget('success'); ?>
                    @endif
            </div>
        </div>
    </div>
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-1"><h2>Users <b></b></h2></div>
                    <div class="col-sm-2"><a href="{{route('index')}}" class="btn btn-success">Bosh Sahida</a></div>
                    <div class="col-sm-5">
                        <button data-toggle="modal" data-target="#Modal_add1" class="btn btn-primary">Qo'shish</button>

                    </div>
                    <div class="col-sm-4">
                        <div class="search-box">

                            <input type="text" class="form-control" placeholder="Search&hellip;">
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Savol <i class="fa fa-sort"></i></th>

                    <th>Harakat</th>
                </tr>
                </thead>
                <tbody>
              @foreach($questions as $question)

                  <tr>
                      <td>{{$loop->index+1}}</td>
                      <td>{{$question->question}}</td>
                      <td >
                      <form method="POST" class="form-control d-flex" >
                          @csrf
                         @method("DELETE")


                          <a href="#" data-toggle="modal" data-target="#Modal_update1{{$question->id}}" class="btn btn-success">Yangilash</a>
                          <a href="#" data-toggle="modal" data-target="#Modal_up{{$question->id}}" class="btn btn-danger">Oʻchirish</a>


                      </form>

                      </td>
                  </tr>

                  <!-- Modal-Add -->
                  <div class="modal fade" id="Modal_add1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                          <div class="modal-content">
                              <form action="{{route('questions.store')}}" method="post">
                                  @csrf
                                  <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Qo'shish</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>
                                  <div class="modal-body">
                                      <div class="row">
                                          <h5>Savol qoshish</h5>
                                      </div>
                                      <div class="row">

                                          <div class="form-group">

                                              <input type="text" class="form-control" id="answer" name="questions" placeholder="Enter email">
                                          </div>

                                          <div class="form-check" style="visibility: hidden">
                                              <input type="hidden" class="form-check-input" id="exampleCheck1">
                                              <label class="form-check-label" for="exampleCheck1">Meni tekshiring</label>
                                          </div>

                                      </div>
                                      <div class="row">
                                          <div class="col-md-6"><label for="">A:</label></div>
                                          <div class="col-md-6"><label for="">B:</label></div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-6"><input type="text" name="optionA" class="form-control"></div>
                                          <div class="col-md-6"><input type="text" name="optionB" class="form-control"></div>

                                      </div>
                                      <div class="row">
                                          <div class="col-md-6"><label for="">C:</label></div>
                                          <div class="col-md-6"><label for="">D:</label></div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-6"><input type="text" name="optionC" class="form-control"></div>
                                          <div class="col-md-6"><input type="text" name="optionD" class="form-control"></div>

                                      </div>
                                      <div class="row ">
                                          <div class="col-md-12">
                                              <label for="">Javob</label>
                                              <select name="ans" id="" class="form-control">
                                                  <option value="">aa</option>
                                                  <option value="a">A</option>
                                                  <option value="b">B</option>
                                                  <option value="c">C</option>
                                                  <option value="D">D</option>
                                              </select>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Yopish</button>
                                      <button type="submit" class="btn btn-primary" >Savol qoshish</button>
                                  </div>
                              </form>
                          </div>

                      </div>
                  </div>

                  {{-- Modal update--}}
                  <div class="modal fade" id="Modal_update1{{$question->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                          <div class="modal-content">
                              <form action="{{route('questions.update',$question['id'])}}" method="post">
                                  @csrf
                                  @method("PUT")
                                  <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Yangilash</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>
                                  <div class="modal-body">
                                      <div class="row">
                                          <h5>Savol Tahrirlash</h5>
                                      </div>
                                      <div class="row">

                                          <div class="form-group">

                                              <input type="text" class="form-control" id="answer" value="{{$question->question}}" name="questions" placeholder="Enter email">
                                          </div>

                                          <div class="form-check" style="visibility: hidden">
                                              <input type="hidden" class="form-check-input" id="exampleCheck1">
                                              <label class="form-check-label" for="exampleCheck1">Meni tekshiring</label>
                                          </div>

                                      </div>
                                      <div class="row">
                                          <div class="col-md-6"><label for="">A:</label></div>
                                          <div class="col-md-6"><label for="">B:</label></div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-6"><input type="text" name="optionA" value="{{$question['a']}}" class="form-control"></div>
                                          <div class="col-md-6"><input type="text" name="optionB" value="{{$question['b']}}" class="form-control"></div>

                                      </div>
                                      <div class="row">
                                          <div class="col-md-6"><label for="">C:</label></div>
                                          <div class="col-md-6"><label for="">D:</label></div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-6"><input type="text" name="optionC" value="{{$question['c']}}"  class="form-control"></div>
                                          <div class="col-md-6"><input type="text" name="optionD" value="{{$question['d']}}"  class="form-control"></div>

                                      </div>
                                      <div class="row ">
                                          <div class="col-md-12">
                                              <label for="">Javob</label>
                                              <select name="ans" id="" class="form-control">
                                                  <option value="{{$question['ans']}}">{{$question['ans']}}</option>
                                                  <option value="a">A</option>
                                                  <option value="b">B</option>
                                                  <option value="c">C</option>
                                                  <option value="D">D</option>
                                              </select>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Yopish</button>
                                      <button type="submit" class="btn btn-primary" >Savol qoshish</button>
                                  </div>
                              </form>
                          </div>

                      </div>
                  </div>
{{--   delete--}}
                  <div class="modal fade" id="Modal_up{{$question->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                          <div class="modal-content">
                              <form action="{{route('questions.destroy',$question['id'])}}" method="post">
                                  @csrf
                                  @method("DELETE")
                                  <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Yangilash</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>
                                  <div class="modal-body">
                                      <div class="row">
                                          <h5>Siz Rostdanham o'chirishni hohlaysizmi</h5>
                                      </div>
                                  </div>
                                  <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Bekor qilish</button>
                                      <button type="submit" class="btn btn-primary" >O'chrish</button>
                                  </div>
                              </form>
                          </div>

                      </div>
                  </div>



              @endforeach

                </tbody>
            </table>

        </div>
    </div>
</div>



@endsection
