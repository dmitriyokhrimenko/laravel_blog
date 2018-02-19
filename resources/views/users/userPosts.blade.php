@extends('layouts.clear')

@section('content')

    <div class="col-sm-12 blog-main">
        @if (Auth::check())

            @if ($posts->count() > 0)
            @foreach($posts as $post)

                <!--Mobile version-->
                <div class="card text-center mobile-user-post">
                  <div class="card-header">
                    <a href="{{route('single.post', ['id' => $post->id])}}">{{$post->title}}</a>
                  </div>
                  <div class="card-body mobile-posts">
                    <h5 class="card-title">{{$post->preview}}</h5>
                    <p class="date-of-creation"><i><b>@lang('userPosts.Date of creation')</b></i>: {{$post->created_at}}</p>
                  </div>
                  <div class="card-footer text-muted">
                    <!--Delete post-->
                    <button type="submit" class="delete-post btn btn-round mobile-post-actions" data-toggle="modal" data-target="#deletePost-{{$post->id}}">
                        <span></span>
                    </button>
                    <!--Edit post-->
                    <a class="btn btn-round edit-post mobile-post-actions" href="{{route('edit.post',
                    ['id' => $post->id])}}" role="button"><span></span>
                    </a>
                    <!--Change status-->
                    <form method="post" action="{{route('change.status', ['id' => $post->id])}}" class="mobile-post-actions">
                        {{ csrf_field() }}
                        {{method_field('PUT')}}
                        <button type="submit" class="{{$post->status}} btn btn-round">
                            <span></span>
                        </button>
                    </form>

                    <input form="multi-select" type="checkbox" id="post-{{$post->id}}" name="group_delete[]" value="{{$post->id}}" class="delete-group mobile-post-actions"/>
                    <label for="post-{{$post->id}}"></label>
                  </div>
                  <!--Modal window delete post-->
                  <div class="modal fade" id="deletePost-{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="deletePostLabel" aria-hidden="true">
                   <div class="modal-dialog" role="document">
                     <div class="modal-content">
                       <div class="modal-header">
                         <h5 class="modal-title" id="exampleModalLabel">@lang('userPosts.Are you sure?')</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">x</span>
                         </button>
                       </div>
                       <div class="modal-footer">
                         <form method="post" action="{{route('delete.post', ['id' => $post->id])}}" class="action-delete-post">
                             {{ csrf_field() }}
                             {{method_field('DELETE')}}
                             <button type="submit" class="btn btn-danger">
                                 @lang('userPosts.Delete')
                             </button>
                             <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('userPosts.Close')</button>
                         </form>
                       </div>
                      </div>
                    </div>
                  </div> <!--Delete post modal window end-->
                </div><!--mobile version end-->
            @endforeach

            <!--Full version-->
                <table class="table table-striped user-posts">
                    <thead>
                    <tr>
                        <th scope="col">@lang('userPosts.Id')</th>
                        <th scope="col">@lang('userPosts.Select')</th>
                        <th scope="col">@lang('userPosts.Title')</th>
                        <th scope="col">@lang('userPosts.Date of creation')</th>
                        <th scope="col">@lang('userPosts.Status')</th>
                        <th scope="col">@lang('userPosts.Actions')</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($posts as $post)
                        <tr>
                            <th scope="row">{{$post->id}}</th>
                            <td>
                              <input form="multi-select" type="checkbox" id="post-{{$post->id}}" name="group_delete[]" value="{{$post->id}}" class="delete-group"/>
                              <label for="post-{{$post->id}}"></label>
                            </td>
                            <td><a href="{{route('single.post', ['id' => $post->id])}}">{{$post->title}}</a></td>
                            <td>{{$post->created_at}}</td>
                            <td>
                                <form method="post" action="{{route('change.status', ['id' => $post->id])}}">
                                    {{ csrf_field() }}
                                    {{method_field('PUT')}}
                                    <button type="submit" class="{{$post->status}} btn btn-round">
                                        <span></span>
                                    </button>
                                </form>
                            </td>
                            <td>
                                <!--Delete post-->
                                    <button type="submit" class="delete-post btn btn-round" data-toggle="modal" data-target="#deletePostFull-{{$post->id}}">
                                        <span></span>
                                    </button>
                                <!--Edit post-->
                                <a class="btn btn-round edit-post" href="{{route('edit.post',
                                ['id' => $post->id])}}" role="button"><span></span>
                                </a>
                            </td>
                        </tr>
                        <!--Modal window delete post-->
                        <div class="modal fade" id="deletePostFull-{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="deletePostFullLabel" aria-hidden="true">
                         <div class="modal-dialog" role="document">
                           <div class="modal-content">
                             <div class="modal-header">
                               <h5 class="modal-title" id="exampleModalLabel">@lang('userPosts.Are you sure?')</h5>
                               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">x</span>
                               </button>
                             </div>
                             <div class="modal-footer">
                               <form method="post" action="{{route('delete.post', ['id' => $post->id])}}" class="action-delete-post">
                                   {{ csrf_field() }}
                                   {{method_field('DELETE')}}
                                   <button type="submit" class="btn btn-danger">
                                       @lang('userPosts.Delete')
                                   </button>
                                   <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('userPosts.Close')</button>
                               </form>
                             </div>
                            </div>
                          </div>
                        </div> <!--Delete post modal window end-->
                    @endforeach
                    </tbody>
                </table>
                <div class="row group-select justify-content-center">

                    <!--Group deletion(Select All)-->

                    <button type="button" id="select-all" class="btn btn-primary select-all">@lang('userPosts.Select All')</button>
                    <form id="multi-select" method="post" action="{{route('delete.post')}}" class="action-delete-post">
                        {{ csrf_field() }}
                        {{method_field('DELETE')}}

                        <!--Group deletion(Button)-->

                        <button type="submit" id="delete" name="delete-group" class="btn btn-danger delete-group-btn">
                            @lang('userPosts.Delete selected records')
                        </button>
                    </form>
                </div>
            @else
            <h2 class="text-center">@lang('userPosts.You have not created any posts yet.')</h2>
            @endif
        @endif
    </div><!-- /.blog-main -->

@endsection
