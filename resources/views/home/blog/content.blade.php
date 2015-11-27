@extends('home.layout')
@section('style')
<style>
    a{color: #008E59;}
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
                            <a href="">
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
                                <a href="http://www.xtwind.com/tag/javascript" rel="tag">{{ $tag->tag }}</a>
                                @endforeach
                            </li>
                            <li class="like_btn ">
                                <a href="javascript:;" data-action="ding" data-id="1275" class="favorite">
                                    <span class="glyphicon glyphicon-heart "></span>
                                    <span class="count">0</span>
                                    Liker
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div style="margin-left:20px">
                    @include('home.disqus')
                </div>
                
            </div>
        </div>
    </div>
    @endsection