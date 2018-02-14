@extends('layouts.clear')

@section('content')

@if($posts->count() > 0)
    <div class="col-sm-12 blog-main">
      <h2 class="text-center">@lang('archive.Archive of posts for') @lang('sidebar.'.request()->month) ({{request()->year}})</h2>
        <div class="row">
            @foreach($posts as $post)
                @if($post->status == 'published')
                    <div class="col-sm-6 col-md-4 article-card">
                        <div class="card">
                            @if(isset($post->thumbnail) && file_exists(public_path('/images/thumbnails/' . $post->thumbnail)))
                                <img class="card-img-top" src="{{asset('/images/thumbnails/' . $post->thumbnail)}}" alt="{{$post->title}}">
                            @else
                                <img class="card-img-top" src="{{asset('/images/app/no-image.png')}}" alt="no-image">
                            @endif
                            <div class="card-body">
                                <h4 class="blog-post-title"><a href="{{route('single.post', ['id' => $post->id])}}">{{$post->title}}</a></h4>
                                <p class="blog-post-meta">{{$post->created_at->format('Y-m-d')}}</p>
                                <p class="card-text">{{$post->preview}}</p>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        {{$posts->links()}}
    </div><!-- /.blog-main -->
@else
    <h1 class="text-center post-not-found">@lang('archive.Posts not found')</h1>
@endif
@endsection
