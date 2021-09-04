<?php

namespace App\Contracts;

use Illuminate\Http\UploadedFile;

interface UploadImageServiceContract
{
    /**
     * @param UploadedFile $file
     * @return mixed
     */
    public function upload(UploadedFile $file);

    /**
     * @param string $filename
     * @param int $width ширина для ресайза
     * @param int $height высота для ресайза
     * @return string
     */
    public function resize(string $filename, int $width, int $height);

    /**
     * Выдаёт строку с путём к изображению с нужным размером
     *
     * @param string|null $filename Название файла изображения
     * @param string|int[] $size размер нужного изображения,
     * строкой с ключом массива sizes из файла config/image.php
     * или массивом [ширина, высота]
     * @return string
     */
    public function getImage($filename = null, $size = 'medium');
}
