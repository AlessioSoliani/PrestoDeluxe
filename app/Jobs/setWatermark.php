<?php

namespace App\Jobs;

use Log;
use App\Models\Image;
use Illuminate\Bus\Queueable;
use Spatie\Image\Manipulations;
use Illuminate\Queue\SerializesModels;
use Spatie\Image\Image as SpatieImage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class setWatermark implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private $announcement_image_id;

    /**
     * Create a new job instance.
     */
    public function __construct($announcement_image_id)
    {
        $this->announcement_image_id=$announcement_image_id;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $i=Image::find($this->announcement_image_id);
        if(!$i){
            return;
        }

        $srcPath = storage_path('app/public/' . $i->path);
        $image = file_get_contents($srcPath);

        $image = SpatieImage::load($srcPath);
        $image->watermark(base_path('resources/img-1/watermark.png'))
                ->watermarkPosition(Manipulations::POSITION_CENTER)
                ->watermarkFit(Manipulations::FIT_STRETCH)
                ->watermarkOpacity(50)
                ->watermarkPosition(Manipulations::POSITION_BOTTOM);
        $image->save($srcPath);
        
    }
    

}
