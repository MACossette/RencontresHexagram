<?php

namespace YOOtheme\Builder\Joomla\Source\Type;

use Joomla\CMS\Categories\CategoryNode;
use Joomla\CMS\Helper\TagsHelper;
use function YOOtheme\app;
use YOOtheme\Builder\Source;
use YOOtheme\Path;
use YOOtheme\View;

class CategoryType
{
    /**
     * @param Source $source
     *
     * @return array
     */
    public function __invoke(Source $source)
    {
        $fields = [

            'title' => [
                'type' => 'String',
                'metadata' => [
                    'label' => 'Title',
                    'filters' => ['limit'],
                ],
            ],

            'description' => [
                'type' => 'String',
                'metadata' => [
                    'label' => 'Description',
                    'filters' => ['limit'],
                ],
            ],

            'numitems' => [
                'type' => 'String',
                'metadata' => [
                    'label' => 'Items Count',
                ],
            ],

            'params' => [
                'type' => 'CategoryParams',
                'metadata' => [
                    'label' => '',
                ],
            ],

            'link' => [
                'type' => 'String',
                'metadata' => [
                    'label' => 'Link',
                ],
            ],

            'tagString' => [
                'type' => 'String',
                'args' => [
                    'separator' => [
                        'type' => 'String',
                    ],
                    'show_link' => [
                        'type' => 'Boolean',
                    ],
                    'link_style' => [
                        'type' => 'String',
                    ],
                ],
                'metadata' => [
                    'label' => 'Tags',
                    'arguments' => [

                        'separator' => [
                            'label' => 'Separator',
                            'description' => 'Set the separator between tags.',
                            'default' => ', ',
                        ],
                        'show_link' => [
                            'label' => 'Link',
                            'type' => 'checkbox',
                            'default' => true,
                            'text' => 'Show link',
                        ],
                        'link_style' => [
                            'label' => 'Link Style',
                            'description' => 'Set the link style.',
                            'type' => 'select',
                            'default' => '',
                            'options' => [
                                'Default' => '',
                                'Muted' => 'link-muted',
                                'Text' => 'link-text',
                                'Heading' => 'link-heading',
                                'Reset' => 'link-reset',
                            ],
                            'enable' => 'arguments.show_link',
                        ],

                    ],
                ],
            ],

            'parent' => [
                'type' => 'Category',
                'metadata' => [
                    'label' => 'Parent Category',
                ],
            ],

            'categories' => [
                'type' => [
                    'listOf' => 'Category',
                ],
                'metadata' => [
                    'label' => 'Child Categories',
                ],
            ],

            'tags' => [
                'type' => [
                    'listOf' => 'Tag',
                ],
                'metadata' => [
                    'label' => 'Tags',
                ],
            ],

            'field' => [
                'type' => 'CategoryFields',
                'metadata' => [
                    'label' => 'Fields',
                ],
            ],

        ];

        $metadata = [
            'type' => true,
            'label' => 'Category',
        ];

        $resolvers = $source->mapResolvers($this);

        return compact('fields', 'resolvers', 'metadata');
    }

    public function params($category)
    {
        return is_string($category->params) ? json_decode($category->params) : $category->params;
    }

    public function link($category)
    {
        return \ContentHelperRoute::getCategoryRoute($category->id, $category->language);
    }

    /**
     * @param CategoryNode $category
     *
     * @return CategoryNode
     */
    public function parent($category)
    {
        return $category->getParent();
    }

    /**
     * @param CategoryNode $category
     *
     * @return CategoryNode[]
     */
    public function categories($category)
    {
        return $category->getChildren();
    }

    public function tags($category)
    {
        if (!isset($category->tags)) {
            return (new TagsHelper())->getItemTags('com_content.category', $category->id);
        }

        return $category->tags->itemTags;
    }

    public function field($category)
    {
        return $category;
    }

    public function tagString($category, array $args)
    {
        $tags = $this->tags($category);
        $args += ['separator' => ', ', 'show_link' => true, 'link_style' => ''];

        return app(View::class)->render(Path::get('../../templates/tags'), compact('category', 'tags', 'args'));
    }
}
