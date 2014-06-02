@extends('layouts.main')


@section('search-keyword')

    <section id="search-keyword">
        <h2>Результат поиска по запросу: <span>{{ $keyword }}</span></h2>
    </section><!-- end search-keyword -->


@stop

@section('content')


    <div id="left-sidebar">

        @if($emptyResult)
              <section id="empty-search-result">
                  <h3>{{ $emptyResult }}</h3>
              </section>
        @else
        @foreach($posts as $post)
            <div id="post">
                <div class="foto-post">
                    <a href="/start/view/{{ $post->id }}">
                        {{ HTML::image($post->image, $post->post_title, array('width'=>'593', 'height'=>'190')) }}
                    </a>
                </div>
                <div class="post-info">
                    <div class="info">
                        <p class="author-post">{{ $post->post_date }}<a href="#">{{ $post->post_author }}</a></p>
                    </div>
                    <div class="commentnum">
                        <p class="author-post">22 <a href="/start/view/{{ $post->id }}">  Comments</a></p>
                    </div>
                    <div class="clear"></div>
                    <span><hr /></span>
                    <div class="entry">
                        <h2><a href="/start/view/{{ $post->id }}">{{ $post->post_title }}</a></h2>
                        <p class="description">
                            {{  str_limit($post->post_content, 300, '...') }}
                        </p>
                        <p class="read-more"><a href="/start/view/{{ $post->id }}">Read More...</a></p>
                    </div>
                </div> <!-- end post-info -->
            </div><!-- end post -->
        @endforeach
        @endif

    </div><!-- end left-sidebar -->

@stop

@section('pagination')

    <section id="pagination">
        {{ $posts->links() }}
    </section><!-- end pagination -->

@stop