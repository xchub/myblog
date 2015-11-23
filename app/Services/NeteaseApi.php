<?php namespace App\Services;
/**
 * 功能实现
 * 1.  ID
 * 2. 利用对应的 ID 查询某人的歌单（包含个人创建的歌单和收藏的歌单）
 * 3. 获取某歌曲的详细信息
 */
class NeteaseApi
{
    const refer = "http://music.163.com/";//CURLOPT_REFERER
    /**
     * 封装的通用curl操作
     * @param  String $url  操作的URL
     * @param  Array  $data POST参数,默认空
     * @return Array        获得的JSON数据
     */
    
    public function curl($url, $post = '') 
    {
        $header[] = "Cookie: " . "appver=1.5.0.75771;";
        if(strtolower(substr($url,0,4) != 'http')) return false;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        if(!empty($post)) {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        } else {
            curl_setopt($ch, CURLOPT_HEADER, 0);
        }
        curl_setopt($ch, CURLOPT_REFERER, self::refer);
        $ssl = strtolower(substr($url, 0, 5));
        if($ssl == 'https') {
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        }
        $result = curl_exec($ch);
        curl_close($ch);
        if ($result) {
            $result = json_decode($result, true);
            return $result;
        }else{
            return false;
        }
    }
    /**
     * [getUserPlayList 获取用户所有的收藏歌单 其中 URL 的 offset limit  
     * 来限制分页
     * ]
     * @return [json] [歌单 ID 歌单名称 以及歌单封面图片]
     */
    public function getUserPlayList($userId)
    {
        $url = 'http://music.163.com/api/user/playlist/?offset=0&limit=100&uid=' . $userId;
        $response = $this->curl($url);
        $userPlayList = array();
        if( $response['code'] === 200 && $response['playlist']) {
            $playList = $response['playlist'];
            $userPlayList['status'] = 'success';
            foreach ($playList as $playList) {
                $userPlayList['info'][] = array(
                    'playlist_id' => $playList['id'],
                    "playlist_name" => $playList["name"],
                    "playlist_coverImgUrl" => $playList["coverImgUrl"]
                );
            }
        } else {
            $userPlayList['status'] = 'error';
        }
        return $userPlayList;
    }
    /**
     * 获取歌单中歌曲列表 歌曲详情 歌词等信息
     * @param  [type] $playlistId [description]
     * @return [type]             [description]
     */
    public function getDetailPlayList($playlistId)
    {
        $url = 'http://music.163.com/api/playlist/detail?id=' . $playlistId;
        $response = $this->curl($url);
        $result = array();
        if( $response['code'] === 200 && $response['result'] ) {
            $result = $response['result']['tracks'];
            $count = count($result);
            if ( $count < 1 ) {
                $collect['status'] = 'error';
            } else {
                $collectName = $response['result']['name'];//收藏歌单的名称
                $collectAuthor = $response['result']['creator']['nickname'];//收藏歌单的作者
                $collect = array(
                    'collectId'     => $playlistId,
                    'collectTitle'  => $collectName,
                    'collectAuthor' => $collectAuthor,
                    'collectType'   => 'collects',
                    'collectCount'  => $count,
                    'status'        => 'success'
                );
                foreach($result as $k => $value){
                        $mp3_url = str_replace('http://m', 'http://p', $value['mp3Url']);
                        $artists = array();
                        foreach ($value['artists'] as $artist) {
                            $artists[] = $artist['name'];
                        }
                        $artists = implode(',', $artists);
                        $lrc = $this->getSongLrc( $value["id"] );
                        $collect['songs'][] = array(
                            'id' => $value['id'],
                            'title' => $value['name'],
                            "duration" => $value['duration'],
                            'mp3' => $mp3_url,
                            'artist' => $artists,
                            'lrc' => $lrc
                        );
                }
            }
        } else {
            $collect['status'] = 'error';
        }
        
        return $collect;
    }
    //获取歌曲的歌词详情
    public function getSongLrc($songId)
    {
        $url = "http://music.163.com/api/song/media?id=" . $songId;
            $response = $this->curl($url);
            if( $response["code"]==200 && $response["lyric"] ){
                $content = $response["lyric"];
                if ($content) {
                    $result = $this->parseLrc($content);
                    return $result;
                }
            }
            return false;
    }

    private function parseLrc($lrcContent)
    {
        $nowLrc = array();
        $lrcRow = explode("\n", $lrcContent);
        foreach ($lrcRow as $key => $value) {
            $tmp = explode("]", $value);
            $tmp2 = substr($tmp[0], 1, 8);
            $tmp2 = explode(":", $tmp2);
            $lrcSec = intval( $tmp2[0]*60 + $tmp2[1]*1 );
            if( is_numeric($lrcSec) && $lrcSec > 0){
                $lrc = trim($tmp[1]);
                if( $lrc != "" ){
                    $nowLrc[$lrcSec] = $lrc;  
                }
            }
        }
        return $nowLrc;    
    }

}

/*$stoneworld = new NeteaseApi();
@var_dump($stoneworld->getDetailPlayList(129697903));*/
