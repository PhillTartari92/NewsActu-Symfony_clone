<?php

namespace App\Form;

use App\Entity\Categorie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class CategoryFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => ' ',
                'constraints' => [ new NotBlank([
                   'message' => 'Ce champ ne peut pas être vide'
                ]),
                new Length([
                    'min' => 3,
                    'max' => 50,
                    'minMessage' => "Votre nom de catégorie est trop court. Le nombre de caractères minimal est {{ limit }}",
                    'maxMessage' => "Votre nom de catégorie est trop long. Le nombre de caractères maximal est {{ limit }}",
                ])
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Categorie::class,
        ]);
    }
}
