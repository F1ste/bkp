<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class File extends Model
{
    use HasFactory;
    use HasUlids;

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'uuid';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = ['name', 'mimetype'];

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($item) {
            Storage::delete($item->uuid);
        });
    }

    public static function upload(UploadedFile $file): self
    {
        $file = self::create([
            'name' => $file->getClientOriginalName(),
            'mimetype' => $file->getClientMimeType(),
            'extension' => $file->guessClientExtension(),
        ]);

        $file->store($file->uuid . '.' . $file->extension);

        return $file;
    }

    public function storageFilename(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => $attributes['uuid'] . '.' . $attributes['extension'],
        );
    }

    public function path(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => Storage::url($attributes['uuid'] . '.' . $attributes['extension']),
        );
    }

    public function isImage(): bool
    {
        return $this->getType() === 'image';
    }

    public function isAudio(): bool
    {
        return $this->getType() === 'audio';
    }

    public function isVideo(): bool
    {
        return $this->getType() === 'video';
    }

    public function exists(): bool
    {
        return Storage::exists($this->uuid);
    }

    protected function getType(): ?string
    {
        return explode('/', $this->mimetype)[0] ?? null;
    }
}
