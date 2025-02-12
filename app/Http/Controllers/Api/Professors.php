<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Professors as ModelsProfessors;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class Professors extends Controller
{
    public function __invoke(Request $request): Collection
    {
        // If we have a selected ID, make sure it's included in results
        if ($request->has('selected')) {
            return ModelsProfessors::query()
                ->select('id', 'apellido_paterno as name')
                ->whereIn('id', (array) $request->input('selected'))
                ->get();
        }

        // Regular search query
        return ModelsProfessors::query()
            ->select('id', 'apellido_paterno as name')
            ->when(
                $request->search,
                fn (Builder $query) => $query
                    ->where('apellido_paterno', 'like', "%{$request->search}%")
            )
            ->limit(5)
            ->orderBy('apellido_paterno')
            ->get();
    }
}
