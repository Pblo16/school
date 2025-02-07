<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Professors as ModelsProfessors;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class Professors extends Controller
{
    public function __invoke(Request $request): Collection
    {
        // If we have a selected ID, make sure it's included in results
        if ($request->has('selected')) {
            return ModelsProfessors::query()
                ->select('id', 'nombre as name')
                ->whereIn('id', (array)$request->input('selected'))
                ->get();
        }

        // Regular search query
        return ModelsProfessors::query()
            ->select('id', 'nombre as name')
            ->when(
                $request->search,
                fn(Builder $query) => $query
                    ->where('nombre', 'like', "%{$request->search}%")
            )
            ->limit(10)
            ->orderBy('nombre')
            ->get();
    }
}
