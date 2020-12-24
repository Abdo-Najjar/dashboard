<?php

namespace App\Http\Traits;

use Illuminate\Support\Collection;
use Spatie\MediaLibrary\InteractsWithMedia;
use stdClass;

trait HasMultiImage
{
    use InteractsWithMedia;

    private Collection $mediaUrls;

    /**
     * get images url from polymporfic realationship
     *
     */
    public function images()
    {
        $this->mediaUrls = new Collection();

        $this->getMedia()->each(fn ($medium) =>  $this->mediaUrls->push($medium->getFullUrl()));

        return $this->mediaUrls;
    }
}
