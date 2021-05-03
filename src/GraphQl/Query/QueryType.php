<?php

namespace App\GraphQl\Query;

use Youshido\GraphQL\Config\Object\ObjectTypeConfig;
use Youshido\GraphQL\Type\Object\AbstractObjectType;

class QueryType extends AbstractObjectType
{
    /**
     * @param ObjectTypeConfig $config
     *
     *
     */
    public function build($config)
    {
        $config->addFields([
//            new CountryField(),
//            new DepartmentField(),
//            new DepartmentField(),
//            new JobField(),
//            new EmployeeField()
        ]);
    }
}
