<?php

namespace App\Controller\Admin;

use App\Entity\Articles;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ArticlesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Articles::class;
    }


    public function configureFields(string $pageName): iterable
    {
       yield TextField::new('title');

        yield SlugField::new('slug')
            ->setTargetFieldName('title');

        yield TextEditorField::new('content');

        yield TextField::new('featuredText');

        yield AssociationField::new('categories');

        yield AssociationField::new('featuredImage');

        yield DateTimeField::new('createdAt')
            ->hideOnForm();

        yield DateTimeField::new('updateddAt')
            ->hideOnForm();
    }

}
