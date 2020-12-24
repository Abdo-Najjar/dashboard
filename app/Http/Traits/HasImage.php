<?php

namespace App\Http\Traits;

use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

trait HasImage
{
    use InteractsWithMedia;
    
    /**
     * get image from polymporfic realationship
     *
     */
    public function image()
    {
        return optional($this->media->first())->getFullUrl('thumbnail');
    }

    /**
     * Get Original Image.
    */
    public function originalImage()
    {
        return $this->getFirstMediaUrl();
    }


    /**
     * create new image with different dimensions.
     *
     * @param Media|null $media
     * @return void
     */
    public function registerAllMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('thumbnail')
            ->width(100)
            ->height(100);
    }
}
