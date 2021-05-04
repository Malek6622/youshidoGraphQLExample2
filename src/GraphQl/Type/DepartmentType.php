<?php

namespace App\GraphQl\Type;

use App\GraphQl\Type\LocationType;
use Youshido\GraphQL\Config\Object\ObjectTypeConfig;
use Youshido\GraphQL\Type\Object\AbstractObjectType;
use Youshido\GraphQL\Type\ListType\ListType;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;
use App\GraphQl\Type\JobType;

class DepartmentType extends AbstractObjectType
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
                'name' => new StringType(),
                'location' => new LocationType(),
                'jobs' => new ListType(new JobType())
            ]
        );
    }
}
