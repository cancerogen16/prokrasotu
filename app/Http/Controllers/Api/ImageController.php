<?php

namespace App\Http\Controllers\Api;

use App\Facades\ImageUpload;
use App\Http\Controllers\Controller;
use App\Traits\ApiResponder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Throwable;

class ImageController extends Controller
{
    use ApiResponder;

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function uploadImage(Request $request): JsonResponse
    {
        try {
            if ($request->hasFile('image')) {
                $file = $request->file('image');

                $image = ImageUpload::upload($file);

                if ($image) {
                    return $this->ok([
                        'image' => $image
                    ]);
                } else {
                    throw new \Exception('File upload error');
                }
            } else {
                return $this->response(204, [], 'Select image first');
            }
        } catch (Throwable $e) {
            return $this->error([], $e->getMessage());
        }
    }
}
