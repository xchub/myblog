<?php

namespace App\Listeners;

use Illuminate\Session\Store;
use App\Post;

class ViewBlogListener
{

    protected $posts;

    /**
     * Session store instance.
     *
     * @var \Illuminate\Session\Store
     */
    protected $session;

    /**
     * Create a new view trick handler instance.
     *
     * @param \App\Post $posts
     * @param \Illuminate\Session\Store                  $session
     */
    public function __construct(Post $posts, Store $session)
    {
        $this->posts = $posts;
        $this->session = $session;
    }

    /**
     * Handle the view post event.
     *
     * @param \App\Trick $trick
     */
    public function handle($trick)
    {
        if (!$this->hasViewedTrick($trick)) {
            $trick = $this->posts->incrementViews($trick);

            $this->storeViewedTrick($trick);
        }
    }

    /**
     * Determine whether the user has viewed the trick.
     *
     * @param \App\Trick $trick
     *
     * @return bool
     */
    protected function hasViewedTrick($trick)
    {
        return array_key_exists($trick->id, $this->getViewedTricks());
    }

    /**
     * Get the users viewed trick from the session.
     *
     * @return array
     */
    protected function getViewedTricks()
    {
        return $this->session->get('viewed_tricks', []);
    }

    /**
     * Append the newly viewed trick to the session.
     *
     * @param \App\Trick $trick
     */
    protected function storeViewedTrick($trick)
    {
        $key = 'viewed_tricks.'.$trick->id;

        $this->session->put($key, time());
    }
}
