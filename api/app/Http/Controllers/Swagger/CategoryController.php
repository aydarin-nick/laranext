<?php

namespace App\Http\Controllers\Swagger;
use OpenApi\Attributes as OA;

use App\Http\Controllers\Controller;

/**
 * @OA\Get(
 *     path="/api/categories/{id}",
 *     summary="Одна категория",
 *     tags={"Categories"},
 *     security={{ "bearerAuth": {} }},
 *     @OA\Parameter (
 *         description="ID категории",
 *         in="path",
 *         name="category",
 *         required=true,
 *         example=1,
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="OK",
 *         @OA\JsonContent(
 *              @OA\Property (property="", type="array", @OA\Items(
 *                  @OA\Property(property="id", type="integer", example=1),
 *                  @OA\Property(property="name", type="string", example="Children"),
 *                  @OA\Property(property="categories_id", type="integer", example="1"),
 *                  @OA\Property(property="created_at", type="date", example="1980-01-01"),
 *                  @OA\Property(property="updated_at", type="date", example=null),
 *                  @OA\Property(property="delete", type="integer", example=0),
 *              )),
 *         ),
 *     ),
 * ),
 *
 * @OA\Get(
 *      path="/api/categories/",
 *      summary="Какие-то категории",
 *      tags={"Categories"},
 *      security={{ "bearerAuth": {} }},
 *      @OA\Response(
 *          response=200,
 *          description="OK",
 *          @OA\JsonContent(
 *               @OA\Property (property="", type="array", @OA\Items(
 *                   @OA\Property(property="id", type="integer"),
 *                   @OA\Property(property="name", type="string"),
 *                   @OA\Property(property="categories_id", type="integer"),
 *                   @OA\Property(property="created_at", type="date"),
 *                   @OA\Property(property="updated_at", type="date"),
 *                   @OA\Property(property="delete", type="integer"),
 *               )),
 *               example={{
 *                   {
 *                       "id": 1,
 *                       "name": "Children",
 *                       "categories_id": 1,
 *                       "created_at": "1980-01-01",
 *                       "updated_at": null,
 *                       "delete": 0,
 *                   }
 *               }}
 *          ),
 *      ),
 *  ),
 *
 * @OA\Patch(
 *       path="/api/categories/{id}",
 *       summary="Обновление",
 *       tags={"Categories"},
 *       security={{ "bearerAuth": {} }},
 *       @OA\Parameter (
 *          description="ID категории",
 *          in="path",
 *          name="category",
 *          required=true,
 *          example=1,
 *      ),
 *      @OA\RequestBody (
 *          @OA\JsonContent (
 *              allOf={
 *                  @OA\Schema (
 *                      @OA\Property(property="id", type="integer", example=1),
 *                      @OA\Property(property="name", type="string", example="Children"),
 *                  )
 *              }
 *          ),
 *      ),
 *       @OA\Response(
 *           response=200,
 *           description="OK",
 *           @OA\JsonContent(
 *                @OA\Property (property="", type="array", @OA\Items(
 *                    @OA\Property(property="id", type="integer", example=1),
 *                    @OA\Property(property="name", type="string", example="Children"),
 *                    @OA\Property(property="categories_id", type="integer", example="1"),
 *                    @OA\Property(property="created_at", type="date", example="1980-01-01"),
 *                    @OA\Property(property="updated_at", type="date", example=null),
 *                    @OA\Property(property="delete", type="integer", example=0),
 *                )),
 *           ),
 *       ),
 *   ),
 *
 * @OA\Delete(
 *       path="/api/categories/",
 *       summary="Удаление",
 *       tags={"Categories"},
 *       security={{ "bearerAuth": {} }},
 *       @OA\Response(
 *           response=200,
 *           description="OK",
 *           @OA\JsonContent(
 *                @OA\Property (property="result", type="object", example=true),
 *           ),
 *       ),
 *   ),
 */
class CategoryController extends Controller
{

}
