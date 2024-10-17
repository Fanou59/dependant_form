<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfonycasts\DynamicForms\DependentField;
use Symfonycasts\DynamicForms\DynamicFormBuilder;

class FormulaireDependantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {

        $builder = new DynamicFormBuilder($builder);

        $builder
            ->add('drink', ChoiceType::class, [
                'label' => 'Choisissez votre boisson : ',
                'choices' => [
                    'Bière' => 'biere',
                    'Soda' => 'soda'
                ],
                'attr' => [
                    'class' => 'select select-secondary w-full max-w-xs mb-2'
                ],
            ])
            ->addDependent('typeofbier', 'drink', function (DependentField $field, ?string $drink) {

                if ($drink === 'biere') {
                    $field->add(ChoiceType::class, [
                        'label' => 'Quel type de bière ?',
                        'choices' => [
                            'Fortes' => 'fortes',
                            'Légères' => 'légères'
                        ],
                        'attr' => [
                            'class' => 'select select-secondary w-full max-w-xs mb-2'
                        ],
                    ]);
                }
            })
            ->addDependent('soda', 'drink', function (DependentField $field, ?string $drink) {
                if ($drink === 'soda') {
                    $field->add(ChoiceType::class, [
                        'label' => 'Quel type de soda ?',
                        'choices' => [
                            'Pétillant' => 'petillant',
                            'Plat' => 'plat'
                        ],
                        'attr' => [
                            'class' => 'select select-secondary w-full max-w-xs mb-2'
                        ],
                    ]);
                }
            })
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
