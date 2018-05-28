<?php
/**
 * Created by PhpStorm.
 * User: Pramana
 * Date: 5/28/2018
 * Time: 12:11 PM
 */

namespace App\Files;


use App\Models\Image;
use Slim\Http\UploadedFile;

class FileStore
{
    protected $stored = null;

    public function store(UploadedFile $file)
    {
        try {
            $model = $this->createModel($file);
            $file->moveTo(uploads_path($model->uuid));
        } catch (\Exception $e) {
            dump($e);
        }

        return $this;
    }

    public function getStored()
    {
        return $this->stored;
    }

    protected function createModel(UploadedFile $file)
    {
        return $this->stored = Image::create([
            'uuid' => '557fea84-6483-4809-ba26-26c310b9ac11'
        ]);
    }
}