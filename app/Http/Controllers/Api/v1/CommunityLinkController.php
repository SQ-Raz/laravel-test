<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\CommunityLink;
use Illuminate\Http\Request;

class CommunityLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = CommunityLink::with('channel');

        //  Enlaces populares
        if ($request->has('popular') && $request->popular) {
            $query->orderBy('approved', 'desc');
        }

        // Buscar por título o enlace
        if ($request->has('search') && $request->search) {
            $term = $request->search;
            $query->whereAny(['title', 'link'], 'like', '%' . $term . '%');
        }

        // Paginación de resultados
        $links = $query->paginate(10);

        return response()->json($links);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CommunityLink $communityLink)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CommunityLink $communityLink)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CommunityLink $communityLink)
    {
        //
    }
}
