<p>
  您收到一封来自于个人博客的邮件
</p>
<p>
  详情如下:
</p>
<ul>
  <li>用户名: <strong>{{ $name }}</strong></li>
  <li>邮箱: <strong>{{ $email }}</strong></li>
  <li>联系方式: <strong>{{ $phone }}</strong></li>
</ul>
<hr>
<p>
  @foreach ($messageLines as $messageLine)
    {{ $messageLine }}<br>
  @endforeach
</p>
<hr>
