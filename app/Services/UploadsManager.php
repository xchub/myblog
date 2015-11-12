<?php
namespace App\Services;

use Carbon\Carbon;
use Dflydev\ApacheMimeTypes\PhpRepository;
use Storage;

class UploadsManager
{
    $protected $disk;
    $protected $mimeDected;

    public function __construct(PhpRepository $mimeDetect)
    {
        $this->disk = Storage::disk(config('blog.uploads.storage'));
        $this->mimeDetect = $mimeDetect;
    }
    /**
     * 获取当前目录的文件以及目录详情
     * @param  [ string] $filder [description]
     * @return array of [
     *    'folder' => '当前文件夹路径',
     *    'folderName' => '仅仅当前文件夹的名称',
     *    'breadCrumbs' => '当前文件夹的目录层次'
     *    'folders' => array of [ $path => $foldername] of each subfolder 当前文件夹下的文件夹详情
     *    'files' => array of file details on each file in folder 当前文件夹下的文件详情
     * ]
     */
    public function folderInfo($folder)
    {
        $folder = $this->clearFolder($folder);//清理获取的目录如下 /test/one        
        $breadcrumbs = $this->breadcrumbs($folder);
        $slice = array_slice($breadcrumbs, -1);
        $folderName = current($slice);
        $breadcrumbs = array_slice($breadcrumbs, 0, -1);
        $subfolders = [];
        foreach (array_unique($this->disk->directory($folder)) as $subfolder) {
            $subfolders["/$subfolder"] = basename($subfolder);
        }
        $files = [];
        foreach ($this->disk->files($folder) as $path) {
            $files[] = $this->fileDetails($path);
        }
        return compact(
            'folder',
            'folderName',
            'breadcrumbs',
            'subfolders',
            'files'
        );

    }

    proteced function clearFolder($folder)
    {
        return '/' . trim(str_replace('..', '', $folder), '/');
    }
    /**
     * 获取当前文件夹的目录层次
     * @param  [type] $folder [description]
     * @return [type]         [description]
     */
    proteced function breadcrumbs($folder)
    {
        $folder = trim($folder, '/');
        $crumbs = ['/' => 'root'];
        if(empty($folder)) {
            return $crumbs;
        }
        $folders = explode('/', $folder);
        $build = '';
        foreach ($folders as $folder) {
            $build .= '/'.$folder;
            $crumbs[$build] = $folder;
        }
        return $crumbs;
    }
    /**
     * 返回文件的详细信息
     * @param  [type] $path [description]
     * @return [type]       [description]
     */
    protected function fileDetails($path)
    {
        $path = '/' . ltrim($path, '/');
        return [
            'name' => basename($path),
            'fullPath' => $path,
            'webPath' => $this->fileWebpath($path),
            'mimeType' => $this->fileMimeType($path),
            'size' => $this->fileSize($path),
            'modified' => $this->fileModified($path),
        ];
    }
    /**
     * 获取文件的全路径
     * @param  [type] $path [description]
     * @return [type]       [description]
     */
    public function fileWebpath($path)
    {
        $path = rtrim(config('blog.uploads.webpath'), '/') . '/' .
            ltrim($path, '/');
        return url($path);
    }
    /**
     * 获取文件的 mime 格式
     * @param  [type] $path [description]
     * @return [type]       [description]
     */
    public function fileMimeType($path)
    {
        return $this->mimeDetect->findType(
            pathinfo($path, PATHINFO_EXTENSION)
        );
    }
    /**
     * 文件大小
     * @param  [type] $path [description]
     * @return [type]       [description]
     */
    public function fileSize($path)
    {
        return $this->disk->size($path);
    }

    /**
     * 文件的最后修改时间
    */
    public function fileModified($path)
    {
        return Carbon::createFromTimestamp(
            $this->disk->lastModified($path)
        );
    }
}
















