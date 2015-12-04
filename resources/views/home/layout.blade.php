<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $pageTitle or '我的博客'}}</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link href="//cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset("/assets/home/css/style.css") }}">    
    <script src="//cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
    <script src="//cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>    
    <script type="text/javascript" src="{{ asset("/assets/home/js/jquery.SuperSlide.2.1.1.js") }}"></script>
    <style>

    
    .post_body h1, h2, h3, h4, h5 {
        font-family: inherit;
        font-weight: 500;
        line-height: 1.1;
        color: inherit;
    }
    </style>
    @yield('style')
</head>
    <div role="banner" id="top" class="navbar navbar-static-top bs-docs-nav">
        <div class="container">
            <div class="navbar-header">
                <button data-target=".bs-navbar-collapse" data-toggle="collapse" type="button" class="navbar-toggle collapsed">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url('/') }}">StoneWorld</a>
            </div>
            <nav class="collapse navbar-collapse bs-navbar-collapse">
                <ul id="" class="nav navbar-nav">
                    <li id="" class="">
                        <a href="{{ url('music') }}">音乐</a>
                    </li>

                    
                    <li id="" class="">
                        <a href="">归档</a>
                    </li>
                    <li id="" class="">
                        <a href="{{ url('link') }}">友链</a>
                    </li>
                    <li id="" class="">
                        <a href="{{ url('contact') }}">有关于我</a>
                    </li>
                </ul>
                <form class="navbar-form navbar-right" role="search" method="get" id="searchform" action="/" >
                    <div class="form-group">
                        <input type="text" name="s" id="s" class="form-control search_control" placeholder="Search"  />
                    </div>
                    <button type="submit"  id="searchsubmit" value="search" class="btn btn-default btn_control">搜索</button>
                </form>
            </nav>
        </div>
    </div>
    @yield('content')
    <div class="container-fluid container-fluid-bgcolor footer">
        <div class="text-center list-inline hover">
            <!-- <li>
                <a href="">网站地图</a>
            </li>
            <li>
                <script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1253549440'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s95.cnzz.com/z_stat.php%3Fid%3D1253549440' type='text/javascript'%3E%3C/script%3E"));</script>
            </li> -->
        </div>
        <div class="text-center">
            <p>StoneWorld&nbsp;-&nbsp;流水当歌醉&nbsp;&nbsp;  落叶亦芳菲</p>
        </div>
        <div class="text-center">
            <p>
                <a href="http://www.miitbeian.gov.cn/" rel="external nofollow" target="_blank">备案做什么</a>
            </p>
        </div>
    </div>
    @yield('scripts')
</body>
</html>