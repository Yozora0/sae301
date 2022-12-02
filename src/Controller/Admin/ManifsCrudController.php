<?php

namespace App\Controller\Admin;

use App\Entity\Manifs;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TimeField;



class ManifsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Manifs::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('titre'),
            TextEditorField::new('description'),
            TextField::new('genre'),
            TextEditorField::new('casting'),
            ImageField::new('affiche')->setBasePath('img')->setUploadDir('public/img'),
            IntegerField::new('tarif'),
            TextField::new('lieu'),
            DateField::new('date'),
            TimeField::new('horaire'),
            AssociationField::new('salle','Salles'),


        ];
    }

}
