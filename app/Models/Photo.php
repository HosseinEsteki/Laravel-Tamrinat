<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Photo extends Model
{
    use HasFactory;

    private static string $thumbnail = 'thumbnail/';
//    protected string $thumbnail='thumbnail/';

    protected $fillable = [
        'path',
        'photo_model'
    ];

    public function getPathAttribute(): string
    {
        $path = $this->getUrl();
        return $path . $this->attributes['path'];
    }

    public function getThumbnailPathAttribute(): string
    {
        $path = $this->getUrl() . static::$thumbnail;
        return $path . $this->attributes['path'];
    }

    function getUrl(): string
    {
        $photoModel = $this->photo_model;
        $path = '';
        switch ($photoModel) {
            case \PhotoPath::Post->name:
                $path = \PhotoPath::Post->value;
                break;
            case \PhotoPath::User->name:
                $path = \PhotoPath::User->value;
                break;
        }

        return Storage::url('public'.$path);
    }


//    public function scopeSavePhoto($query,UploadedFile $photoFile, \PhotoPath $photoPath)
//    {}
    private static function checkDirectoryExist(\PhotoPath $photoPath)
    {
        $path="public".$photoPath->value;
        $thumbnail = $path . static::$thumbnail;

        if (Storage::missing($path)) {
            Storage::makeDirectory($path);
        }
        if (Storage::missing($thumbnail)) {
            Storage::makeDirectory($thumbnail);
        }
    }

    public static function SavePhoto(UploadedFile $photoFile, \PhotoPath $photoPath)
    {
        static::checkDirectoryExist($photoPath);
        $photo = static::create(['photo_model' => $photoPath->name]);
        $name = $photo->id . ".webp";
        $path = storage_path('app/public'.$photoPath->value);
//        $photoFile->move($path, $name);
        $photo->path = $name;
        Image::make($photoFile->getRealPath())->encode('webp',10)->save($path.$name);
        /**
         * php composer require intervention/image
         * https://image.intervention.io/v2/introduction/installation
         * Create Thumbnail Folder
         */
        $thumbnail_path = $path . static::$thumbnail . $name;
        Image::make($photoFile->getRealPath())->fit(200)->encode('webp')->save($thumbnail_path);
        /**
         * End intervention/image
         */
        $photo->save();
        return $photo;
    }

}
