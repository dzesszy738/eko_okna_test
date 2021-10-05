<?php

namespace App\Controller\Admin;

use App\Entity\Formularz;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class FormularzCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Formularz::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
