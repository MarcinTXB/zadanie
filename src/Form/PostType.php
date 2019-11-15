<?php

namespace App\Form;

use App\Entity\Post;
use App\Entity\Akapit;
use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $post = $builder->getData();
        
        $builder
            //->add('tytul', TytulType::class)
            ->add('tytul', TextType::class, [
                'label' => 'Tytuł',
                'help' => 'Tytuł posta',
                'attr' => [
                    'class' => "w-100",
                    'style' => 'margin:5% 0 0 0;padding:0 0 0 2%;',
                ],
                'help_attr' => [
                    'style' => 'font-style:italic;',
                ],
                'label_attr' => [
                    'style' => 'font-size:0.9em;line-height:1.3em;padding:1% 0 0 11%;margin:5% 0 0 0;'
                ]
            ])
            ->add('odgt', OdlegloscType::class, [
                'label' => 'Górna',
                'data' => $post->getId() ? $post->getOdgt() : 10,                
            ])
            ->add('odpt', OdlegloscType::class, [
                'label' => 'Prawa',                         //  'label' => false    brak labela
                'data' => $post->getId() ? $post->getOdpt() : 10,                
            ])
            ->add('oddt', OdlegloscType::class, [
                'label' => 'Dolna',
                'data' => $post->getId() ? $post->getOddt() : 10,                
            ])
            ->add('odlt', OdlegloscType::class, [
                'label' => 'Lewa',
                'data' => $post->getId() ? $post->getOdlt() : 10,                
            ])
            ->add('rozt', NumberType::class, [
                'label' => 'Rozmiar',
                'data' => $post->getId() ? $post->getRozt() : 13,
                'attr' => [
                    'class' => "w-50",
                    'style' => 'margin:0 0 0 19%;padding:0 0 0 3%;',
                    'autofocus' => true,
                ],
                'label_attr' => [
                    'style' => 'font-size:0.9em;font-style:italic;line-height:1.3em;color:#7A7A7A;padding-top:5%;'
                ]
            ])
            ->add('kolort', TextType::class, [
                'label' => 'Kolor',
                'data' => $post->getId() ? $post->getKolort() : '799',
                'attr' => [
                    'class' => "w-50",
                    'style' => 'margin:0 0 0 19%;padding:0 0 0 3%;',
                    'autofocus' => true,
                ],
                'label_attr' => [
                    'style' => 'font-size:0.9em;font-style:italic;line-height:1.3em;color:#7A7A7A;padding-top:5%;'
                ]
            ])
            ->add('italict', CheckboxType::class, [
                'label' => 'Italic',
                'data' => $post->getId() ? $post->getItalict() : true,
                'attr' => [
                    'class' => "w-75",
                    'style' => 'margin:1% 0 0 0;padding:0 0 0 0;margin-bottom:0px;',
                    'autofocus' => true,
                ],
                'label_attr' => [
                    'style' => 'font-size:0.9em;font-style:italic;line-height:0.5em;color:#7A7A7A;margin-bottom:0px;float:left;padding:5% 0 0 0;'
                ]
            ])
            ->add('boldt', CheckboxType::class, [
                'label' => 'Bold',
                'data' => $post->getId() ? $post->getBoldt() : true,
                'attr' => [
                    'class' => "w-75",
                    'style' => 'margin:4% 0 0 14%;padding:0 0 0 0;',
                  
                ],
                'label_attr' => [
                    'style' => 'font-size:0.9em;font-style:italic;line-height:0.5em;color:#7A7A7A;'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' =>Post::class,
        ]);
    }
}
