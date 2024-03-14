@extends('master')
@section('content')


    <!-- topic chat  -->
    <div class="inner-main-body p-2 p-sm-3 collapse forum-content show">

        @foreach($posts as $create_topik)
            <div class="card mb-2">
                <div class="card-body p-2 p-sm-3">
                    <div class="media forum-item">
                        <div class="media-body">
                          <span class="border rounded p-1 ">  user: {{$create_topik->user->name}}</span>
                            <h6 class="mt-2"><a href="{{route('posts.show',$create_topik->id)}}"> {{$create_topik->title}}</a></h6>
                            <p class="text-secondary">
                               {{$create_topik->description}}
                            </p>
                            <p  class="text-muted mt-2 ">  <span class="text-secondary border rounded p-1 font-weight-bold">{{$create_topik->created_at}}</span></p>
                        </div>
                        <div class="text-muted small text-center align-self-center">
                        @auth
                          @if(auth()->user()->id==$create_topik->user->id)
                                    <form class="buttons" action="{{route('posts.destroy',$create_topik->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                    <button class="btn btn-outline-primary" type="button" data-toggle="modal" data-target="#threadModal{{$create_topik->id}}">Edit</button>
                                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                                    </form>
                                @endif
                            @endauth
                            <a href="{{route('comments.index')}}"> </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="threadModal{{$create_topik->id}}" tabindex="-1" role="dialog" aria-labelledby="threadModalLabel"
                 aria-hidden="true">
                <!-- Modal  -->
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <form method="Post" action="{{route('posts.update',$create_topik->id)}}">
                            @method("PUT")
                            @csrf
                            <div class="modal-header d-flex align-items-center bg-primary text-white">
                                <h6 class="modal-title mb-0" id="threadModalLabel">New edit</h6>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="threadTitle">Title</label>
                                    <input type="text" name="title" class="form-control" id="threadTitle"
                                           placeholder="Enter new topic" value="{{$create_topik->title}}" required autofocus/>
                                </div>
                                <div class="form-group">
                                    <label for="threadTitle">Description</label>
                                    <textarea  type="text" name="description" class="form-control summernote" required>{{$create_topik->description}}</textarea>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                                <input type="submit" class="btn btn-primary" value="submit">
                            </div>
                        </form>
                    </div>
                </div>
                <!-- End Modal  -->
            </div>

        @endforeach
        <div class="card mb-2"></div>
    </div>

    <div class="modal fade" id="threadModal" tabindex="-1" role="dialog" aria-labelledby="threadModalLabel"
         aria-hidden="true">
        <!-- Modal  -->
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form method="Post" action="{{route('posts.store')}}">
                    @csrf
                    <div class="modal-header d-flex align-items-center bg-primary text-white">
                        <h6 class="modal-title mb-0" id="threadModalLabel">Yangi mavzuni qo'shish </h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="threadTitle">Sarlavha</label>
                            <input type="text" name="title" class="form-control" id="threadTitle"
                                   placeholder="Enter new topic" required autofocus/>
                        </div>
                        <label for="textare">Muammoingizning tafsilotlari qanday?</label>
                        <textarea  minlength="20" name="description" class="form-control summernote " id="textare" required></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                        <input type="submit" class="btn btn-primary" value="submit">
                    </div>
                </form>
            </div>
        </div>
        <!-- End Modal  -->
    </div>

@endsection

