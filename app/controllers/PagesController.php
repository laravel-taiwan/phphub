<?php

class PagesController extends \BaseController {

	protected $topic;

	public function __construct(Topic $topic)
    {
    	parent::__construct();
        $this->topic = $topic;
    }

	/**
	 * The home page
	 */
	public function home()
	{
		$topics = $this->topic->getTopicsWithFilter('excellent');
		$nodes  = Node::allLevelUp();

		return View::make('pages.home', compact('topics', 'nodes'));
	}

	/**
	 * About us page
	 */
	public function about()
	{
		return View::make('pages.about');
	}

	/**
	 * Community WIKI
	 */
	public function wiki()
	{
		$topics = $this->topic->getWikiList();
		return View::make('pages.wiki', compact('topics'));
	}

	/**
	 * Search page, using google's.
	 */
	public function search()
	{
		$query = Purifier::clean(Input::get('q'));
		return Redirect::away('https://www.google.com/search?q=site:forum.laravel.tw' . $query, 301);
	}

	/**
	 * Feed function
	 */
	public function feed()
	{
		$topics = Topic::excellent()->recent()->limit(20)->get();

		$channel =[
            'title' => 'Laravel 台灣 - 討論 PHP 與 Laravel 的好所在',
            'description' => 'PHP 和 Laravel 的中文社群，在這裡我們討論技術, 分享技術。',
    		'link' => URL::route('feed')
    	];

		$feed = Rss::feed('2.0', 'UTF-8');

	    $feed->channel($channel);

	    foreach ($topics as $topic)
	    {
	        $feed->item([
                'title' => $topic->title,
                'description|cdata' => str_limit($topic->body, 200),
                'link' => URL::route('topics.show', $topic->id),
                ]);
	    }

	    return Response::make($feed, 200, array('Content-Type' => 'text/xml'));
	}
}
