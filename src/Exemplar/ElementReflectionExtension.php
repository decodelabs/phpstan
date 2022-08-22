<?php

/**
 * @package PHPStanDecodeLabs
 * @license http://opensource.org/licenses/MIT
 */

declare(strict_types=1);

namespace DecodeLabs\PHPStan\Exemplar;

use DecodeLabs\Exemplar\Element as XmlElement;
use DecodeLabs\PHPStan\PropertyReflection;

use PHPStan\Reflection\ClassReflection;
use PHPStan\Reflection\PropertiesClassReflectionExtension;
use PHPStan\Reflection\PropertyReflection as PropertyReflectionInterface;
use PHPStan\Type\ArrayType;
use PHPStan\Type\IntegerType;
use PHPStan\Type\ObjectType;

class ElementReflectionExtension implements PropertiesClassReflectionExtension
{
    public function hasProperty(
        ClassReflection $classReflection,
        string $propertyName
    ): bool {
        return $classReflection->getName() === XmlElement::class;
    }

    public function getProperty(
        ClassReflection $classReflection,
        string $propertyName
    ): PropertyReflectionInterface {
        return new PropertyReflection($classReflection, new ArrayType(
            new IntegerType(),
            new ObjectType($classReflection->getName())
        ));
    }
}
