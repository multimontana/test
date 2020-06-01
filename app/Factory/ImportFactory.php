<?php


namespace App\Factory;


use App\Blog;
use App\News;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class ImportFactory
 * @package App\Factory
 */
class ImportFactory
{
    const MODELS = [
        'blogs' => Blog::class,
        'news' => News::class,
    ];

    /**
     * @param $model
     * @return mixed
     */
    public static function factoryMethod($model)
    {
        try {

            $newModel = self::MODELS[$model];
            return new $newModel;

        } catch (NotFoundHttpException $error) {

            throw new NotFoundHttpException("Model not found");

        }

    }
}
