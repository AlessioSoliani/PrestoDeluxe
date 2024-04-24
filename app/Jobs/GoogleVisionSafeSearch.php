<?php

namespace App\Jobs;

use App\Models\Image;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Google\Cloud\Vision\V1\ImageAnnotatorClient;

class GoogleVisionSafeSearch implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private $announcement_image_id;

    /**
     * Create a new job instance.
     *
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
        $image=file_get_contents(storage_path('app/public/' . $i->path));

        putenv('GOOGLE_APPLICATION_CREDENTIALS=' . base_path('google_credential.json'));
        $imageAnnotator=new ImageAnnotatorClient();
        $response = $imageAnnotator->safeSearchDetection($image);
        $imageAnnotator->close();

        $safe = $response->getsafeSearchAnnotation($image);


        $adult = $safe->getAdult();
        $medical = $safe->getMedical();
        $spoof = $safe->getSpoof();
        $violence = $safe->getViolence();
        $racy = $safe->getRacy();
        
        

        $likelihoodName = 
        [
            'text-secondary fa-solid fa-circle', 'text-success fa-solid fa-circle', 'text-success fa-solid  fa-circle',
            'text-warning fa-solid fa-circle', 'text-warning fa-solid fa-circle', 'text-danger fa-solid  fa-circle',            
        ];

        $i->adult = $likelihoodName[$adult];
        $i->medical = $likelihoodName[$medical];
        $i->spoof = $likelihoodName[$spoof];
        $i->violence = $likelihoodName[$violence];
        $i->racy = $likelihoodName[$racy];

        $i->save();
    }    
}
