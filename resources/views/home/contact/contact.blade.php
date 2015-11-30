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
            <h1>有关于我</h1>
            <p>当你凝视深渊的时候 深渊也在凝视你。{{-- 在心中那永远与众不同的，便是我的归属。 --}}</p>
        </div>
    </div>
</div>
<div class="container">
    <div class="post_body">
        <div class="post_content">
            <h2>汪帅</h2>
            <p>性别:男&nbsp;  爱好:↑</p>
            <h3>基本情况</h3>
            <p>2015年毕业于大连海洋大学，两年web 开发经验。</p>
            <ol>
                <li>邮箱：stoneworld1991#gmail.com</li>
                <li>主页：stoneworld.me</li>
                <li>
                    博客园:
                    <a href="http://www.cnblogs.com/Stone--world/">@stoneworld</a>
                </li>
            </ol>
            <h3>技能点</h3>
            <table>
                <thead>
                    <tr>
                        <th>技能</th>
                        <th align="center">熟悉程度</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>PHP</td>
                        <td align="center">★★★★☆</td>
                    </tr>
                    <tr>
                        <td>Python</td>
                        <td align="center">★★★★☆</td>
                    </tr>
                    <tr>
                        <td>Linux</td>
                        <td align="center">★★★☆☆</td>
                    </tr>
                    <tr>
                        <td>Markdown</td>
                        <td align="center">★★★★☆</td>
                    </tr>
                    <tr>
                        <td>javascript</td>
                        <td align="center">★★★☆☆</td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
    <div class="row" id="respond">
        @include('admin.partials.errors')
        @include('admin.partials.success')
        <form action="{{ url('contact') }}" method="post">
            <div class="col-md-12 cpmment_welcometip">
                <p>发送邮件给我</p>
            </div>

            <div class="col-md-4 comment_input">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="您的昵称"></div>
            <div class="col-md-4 comment_input">
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="您的邮箱"></div>
            <div class="col-md-4 comment_input">
                <input type="tel" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" placeholder="您的联系方式(非必须)"></div>
            <div class="col-md-12 comment_input">
                <textarea rows="5" class="form-control" id="message"
                        name="message" placeholder="说点什么呢？">{{ old('message') }}</textarea>

            </div>

            <div class="col-md-3  text-left login_welcom "></div>

            <div class="col-md-3 col-md-offset-6 comment_button">
                <button name="submit" type="submit" id="submit"  value="send" class="btn btn-default btn-lg btn-block">确认发送</button>
            </div>
        </form>
    </div>
</div>
@endsection