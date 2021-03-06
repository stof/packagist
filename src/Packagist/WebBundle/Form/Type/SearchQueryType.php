<?php

/*
 * This file is part of Packagist.
 *
 * (c) Jordi Boggiano <j.boggiano@seld.be>
 *     Nils Adermann <naderman@naderman.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Packagist\WebBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * @author Igor Wiedler <igor@wiedler.ch>
 */
class SearchQueryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('query', 'search');
        $builder->add('orderBys', 'collection', array(
            'type' => new OrderByType(),
            'allow_add' => true,
            'allow_delete' => true
        ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Packagist\WebBundle\Form\Model\SearchQuery',
            'csrf_protection' => false,
        ));
    }

    public function getName()
    {
        return 'search_query';
    }
}
