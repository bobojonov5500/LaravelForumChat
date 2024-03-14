@extends('show')
@section('title')comments@endsection
@section('content')


    <!-- topic chat  -->
    <div class="inner-main-body p-2 p-sm-3 collapse forum-content show">

        @foreach($comments as $create_topik)
            <div class="card-1 mb-2">
                <div class="card-body p-2 p-sm-3">
                    <div class="media forum-item">
                        <div class="media-body">
                          <h6>  user: {{$create_topik->user->name}}</h6>
                            <p class="text-secondary">
                               {{$create_topik->content}}
                            </p>
                            <p class="text-muted">  <span class="text-secondary font-weight-bold">{{$create_topik->created_at}}</span></p>
                        </div>
                </div>
            </div>
        @endforeach
    </div>


@endsection

