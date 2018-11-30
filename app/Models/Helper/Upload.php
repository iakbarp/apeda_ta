<?php

namespace App\Models\Helper;

use Illuminate\Support\Facades\Storage;

class Upload
{

    protected $file;
    protected $name;
    protected $extension;
    protected $size; //in bytes
    protected $directory;

    public function __construct($file, $directory)
    {
        $this->setFile($file);
        $this->setDirectory($directory);
        $this->setExtension($file);
        $this->setSize($file);
        $this->setName($file);
    }

    public function setFile($file)
    {
        $this->file = $file;
    }

    public function setName($file)
    {
        $file = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $file = $this->rename($file);
        $this->name = $file;
    }

    public function setExtension($file)
    {
        $this->extension = $file->getClientOriginalExtension();
    }

    public function setSize($file)
    {
        $this->size = $file->getSize();
    }

    public function setDirectory($directory)
    {
        $directory = $directory . '/' . date('Y') . '/' . date('m') . '/';
        $this->directory = $directory;
        if (!$this->exists($directory)) {
            $this->createDir($directory);
        }
    }

    public function getName()
    {
        return $this->name;
    }

    public function getExtension()
    {
        return $this->extension;
    }

    public function getSize()
    {
        return $this->size;
    }

    public function getDirectory()
    {
        return $this->directory;
    }

    public function getPath()
    {
        return $this->getDirectory() . $this->getName() . '.' . $this->getExtension();
    }

    public function rename($name)
    {
        do {
            $name = substr(str_slug($name) . '-' . uniqid(), 0, 80);
        } while ($this->exists($this->getDirectory() . $name . '.' . $this->getExtension()));
        return $name;
    }

    public function exists($file)
    {
        return file_exists(storage_path($file));
    }

    public function createDir($directory)
    {
        return Storage::disk('public')->makeDirectory($directory);
    }

    public function save()
    {
        $store = Storage::disk('public')->putFileAs($this->getDirectory(), $this->file, $this->getName() . '.' . $this->getExtension());
        if ($store) {
            return [
                'name' => $this->getName(),
                'extension' => $this->getExtension(),
                'size' => $this->getSize(),
                'location' => $this->getPath(),
            ];
        }
        return null;
    }

}