@extends('home.layout')
@section('style')
<style>
    .jumbotron_bg {
        background-image: url(assets/home/img/archive.png);
    }
    .post_body a{color: #008E59;}
    .post_body {
        background-color: #F0F2F7;
        padding: 0 30px;
        margin: 0px;
    }
    table {
    margin: 10px 0 15px 0;
    border-collapse: collapse;
    }
    td,th { 
        border: 1px solid #ddd;
        padding: 3px 10px;
    }
    th {
        padding: 5px 10px;  
    }
</style>
@endsection
@section('content')
<div class="jumbotron_bg" >
    <div class="jumbotron " style="background:rgba(54, 61, 77, 0.9);">
        <div class="container">
            <h1>友链</h1>
            <p>在心中那永远与众不同的，便是我的归属。{{--  --}}</p>
        </div>
    </div>
</div>
<div class="container">


    
    <div class="box linkcat row link_page_demo">
    <h3>我常去的网站</h3>
            <li class="col-md-4 link_list"><a href="http://www.u148.net" title="分享 超越 情怀 不仅仅是娱乐"><img src="http://www.xtwind.com/api/?url=http://www.u148.net" >有意思吧</a><small>分享 超越 情怀 不仅仅是娱乐</small></li><li class="col-md-4 link_list"><a href="http://music.163.com" title="听见好时光"><img src="http://www.xtwind.com/api/?url=http://music.163.com" >网易云音乐</a><small>听见好时光</small></li><li class="col-md-4 link_list"><a href="http://sae.sina.com.cn/" title="Sina App Engine"><img src="http://www.xtwind.com/api/?url=http://sae.sina.com.cn/" >SAE</a><small>Sina App Engine</small></li><li class="col-md-4 link_list"><a href="http://www.lampym.com" title="实用IT技能学习平台"><img src="http://www.xtwind.com/api/?url=http://www.lampym.com" >云知梦</a><small>实用IT技能学习平台</small></li><li class="col-md-4 link_list"><a href="http://daily.zhihu.com" title="每天3次 每次7分钟"><img src="http://www.xtwind.com/api/?url=http://daily.zhihu.com" >知乎日报</a><small>每天3次 每次7分钟</small></li>    </div>
    <!-- alt="' . $bookmark->link_description . '" -->
    
    <div class="box linkcat row link_page_demo">
    <h3>我的朋友们</h3>
            <li class="col-md-4 link_list"><a href="http://weibo.com/u/1742504773" title="夏天还是这个夏天"><img src="http://www.xtwind.com/api/?url=http://weibo.com/u/1742504773" >我的微博</a><small>夏天还是这个夏天</small></li><li class="col-md-4 link_list"><a href="http://pic.xtwind.com" title="稳定、快速、免费的图片托管服务"><img src="http://www.xtwind.com/api/?url=http://pic.xtwind.com" >图片托管</a><small>稳定、快速、免费的图片托管服务</small></li><li class="col-md-4 link_list"><a href="http://www.xtwind.com" title="人生如旅途 我们一边再见一边遇见"><img src="http://www.xtwind.com/api/?url=http://www.xtwind.com" >夏天的风</a><small>人生如旅途 我们一边再见一边遇见</small></li><li class="col-md-4 link_list"><a href="http://www.sxwzjs.cn/" title="注重品质和服务"><img src="http://www.xtwind.com/api/?url=http://www.sxwzjs.cn/" >山西晋网科技</a><small>注重品质和服务</small></li>    </div>
    <!-- alt="' . $bookmark->link_description . '" -->
    
    <div class="box linkcat row link_page_demo">
    <h3>友情链接</h3>
            <li class="col-md-4 link_list"><a href="http://www.iconfont.cn/" title="找寻图标的好去处"><img src="http://www.xtwind.com/api/?url=http://www.iconfont.cn/" >矢量图标库</a><small>找寻图标的好去处</small></li><li class="col-md-4 link_list"><a href="http://lusongsong.com/daohang/" title="卢松松的博客大全"><img src="http://www.xtwind.com/api/?url=http://lusongsong.com/daohang/" >博客大全</a><small>卢松松的博客大全</small></li>    </div>
    <!-- alt="' . $bookmark->link_description . '" -->
    
    <div class="box linkcat row link_page_demo">
    <h3>我遇见的人</h3>
            <li class="col-md-4 link_list"><a href="http://soz.im" title="其实我是一个演员"><img src="http://www.xtwind.com/api/?url=http://soz.im" >SOZ</a><small>其实我是一个演员</small></li><li class="col-md-4 link_list"><a href="http://www.greatsir.com" title="坚持做一件事"><img src="http://www.xtwind.com/api/?url=http://www.greatsir.com" >大先生</a><small>坚持做一件事</small></li><li class="col-md-4 link_list"><a href="http://boliquan.com/" title="夜光Life"><img src="http://www.xtwind.com/api/?url=http://boliquan.com/" >玻璃泉</a><small>夜光Life</small></li><li class="col-md-4 link_list"><a href="http://www.cinlen.com/" title="The deepestCold"><img src="http://www.xtwind.com/api/?url=http://www.cinlen.com/" >极度深冷</a><small>The deepestCold</small></li><li class="col-md-4 link_list"><a href="http://www.muwuxia.com" title="倚窗先生"><img src="http://www.xtwind.com/api/?url=http://www.muwuxia.com" >木屋下</a><small>倚窗先生</small></li><li class="col-md-4 link_list"><a href="http://www.zrj96.com" title="发现世界的精彩"><img src="http://www.xtwind.com/api/?url=http://www.zrj96.com" >初行博客</a><small>发现世界的精彩</small></li>    </div>
    <!-- alt="' . $bookmark->link_description . '" -->
    
    <div class="box linkcat row link_page_demo">
    <h3>那些技术博客</h3>
            <li class="col-md-4 link_list"><a href="http://blog.sae.sina.com.cn/" title="Sina App Engine Blog"><img src="http://www.xtwind.com/api/?url=http://blog.sae.sina.com.cn/" >SAE技术博客</a><small>Sina App Engine Blog</small></li><li class="col-md-4 link_list"><a href="http://timyang.net" title="关于架构、互联网技术."><img src="http://www.xtwind.com/api/?url=http://timyang.net" >Tim&#039;s blog</a><small>关于架构、互联网技术.</small></li><li class="col-md-4 link_list"><a href="http://blog.csdn.net/heiyeshuwu/" title="黑夜路人的开源世界"><img src="http://www.xtwind.com/api/?url=http://blog.csdn.net/heiyeshuwu/" >黑夜路人</a><small>黑夜路人的开源世界</small></li><li class="col-md-4 link_list"><a href="http://blogread.cn/" title="共学习,共进步."><img src="http://www.xtwind.com/api/?url=http://blogread.cn/" >IT技术博客大学习</a><small>共学习,共进步.</small></li><li class="col-md-4 link_list"><a href="http://www.laruence.com" title="PHP语言,PHP扩展,Zend引擎相关."><img src="http://www.xtwind.com/api/?url=http://www.laruence.com" >风雪之隅</a><small>PHP语言,PHP扩展,Zend引擎相关.</small></li>    </div>
    <!-- alt="' . $bookmark->link_description . '" -->

</div>
@endsection