<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

trait ApiResponder
{
    /**
     * Create API response.
     *
     * @param int $status
     * @param array $data
     * @param string $message
     *
     * @return JsonResponse
     */
    protected function response(int $status = 200, array $data = [], string $message = null): JsonResponse
    {
        if (is_null($message)) {
            $json = $data;
        } else {
            $json = [
                'message' => $message,
                'data' => $data,
            ];
        }

        return response()->json($json, $status, [], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

    /**
     * Create successful (200) API response.
     *
     * @param array $data
     * @param string $message
     *
     * @return JsonResponse
     */
    protected function success(array $data = [], string $message = null): JsonResponse
    {
        return $this->response(200, $data, $message);
    }

    /**
     * Create successful (200) API response.
     *
     * @param array $data
     * @param string $message
     *
     * @return JsonResponse
     */
    protected function ok(array $data = [], string $message = null): JsonResponse
    {
        return $this->success($data, $message);
    }

    /**
     * Create Not found (404) API response.
     *
     * @param string $message
     *
     * @return JsonResponse
     */
    protected function notFound(string $message = null): JsonResponse
    {
        if (is_null($message)) {
            $message = 'Not Found';
        }

        return $this->response(404, [], $message);
    }

    /**
     * Create Validation (422) API response.
     *
     * @param array $errors
     * @param string $message
     *
     * @return JsonResponse
     */
    protected function validation(array $errors = [], string $message = null): JsonResponse
    {
        if (is_null($message)) {
            $message = 'Validation Failed';
        }

        return $this->response(422, $errors, $message);
    }

    /**
     * Create forbidden (403) API response.
     *
     * @param array $data
     * @param string $message
     *
     * @return JsonResponse
     */
    protected function forbidden(array $data = [], string $message = null): JsonResponse
    {
        if (is_null($message)) {
            $message = 'You don\'t have permission';
        }

        return $this->response(403, $data, $message);
    }

    /**
     * Create Server error (500) API response.
     *
     * @param array $data
     * @param string $message
     *
     * @return JsonResponse
     */
    protected function error(array $data = [], string $message = null): JsonResponse
    {
        if (is_null($message)) {
            $message = 'Server error';
        }

        Log::error($message);

        return $this->response(500, $data, "Ошибка сервера, обратитесь к администратору");
    }
}
