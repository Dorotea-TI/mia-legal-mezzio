<?php

namespace Mia\Legal\Handler;

/**
 * Description of SaveHandler
 * 
 * @OA\Post(
 *     path="/mia-legal/save",
 *     summary="MiaLegal Save",
 *     tags={"MiaLegal"},
*      @OA\RequestBody(
 *         description="Object",
 *         required=true,
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(ref="#/components/schemas/MiaLegal")
 *         )
 *     ),
 *     @OA\Response(
 *          response=200,
 *          description="successful operation",
 *          @OA\JsonContent(ref="#/components/schemas/MiaLegal")
 *     ),
 *     security={
 *         {"bearerAuth": {}}
 *     },
 * )
 *
 * @author matiascamiletti
 */
class SaveHandler extends \Mia\Auth\Request\MiaAuthRequestHandler
{
    /**
     * 
     * @param \Psr\Http\Message\ServerRequestInterface $request
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function handle(\Psr\Http\Message\ServerRequestInterface $request): \Psr\Http\Message\ResponseInterface 
    {
        // Obtener item a procesar
        $item = $this->getForEdit($request);
        // Guardamos data
        $item->slug = $this->getParam($request, 'slug', '');
        $item->title = $this->getParam($request, 'title', '');
        $item->content = $this->getParam($request, 'content', []);
        $item->last_revision = $this->getParam($request, 'last_revision', '');        
        $item->language = $this->getParam($request, 'language', 'en');        
        
        try {
            $item->save();
        } catch (\Exception $exc) {
            return new \Mia\Core\Diactoros\MiaJsonErrorResponse(-2, $exc->getMessage());
        }

        // Devolvemos respuesta
        return new \Mia\Core\Diactoros\MiaJsonResponse($item->toArray());
    }
    
    /**
     * 
     * @param \Psr\Http\Message\ServerRequestInterface $request
     * @return \App\Model\MiaLegal
     */
    protected function getForEdit(\Psr\Http\Message\ServerRequestInterface $request)
    {
        // Obtenemos ID si fue enviado
        $itemId = $this->getParam($request, 'id', '');
        // Buscar si existe el item en la DB
        $item = \Mia\Legal\Model\MiaLegal::find($itemId);
        // verificar si existe
        if($item === null){
            return new \Mia\Legal\Model\MiaLegal();
        }
        // Devolvemos item para editar
        return $item;
    }
}