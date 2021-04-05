<?php

declare(strict_types=1);

namespace Majermi4\NewLineSplit\PhpDocParser;

use Majermi4\NewLineSplit\Exception\InvalidConfigClassException;

class DocCommentParser
{
    public static function getConstructorDocComment(\ReflectionParameter $constructorParameter): string
    {
        /** @var \ReflectionClass<object> $classReflection */
        $classReflection = $constructorParameter->getDeclaringClass();
        $constructor = $classReflection->getConstructor();

        if ($constructor === null) {
            throw InvalidConfigClassException::missingConstructor($classReflection->getName());
        }

        $docComment = $constructor->getDocComment();

        if ($docComment === false) {
            throw InvalidConfigClassException::missingConstructorDocComment($classReflection->getName());
        }

        return $docComment;
    }
}
