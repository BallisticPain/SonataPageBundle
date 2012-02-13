<?php

/*
 * This file is part of the Sonata project.
 *
 * (c) Thomas Rabaix <thomas.rabaix@sonata-project.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sonata\PageBundle\Form\Type;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

use Sonata\PageBundle\CmsManager\PageRendererInterface;

class TemplateChoiceType extends ChoiceType
{
    protected $renderer;

    public function __construct(PageRendererInterface $renderer)
    {
        $this->renderer = $renderer;
    }

    public function getDefaultOptions(array $options)
    {
        $multiple = isset($options['multiple']) && $options['multiple'];
        $expanded = isset($options['expanded']) && $options['expanded'];

        return array(
            'multiple'      => false,
            'expanded'      => false,
            'choice_list'   => null,
            'choices'       => $this->getTemplates(),
            'preferred_choices' => array(),
            'empty_data'        => $multiple || $expanded ? array() : '',
            'empty_value'       => $multiple || $expanded || !isset($options['empty_value']) ? null : '',
            'error_bubbling'    => false,
        );
    }

    public function getTemplates()
    {
        $templates = array();
        foreach ($this->renderer->getTemplates() as $code => $template) {
            $templates[$code] = $template->getName();
        }

        return $templates;
    }
}