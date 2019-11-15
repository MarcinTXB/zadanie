<?php

namespace App\Form;

use App\Entity\Temat;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TematType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nazwa tematu ',
                'attr' => [
                    'class' => "w-50",
                    'style' => 'margin:0;padding:0 0 0 1%;',
                    'autofocus' => true
                ],
            ])            
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Temat::class,
        ]);
    }
}
