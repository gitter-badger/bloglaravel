@extends('layouts.main')


@section('content')


<div id="left-sidebar">
    <div id="top-left-sidebar">
        <h3>RECENT POSTS</h3>
    </div>

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

</div><!-- end left-sidebar -->



@stop
