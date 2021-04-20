<?php

namespace Mia\Legal\Model;

/**
 * Description of Model
 * @property int $id ID of item
 * @property mixed $slug Description for variable
 * @property mixed $title Description for variable
 * @property mixed $content Description for variable
 * @property mixed $created_at Description for variable
 * @property mixed $updated_at Description for variable
 * @property mixed $last_revision Description for variable

 *
 * @OA\Schema()
 * @OA\Property(
 *  property="id",
 *  type="integer",
 *  description=""
 * )
 * @OA\Property(
 *  property="slug",
 *  type="string",
 *  description=""
 * )
 * @OA\Property(
 *  property="title",
 *  type="string",
 *  description=""
 * )
 * @OA\Property(
 *  property="content",
 *  type="string",
 *  description=""
 * )
 * @OA\Property(
 *  property="created_at",
 *  type="",
 *  description=""
 * )
 * @OA\Property(
 *  property="updated_at",
 *  type="",
 *  description=""
 * )
 * @OA\Property(
 *  property="last_revision",
 *  type="",
 *  description=""
 * )

 *
 * @author matiascamiletti
 */
class MIALegal extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'mia_legal';
    
    protected $casts = ['content' => 'array'];
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    //public $timestamps = false;

    

    
}