<?php

namespace Mia\Legal\Handler;

/**
 * Description of FetchHandler
 * 
 * @OA\Get(
 *     path="/mia-legal/fetch-slug/{slug}",
 *     summary="MiaLegal Fetch By Slug",
 *     tags={"MiaLegal"},
 *     @OA\Parameter(
 *         name="id",
 *         description="Id of Item",
 *         required=true,
 *         in="path"
 *     ),
 *     @OA\Response(
 *          response=200,
 *          description="successful operation",
 *          @OA\JsonContent(ref="#/components/schemas/MiaLegal")
 *     ),
 *     security={
 *         {"bearerAuth": {}}
 *     }
 * )
 *
 * @author matiascamiletti
 */
class FetchSlugHandler extends \Mia\Auth\Request\MiaAuthRequestHandler
{
    /**
     * 
     * @param \Psr\Http\Message\ServerRequestInterface $request
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function handle(\Psr\Http\Message\ServerRequestInterface $request): \Psr\Http\Message\ResponseInterface
    {
        // Obtenemos ID si fue enviado
        $itemSlug = $this->getParam($request, 'slug', '');
        // Buscar si existe el tour en la DB
        $item = \Mia\Legal\Model\MiaLegal::where('slug', $itemSlug)->first();
        // verificar si existe
        if($item === null){
            return new \Mia\Core\Diactoros\MiaJsonErrorResponse(1, 'This element is not exist.');
        }
        // Devolvemos respuesta
        return new \Mia\Core\Diactoros\MiaJsonResponse($item->toArray());
    }
}