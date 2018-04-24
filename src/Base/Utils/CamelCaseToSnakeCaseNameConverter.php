<?php
namespace App\Base\Utils;

use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter as SymfonyCamelCaseToSnakeCaseNameConverter;

class CamelCaseToSnakeCaseNameConverter extends SymfonyCamelCaseToSnakeCaseNameConverter implements NameConverterInterface
{


}