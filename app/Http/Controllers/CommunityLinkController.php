<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\CommunityLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CommunityLinkForm;
use App\Queries\CommunityLinkQuery;


class CommunityLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index(CommunityLinkQuery $query, Channel $channel = null)
{
    // Obtener enlaces en función de si se solicita "popular" o si hay un canal específico
    if (request()->exists('popular')) {
        $links = $channel ? $query->getMostPopularByChannel($channel) : $query->getMostPopular();
    } else {
        $links = $channel ? $query->getByChannel($channel) : $query->getAll();
    }

    // Obtener canales ordenados para el menú desplegable
    $channels = Channel::orderBy('title', 'asc')->get();
    
    return view('dashboard', compact('links', 'channels'));
}


    public function myLinks()
    {
        $links = Auth::user()->myLinks()->paginate(10);
        return view('my-links', compact('links'));
    }

    public function create()
    {
        $links = CommunityLink::where('approved', true)->latest('updated_at')->paginate(10);
        $channels = Channel::orderBy('title', 'asc')->get();
        return view('my-links', compact('links', 'channels'));
    }

    public function store(CommunityLinkForm  $request)
    {
        $data = $request->validated();
        $link = new CommunityLink($data);
        // Si uso CommunityLink::create($data) tengo que declarar user_id y channel_id como $fillable
        $link->user_id = Auth::id();
        if ($link->hasAlreadyBeenSubmitted()) {
            // Si ya ha sido enviado, redirigir con un mensaje flash (manejado dentro del método)
            return redirect('/dashboard');
        }
        $link->approved = Auth::user()->trusted ?? false;
        $link->save();

        // Redireccionar con mensaje flash
        if ($link->approved) {
            return redirect('/dashboard')->with('status', 'Tu link ha sido aprobado automáticamente.');
        } else {
            return redirect('/dashboard')->with('info', 'Tu link está pendiente de aprobación.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(CommunityLink $communityLink)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CommunityLink $communityLink)
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
