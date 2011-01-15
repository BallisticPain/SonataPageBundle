<?php

/*
 * This file is part of the Sonata package.
 *
 * (c) Thomas Rabaix <thomas.rabaix@sonata-project.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Bundle\Sonata\PageBundle\Admin;

use Bundle\Sonata\BaseApplicationBundle\Admin\EntityAdmin as Admin;

class BlockAdmin extends Admin
{

    protected $class = 'Application\Sonata\PageBundle\Entity\Block';

    protected $listFields = array(
        'id' => array('identifier' => true),
        'page',
        'enabled',
        'type',
    );

    protected $baseRoute = 'sonata_page_block_admin';

    // don't know yet how to get this value
    protected $baseControllerName = 'Sonata\PageBundle:BlockCRUD';

}