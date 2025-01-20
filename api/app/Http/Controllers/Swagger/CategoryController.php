<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;

/**
 * @OA\Get(
 *     path="/api/categories",
 *     summary="Какие-то категории",
 *
 *     @OA\Response(
 *         response=200,
 *         description="OK"
 *     )
 * )
 */
class CategoryController extends Controller
{

}
