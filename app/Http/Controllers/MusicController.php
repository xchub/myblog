<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Services\NeteaseApi;

/**
 * 音乐页面的控制器
 */
class MusicController extends Controller
{
    protected $userId;
    protected $music;

    public function __construct(NeteaseApi $music)
    {
        $this->userId   = config('site.music.userId');
        $this->music    = $music;
    }

    public function index()
    {
        $pageTitle = '那些音乐';   
        $musicList = $this->getMusicList();
        if ($musicList['status'] == 'success') {
            $listNum = 4;
            unset($musicList['info'][0]);//删除默认某人喜欢的列表
            $count = count($musicList['info']);
            $page = ceil($count / $listNum);
            $musicList['listNum'] = $listNum;
            $musicList['info'] = array_chunk($musicList['info'], $listNum);
            $musicList['page'] = count($musicList['info']);
        }
        return view('home.music.index', compact('pageTitle'))->withMusic($musicList);
    }

    public function achieve(Request $request)
    {
        $id = $request->get('id');
        $id = !empty($id) ? intval($id) : 51796670;
        @$song = $this->music->getDetailPlayList($id);
        $result = array(
            'msg' => 200,
            'song' => $song
        );
        header('Content-type: application/json');
        echo json_encode($result);
        exit;
    }

    protected function getMusicList()
    {
        return $userPlayList = $this->music->getUserPlayList($this->userId);
    }

}
