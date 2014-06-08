@extends('layouts.main')


@section('content')



<div id="left-sidebar">
    <div id="top-left-sidebar">
        <h3>RECENT POSTS</h3>
    </div>

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
                <h2>{{ $post->post_title }}</h2>
                <p class="description">
                    {{ $post->post_content }}
                </p>

            </div>

        </div> <!-- end post-info -->

    </div><!-- end post -->


    <div id="disqus_thread"></div>
    <script type="text/javascript">
        /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
        var disqus_shortname = 'sestrenskyi'; // required: replace example with your forum shortname

        /* * * DON'T EDIT BELOW THIS LINE * * */
        (function() {
            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
    <!-- <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a> -->


</div><!-- end left-sidebar -->

@stop








