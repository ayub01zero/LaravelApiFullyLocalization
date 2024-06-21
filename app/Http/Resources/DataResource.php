<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DataResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        
        $locale = app()->getLocale();

        return [
            'id' => $this->id,
            'name' => $this->{'name_' . $locale},
            'description' => $this->{'description_' . $locale},
            'location' => $this->{'location_' . $locale},
            'price' => $this->{'price_' . $locale},
            'state' => $this->getStateTranslation($this->state, $locale),
        ];
    }

   
    private function getStateTranslation(string $state, string $locale): string
    {
        $translations = [
            'en' => [
                'active' => 'active',
                'inactive' => 'inactive',
            ],
            'ku' => [
                'active' => 'چالاک',
                'inactive' => 'ناچالاک',
            ],
            'ar' => [
                'active' => 'نشط',
                'inactive' => 'غير نشط',
            ],
        ];

  
        return $translations[$locale][$state];
    }
}

