<?php

namespace App\Repositories;

use App\Contracts\SearchableContract;
use App\Models\Post;
use Illuminate\Support\Collection;

class EloquentPostSearchRepository implements SearchableContract
{
	/**
	 * @var Collection
	 */
    protected $posts;

    /**
     * @return void
     */
    public function __construct()
    {
        $this->posts = Post::all();
    }

    /**
     * @param null|string $keyword
     * @return SearchableContract
     */
	public function search(?string $keyword = null) : SearchableContract
    {
        if ($keyword) {
			$this->posts = Post::where('name', 'like', '%' . $keyword . '%')->orWhere('content', 'like', '%' . $keyword . '%')->get();
        }

        return $this;
    }

    /**
     * @return SearchableContract
     */
	public function active() : SearchableContract
    {
        $this->posts = Post::where('active', true)->get();

        return $this;
    }

    /**
     * @return SearchableContract
     */
	public function inactive() : SearchableContract
    {
        $this->posts = Post::where('active', false)->get();

        return $this;
    }

    /**
     * @return SearchableContract
     */
	public function alphabetically() : SearchableContract
    {
        $this->posts = Post::orderBy('name', 'asc')->get();

        return $this;
    }

    /**
     * @return SearchableContract
     */
	public function latest() : SearchableContract
    {
        $this->posts = Post::orderBy('created_at', 'desc')->get();

        return $this;
    }

    /**
     * @return Collection
     */
    public function fetch() : Collection
    {
        return $this->posts;
    }
}
