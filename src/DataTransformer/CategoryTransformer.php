<?php

// src/Form/DataTransformer/IssueToNumberTransformer.php
namespace App\DataTransformer;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;

class CategoryTransformer implements DataTransformerInterface
{
    private $entityManager;

    public function __construct(ObjectManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    public function transform($categorys): string
    {
        $categoriesNames = array_map(fn($value): string => $value->getName(), $categorys->getValues());
        return implode(', ', $categoriesNames);
        // return $categoriesNames;
        // return $showCase->getcategorys()->getValues();
    }

    /**
     * Transforms a string (number) to an object (issue).
     *
     * @param  string $issueNumber
     * @throws TransformationFailedException if object (issue) is not found.
     */
    public function reverseTransform($categorysString)
    {

        $string = trim($categorysString);
        $arrayOfString = array_unique(explode(', ',$string));
        // $arrayOfComa = array_unique(explode(' ,',$string));
        // $truearray = array_merge($arrayOfComa, $arrayOfString);

        
        // $arrayCategoryName = [];
        // foreach ($arrayOfString as $string) {
        //       $withoutSpace = trim($string);
        //       array_push($arrayCategoryName, $withoutSpace);
        // }
        

        // $arrayCategoryNameEnd = str_replace($, )


        dd(str_replace( ' ,' , '', $arrayOfString));
        return [];
    }
}