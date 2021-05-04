<?php

namespace App\GraphQl\Type;

use Youshido\GraphQL\Config\Object\ObjectTypeConfig;
use Youshido\GraphQL\Type\Object\AbstractObjectType;
use Youshido\GraphQL\Type\ListType\ListType;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use App\GraphQl\Type\DepartmentType;
use App\GraphQl\Type\EmployeeType;

class JobType extends AbstractObjectType
{
    /**
     * @param ObjectTypeConfig $config
     *
     * @return mixed
     */
    public function build($config)
    {
        $config->addFields(
            [
                'id' => new NonNullType(new IdType()),
                'title' => new StringType(),
                'salary' => new NumberType(),
                'department' => new DepartmentType(),
                'employees' => new ListType(new EmployeeType())
            ]
        );
    }
}
