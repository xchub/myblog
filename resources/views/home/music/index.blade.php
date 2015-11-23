@extends('home.layout')
@section('content')
<div class="jumbotron_bg" >
        <div class="jumbotron " style="background:rgba(54, 61, 77, 0.9);">
            <div class="container">
                <h1>音乐</h1>
                <p>流水当歌醉 醉兮独酌 落叶亦芳菲 菲兮袭予</p>
        </div>
    </div>
    </div>
    <div class="container">
        @for($i=0, $i < $page, $i++)
        <div class="album--nice-list row">
            @foreach ($music['info'][$i] as $key=>$item)
            <div class="album--nice col-md-3" data-type="163collect" data-thumbnail="{{ $item['playlist_coverImgUrl'] }}" data-id="{{ $item['playlist_id'] }}"  data-tooltip="{{ $item['playlist_name'] }}">
                <img src="{{ $item['playlist_coverImgUrl'] }}?param=180y180"> <i class="fxfont"></i>
                <span class="music-info">{{ $item['playlist_name'] }}</span>
            </div>
            @endforeach
        </div>
        @endfor
        <div class="music-page-navi"></div>
    </div>

    <div class="nmplaybar">
        <div class="nmplayer-prosess"></div>
        <div class="nmplayer-wrap">
            <div class="nmplayer-info">
                <span class="nmplayer-title"></span>
                <span class="nmplayer-time"></span>
                <span class="nmplayer-lrc"></span>
            </div>
            <div class="nmplayer-control">
                <ul>
                    <li>
                        <a id="nmplayer-prev" href="javascript:;">
                            <span class="icon-previous fxfont "></span>
                        </a>
                    </li>
                    <li>
                        <a id="nmplayer-button" href="javascript:;">
                            <span class="icon-pause fxfont "></span>
                        </a>
                    </li>
                    <li>
                        <a id="nmplayer-next" href="javascript:;">
                            <span class="icon-next fxfont"></span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script type='text/javascript'>
var nm_ajax_url = {"ajax_url":"{{ url('music/ajax') }}","swfurl":"http://www.xtwind.com/wp-content/plugins/netease-music/static/css/Jplayer.swf.css","nonce":"5a5dec2dd7","tworow":"1"};
</script>
<script type='text/javascript' src="{{ asset("/assets/home/js/base.js") }}"></script>
<script src="http://cdn.xtwind.com/static/prism.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $.goup({
            trigger: 300,
            bottomOffset: 15,
            locationOffset: 20,
            title: '',
            titleAsText: true
        });
    });
</script>
@endsection