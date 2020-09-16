<?php

namespace App\Repositories;

use App\Contracts\SearchableContract;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class DatabasePostSearchRepository implements SearchableContract
{
    /**
     * @var Builder
     */
    protected $query;

    /**
     * @return void
     */
    public function __construct()
    {
        $this->query = DB::table('posts')->select('*');
    }

    /**
     * @param null|string $keyword
     * @return SearchableContract
     */
	public function search(?string $keyword = null) : SearchableContract
    {
        if ($keyword) {
            $this->query->where(function ($q) use ($keyword) {
                $q->where('name', 'like', "%$keyword%")
                    ->orWhere('content', 'like', "%$keyword%");
            });
        }

        return $this;
    }

    /**
     * @return SearchableContract
     */
	public function active() : SearchableContract
    {
        $this->query->where('active', true);

        return $this;
    }

    /**
     * @return SearchableContract
     */
	public function inactive() : SearchableContract
    {
        $this->query->where('active', false);

        return $this;
    }

    /**
     * @return SearchableContract
     */
	public function alphabetically() : SearchableContract
    {
        $this->query->orderBy('name', 'asc');

        return $this;
    }

    /**
     * @return SearchableContract
     */
	public function latest() : SearchableContract
    {
        $this->query->orderBy('created_at', 'desc');

        return $this;
    }

    /**
     * @return Collection
     */
    public function fetch() : Collection
    {
        return $this->query->get();
    }
}
