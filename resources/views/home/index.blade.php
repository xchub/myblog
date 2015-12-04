@extends('home.layout')
@section('content')
<div class="container-fluid visible-md-block visible-lg-block  slideParent" id="slideBoxBanner">
    <div class="row slideBody" id="slideBody" >
        <ul class="list-unstyled">
            @foreach ($viewArticles as $article)
            <li class="slide" >
                <div class="col-md-5 col-md-offset-1 slideImg">
                    <a href="{{ url('blog') }}/{{ $article->slug }}" target="_blank">
                        <img class='skip_lazyload' src="{{ asset('uploads/' . ($article->first_imgurl)) }}" alt='' title='#sliderCaption' />
                    </a>
                </div>
                <div class="col-md-5 slidePost">
                    <a href="{{ url('blog') }}/{{ $article->slug }}">
                        <h2>{{ $article->title }}</h2>
                    </a>
                    <p>
                        <p>
                            {{ str_limit(strip_tags($article->content_html, ''), 200)}}
                        </p>
                    </p>
                    <a href="{{ url('blog') }}/{{ $article->slug }}">
                        <button type="button" class="btn btn-default btn-lg btn_style">阅读全部</button>
                    </a>
                </div>
            </li>
            @endforeach

        </ul>
    </div>
    <a class="prev_banner" id="prev_banner" href="javascript:void(0)"></a>
    <a class="next_banner" id="next_banner" href="javascript:void(0)"></a>
    <div class="hd1" id="slideButton">
        <ul class="list-inline text-center"></ul>
    </div> 
</div>
<div class="container body_container">
    <div class="row">
        <div class="col-sm-12">
            <ul id="menu" class="list-inline category_list">
                <li style="color:#363d4d;">分类目录：</li>
                @foreach ($categories as $category)
                <li id="menu-item-1096" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-1096">
                    <a href="{{ url('categories') }}/{{ $category->slug }}">{{ $category->name }}</a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="row" id="mainSlideBox">

        @if($articles->count())
            @foreach ($articles as $article)
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4" id="block">
                    <div class="thumbnail">
                        <img src="{{ asset('uploads/' . ($article->first_imgurl)) }}" alt="">
                        <div class="caption">
                            <h2>
                                <a href="{{ url('blog') }}/{{ $article->slug }}"  title="{{ $article->title }}">{{ $article->title }}</a>
                            </h2>
                            <p>
                             {{ str_limit(strip_tags($article->content_html, ''), 150)}}

                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4" id="block">
            <h4>没有发现相关文章</h4>
            </div>
        @endif
    </div>  
</div>
{{-- appends(['sort' => 'votes']) --}}
@include('home.page', ['paginator' => $articles])
@endsection
@section('scripts')
<script type="text/javascript">
jQuery("#slideBoxBanner").slide({ mainCell:"#slideBody ul",effect:"leftLoop",easing:"swing",autoPlay:true, delayTime:500,titCell:"#slideButton ul",autoPage:"<li></li>",prevCell:"#prev_banner",nextCell:"#next_banner"});
</script>
@endsection