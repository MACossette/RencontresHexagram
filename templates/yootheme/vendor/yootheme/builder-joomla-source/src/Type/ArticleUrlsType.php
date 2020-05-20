<?php

namespace YOOtheme\Builder\Joomla\Source\Type;

class ArticleUrlsType
{
    /**
     * @return array
     */
    public function __invoke()
    {
        $fields = [];
        $resolvers = [];

        foreach (['a', 'b', 'c'] as $letter) {

            $fields["url{$letter}"] = [
                'type' => 'String',
                'metadata' => [
                    'label' => ucfirst($letter),
                ],
            ];

            $fields["url{$letter}text"] = [
                'type' => 'String',
                'metadata' => [
                    'label' => ucfirst($letter) . ' Text',
                    'filters' => ['limit'],
                ],
            ];

            $resolvers["url{$letter}"] = function ($item, $args, $context, $info) {
                return $item->{$info->fieldName} ?: '';
            };

        }

        return compact('fields', 'resolvers');
    }
}
