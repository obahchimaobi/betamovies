<?php

namespace App\Http\Controllers\Search;

use App\Models\Movies;
use App\Models\Series;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\LengthAwarePaginator;

class SearchController extends Controller
{
    //
    public function search(Request $request)
    {
        $query = $request->input('search');

        $movies = Movies::search($query)->get()->whereNull('deleted_at')->where('status', '!=', 'pending');

        $series = Series::search($query)->get()->whereNull('deleted_at')->where('status', '!=', 'pending');

        $allResults = $movies->concat($series);

        $page = LengthAwarePaginator::resolveCurrentPage() ?: 1;

        // Items per page
        $perPage = 24;

        // Slice the collection to get the items to display in current page
        $currentPageResults = $allResults->slice(($page * $perPage) - $perPage, $perPage)->values();

        // Create our paginator and add it to the view
        $paginatedResults = new LengthAwarePaginator($currentPageResults, count($allResults), $perPage, $page, ['path' => LengthAwarePaginator::resolveCurrentPath()]);

        return view('media.search', compact('paginatedResults', 'query'));
    }
}
