@extends('master')
@section('content')
    <!-- topic chat  -->
    <div class="inner-main-body p-2 p-sm-3 collapse forum-content show">

        <div class="card mb-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="text-muted small  align-self-center" id="myTable">
                            <h1 class="" style="color: black;font-size: 20px"><b>Savol: </b>{{$posts->title}}</h1>
                            <h1 class=" " style="color: black;font-size: 20px"><b>Savolga toliq izoh:
                                    :</b>{{$posts->description}}</h1>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="text-right "><p>{{$posts->user->name}}</p></div>
                    </div>
                </div>
            </div>

            <div class="card comments-section mb-2">


                <form method="Post" action="{{route('comments.store')}}">
                    @csrf
                    <input type="hidden" name="post_id" value="{{$posts->id}}">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="threadTitle">Fikr qoldirish</label>
                            <textarea name="content" class="form-control summernote" required></textarea>
                        </div>
                        @auth()
                        <button type="submit" class="btn btn-primary">Saqlash</button>
                    </div>
                </form>
@else
                    <div>Izoh qoldirish uchun
                        <a href="{{route('login')}}" class="btn btn-primary" >Kirish</a></div>
                @endauth
            </div>
            <div class="inner-main-body p-2 p-sm-3 collapse forum-content show">

                @foreach($comments as $comment)
                    <div class="card-1 mb-2">
                        <div class="card-body p-2 p-sm-3">
                            <div class="media forum-item">
                                <div class="media-body">
                                    <h6>  user: {{$comment->user->name}}</h6>
                                    <p class="text-secondary">
                                        {{$comment->content}}
                                    </p>
                                    <p class="text-muted">  <span class="text-secondary font-weight-bold">{{$comment->created_at}}</span></p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
            </div>

@endsection

