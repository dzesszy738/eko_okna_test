<?php

namespace App\Form;

use App\Entity\Formularz;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints\File;


class FormularzFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            
            ->add('Adres', TextType::class, [
                'attr' => array('style' => 'max-width: 800px; width:80%; margin-left:50px;'),
                'label' => 'Adres*'])
            ->add('Opis',TextareaType::class, array(
                'attr' => array('style' => 'max-width: 800px; width:80%; margin-left:50px;'),
                'required' => false))
            ->add('Pliki', FileType::class, [
                    'label' => 'Pliki (dopuszczalne formaty to jpeg oraz png, maksymalny rozmiar pliku to 10MB)',
                   
                    'attr' => array('style' => 'max-width: 800px; width:80%; margin-left:50px;'),
                    
                    'mapped' => false,
    
                    'required' => false,
                   
                    'constraints' => [
                        new File([
                            'maxSize' => '10000k',
                            'mimeTypes' => [
                                'image/jpeg',
                                'image/png',
                            ],
                            'mimeTypesMessage' => 'Proszę przesłać pliki jpeg lub png',
                            'maxSizeMessage' => 'Przesłany plik jest zbyt duży. Maksymalny rozmiar pliku to 10MB.',
                        ])
                    ],
                ])
                // ...
            ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
           // 'data_class' => Formularz::class,
        ]);
    }
}
