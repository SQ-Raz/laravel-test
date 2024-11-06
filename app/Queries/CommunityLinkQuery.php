<?php

namespace App\Queries;

use App\Models\CommunityLink;
use App\Models\Channel;

class CommunityLinkQuery
{
    public function getByChannel(Channel $channel)
    {
        return $channel->allLinks()
            ->where('approved', true)
            ->latest('updated_at')
            ->paginate(10);
    }

    public function getAll()
    {
        return CommunityLink::where('approved', true)
            ->latest('updated_at')
            ->paginate(10);
    }

    public function getMostPopular()
    {
        return CommunityLink::where('approved', true)
            ->withCount('users')
            ->orderBy('users_count', 'desc')
            ->paginate(10);
    }

    public function getMostPopularByChannel(Channel $channel)
    {
        return $channel->allLinks()
            ->where('approved', true)
            ->withCount('users')
            ->orderBy('users_count', 'desc')
            ->paginate(10);
    }
}
