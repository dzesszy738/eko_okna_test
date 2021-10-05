<?php

namespace App\Controller\Admin;

use App\Entity\Formularz;

use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;


use Vich\UploaderBundle\Form\Type\VichImageType;

class FormularzCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Formularz::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('Id'),
            TextField::new('User ID'),
            TextEditorField::new('Adres'),
            TextEditorField::new('Opis'),
            TextField::new('Flaga'),
            TextEditorField::new('Pliki'),
            
        ];
    }
    public function restockAction()
    {
        
        $id = $this->request->query->get('id');
        $entity = $this->em->getRepository(Formularz::class)->find($id);
        $entity->setFlaga("Odczytane");
        $this->em->flush();

       
        return $this->redirectToRoute('easyadmin', [
            'action' => 'list',
            'entity' => $this->request->query->get('entity'),
        ]);
    }

    
    
}
