<?php

namespace App\Listeners;

use App\Events\BlogView;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Session\Store;

class BlogViewListener
{
    protected $session;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Store $session)
    {
        $this->session = $session;
    }

    /**
     * Handle the event.
     *
     * @param  BlogView  $event
     * @return void
     */
    public function handle(BlogView $event)
    {
        $post = $event->post;
        if (!$this->hasViewedBlog($post)) {
            $post->view_cache = $post->view_cache + 1;
            $post->save();
            $this->storeViewedBlog($post);
        }
    }

    protected function hasViewedBlog($post)
    {
        return array_key_exists($post->id, $this->getViewedBlogs());
    }

    protected function getViewedBlogs()
    {
        return $this->session->get('viewed_Blogs', []);
    }

    protected function storeViewedBlog($post)
    {
        $key = 'viewed_Blogs.'.$post->id;

        $this->session->put($key, time());
    }

}
