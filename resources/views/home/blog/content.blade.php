@extends('home.layout')
@section('style')

<style>
    .post_body a{color: #008E59;}
    .social-share {float: right;}
    .social-share .social-share-icon {padding-left: 5px;}
</style>

@endsection
@section('content')
<div class="container post_view_margin">
    <div class="row">
        <div class="col-md-9">
            <div class="post_body">
                <h1>{{ $post->title }}</h1>
                <div class="post_view_meta">
                    <ul class="list-inline">
                        <li>
                            <span class="glyphicon glyphicon-calendar"></span>
                            &nbsp;{{ $post->publish_date }}
                        </li>
                        <li>/</li>

                        <li id="view">
                            <span class="glyphicon glyphicon-eye-open"></span>
                            &nbsp; {{ $post->view_cache }} Views
                        </li>
                        <!-- <li>/</li>
                        <li>
                            <span class="glyphicon glyphicon-pencil"></span>
                            &nbsp;
                            <a href="http://www.xtwind.com/analysis-on-the-jquery-framework-top.html#respond">0 条评论</a>
                        </li> -->
                        <li>/</li>
                        <li>
                            <a href=" {{ url('categories') }}/{{ $post->categories->slug }} ">
                                <span class="glyphicon glyphicon-tag"></span>
                                &nbsp;{{ $post->categories->name }}
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="post_content">
                        {!! $post->content_html  !!}
                        <div id='postTemp' style='display:none;'>postView_1275_analysis-on-the-jquery-framework-top</div>
                </div>
                    <div class="post_view_category">
                        <ul class="list-inline">
                            <li>
                                <span class="glyphicon glyphicon-tags"></span>
                                &nbsp;标签：
                            </li>
                            <li>
                                @foreach ($post->tags as $tag)
                                <a href="{{ url('tag') }}/{{ $tag->tag }}" rel="tag">{{ $tag->title }}</a>
                                @endforeach
                            </li>
                           <div class="social-share" data-initialized="true">
                                <a href="#" class="social-share-icon icon-weibo"></a>
                                <a href="#" class="social-share-icon icon-qq"></a>
                                <a href="#" class="social-share-icon icon-wechat"></a>
                                <a href="#" class="social-share-icon icon-qzone"></a>
                                <a href="#" class="social-share-icon icon-douban"></a>
                            </div>
                            <link rel="stylesheet" href="{{ asset("/assets/share/dist/css/share.min.css") }}">
                            <script src="{{ asset("/assets/share/dist/js/share.min.js") }}"></script>
                            <!-- <li class="like_btn ">
                                <a href="javascript:;" data-action="ding" data-id="1275" class="favorite">
                                    <span class="glyphicon glyphicon-heart "></span>
                                    <span class="count">0</span>
                                    Liker
                                </a>
                            </li> -->
                        </ul>
                    </div>
                    @include('home.disqus')
                </div>  
            </div>
        </div>
    </div>
    @endsection