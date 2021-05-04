<?php

namespace App\GraphQl\Type;

use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Youshido\GraphQL\Config\Object\ObjectTypeConfig;
use Youshido\GraphQL\Type\Object\AbstractObjectType;
use Youshido\GraphQL\Type\ListType\ListType;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;
use App\GraphQl\Type\CountryType;
use App\GraphQl\Type\DepartmentType;


class LocationType extends AbstractObjectType
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
                'address' => new StringType(),
                'postal_code' => new NumberType(),
                'country' => new CountryType(),
                'departments' => new ListType(new DepartmentType())
            ]
        );
    }
}
