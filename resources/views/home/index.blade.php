@extends('home.layout')
<style>
    .pager li>a, .pager li>span {
        display: inline-block;
        padding: 5px 14px;
        background-color: #fff;
    }
</style>
@section('content')
<div class="container-fluid visible-md-block visible-lg-block  slideParent" id="slideBoxBanner">
    <div class="row slideBody" id="slideBody" >
        <ul class="list-unstyled">
            <li class="slide" >
                <div class="col-md-5 col-md-offset-1 slideImg">
                    <a href="" target="_blank">
                        <img class='skip_lazyload' src='' alt='' title='#sliderCaption' />
                    </a>
                </div>
                <div class="col-md-5 slidePost">
                    <a href="">
                        <h2>test</h2>
                    </a>
                    <p>
                        <p>
                            这是个差点就无法在新年面世的作品，我在腊月的上旬开始了该主题的制作。多事之冬，好在今晚还是完成了它。这是我最为满意的一个作品，它的每一像素都充满了优雅气质。经典的工业设计，素雅的视觉体验，优雅的文艺气息。相信这是这款主题吸引友友们最主要的原因吧。请尽情使用吧！
                        </p>
                    </p>
                    <a href="http://www.xtwind.com/summer-theme-open-source.html">
                        <button type="button" class="btn btn-default btn-lg btn_style">阅读全部</button>
                    </a>
                </div>
            </li>

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
            <ul id="menu-%e4%b8%ad%e9%97%b4%e5%88%86%e7%b1%bb%e5%af%bc%e8%88%aa%e6%9d%a1" class="list-inline category_list">
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
                        <img src="http://cdn.xtwind.com/uploads/2015/11/8f6b35fcbaf9f9530a0ad8d24a8a83c4.jpg?imageView2/1/w/340/h/200/q/100" alt="感叹一下时光(九)">
                        <div class="caption">
                            <h2>
                                <a href="{{ url('blog') }}/{{ $article->slug }}"  title="{{ $article->title }}">{{ $article->title }}</a>
                            </h2>
                            <p>
                                都说冬天，才是最适合恋爱的季节。尤其是在这样离别气息浓烈的氛围下，冷寂又落寞的我，突然想到这句话，就特别想念一个突来的怀抱。天气是这样的冷，心的温度也是冰凉的，喝热水派不上用场，冬天要来了。
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