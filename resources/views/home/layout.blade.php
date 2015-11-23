<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>test</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link href="//cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset("/assets/home/css/style.css") }}">
    <script src="//cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
    <script src="//cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>    
    <script type="text/javascript" src="{{ asset("/assets/home/js/jquery.SuperSlide.2.1.1.js") }}"></script>
    <style>body{ background-color: #fff; }</style>
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
                <a class="navbar-brand" href="http://www.xtwind.com">StoneWorld</a>
            </div>
            <nav class="collapse navbar-collapse bs-navbar-collapse">
                <ul id="" class="nav navbar-nav">
                    <li id="menu-item-737" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-737">
                        <a href="">音乐</a>
                    </li>

                    <li id="menu-item-739" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-739">
                        <a href="">友链</a>
                    </li>
                    <li id="menu-item-740" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-296 current_page_item menu-item-740">
                        <a href="">归档</a>
                    </li>
                    <li id="menu-item-738" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-738">
                        <a href="">留言</a>
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
            <li>
                <a href="">网站地图</a>
            </li>
            <li>
                <script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1253549440'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s95.cnzz.com/z_stat.php%3Fid%3D1253549440' type='text/javascript'%3E%3C/script%3E"));</script>
            </li>
        </div>
        <div class="text-center">
            <p>夏天的风&nbsp;-&nbsp;一个感叹时光分享成长,追求互联网技术的独立博客</p>
        </div>
        <div class="text-center">
            <p>
                <a href="http://www.miitbeian.gov.cn/" rel="external nofollow" target="_blank">闽ICP备14021366号-1</a>
            </p>
        </div>
    </div>
    @yield('scripts')
</body>
</html>