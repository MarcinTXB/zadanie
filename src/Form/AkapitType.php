<?php

namespace App\Form;

use App\Entity\Akapit;
use App\Entity\Post;
use App\Repository\AkapitRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AkapitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $akapit = $builder->getData();
        
        $builder
            /*->add('post', EntityType::class, [
                'class' => Post::class,*/
                /*'query_builder' => function(EntityRepository $er) use ($temat) {
                    return $er->createQueryBuilder('p')
                                ->where('p.temat = ?1')
                                ->setParameter(1, $temat);
                },*/
                /*'label' => 'Post',
                'help' => 'Akapit z postu o tytule',
                'attr' => [
                    'class' => "w-100",
                    'style' => 'margin:0 0 0 0;padding:0 0 0 1%;',
                ],
                'help_attr' => [
                    'style' => 'font-style:italic;',
                ],
                'label_attr' => [
                    'style' => 'font-size:0.9em;line-height:1.3em;padding:2% 0 0 5%;'
                ]
                
            ])*/            
            ->add('tytul', TextType::class, [
                'label' => 'Tytuł',
                'help' => 'Tytuł akapitu',
                'required' => false,
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
            ->add('tresc', TextareaType::class, [
                'label' => false,                
                'help' => 'Treść całego akapitu',
                'help_attr' => [
                    'style' => 'font-style:italic;',
                ],
                'attr' => [
                    //'class' => "w-100",
                    'style' => 'margin:0 0 0 0;padding:0.5% 0 0 1%;',
                    'autofocus' => true,
                    'rows' => 5,
                    
                ],
                'label_attr' => [
                    'style' => 'font-size:0.9em;font-style:italic;line-height:1.3em;color:#7A7A7A;'
                ]
            ])
            ->add('odgt', NumberType::class, [
                'label' => 'Górna',
                'data' => $akapit->getId() ? $akapit->getOdgt() : 5,
                'attr' => [
                    'class' => "w-50",                    
                    'style' => 'margin:0 0 0 19%;padding:0 0 0 3%;',                    
                ],                
                'label_attr' => [
                    'style' => 'font-size:0.9em;font-style:italic;line-height:1.3em;color:#7A7A7A;padding-top:5%;'
                ]
            ])
            ->add('odpt', NumberType::class, [
                'label' => 'Prawa',                         //  'label' => false    brak labela                
                'data' => $akapit->getId() ? $akapit->getOdpt() : 1,
                'attr' => [
                    'class' => "w-50",
                    'style' => 'margin:0 0 0 19%;padding:0 0 0 3%;',                    
                ],
                'label_attr' => [
                    'style' => 'font-size:0.9em;font-style:italic;line-height:1.3em;color:#7A7A7A;padding-top:5%;'
                ]
            ])
            ->add('oddt', NumberType::class, [
                'label' => 'Dolna',
                'data' => $akapit->getId() ? $akapit->getOddt() : 0,
                'attr' => [
                    'class' => "w-50",
                    'style' => 'margin:0 0 0 19%;padding:0 0 0 3%;',                    
                ],
                'label_attr' => [
                    'style' => 'font-size:0.9em;font-style:italic;line-height:1.3em;color:#7A7A7A;padding-top:5%;'
                ]
            ])
            ->add('odlt', NumberType::class, [
                'label' => 'Lewa',
                'data' => $akapit->getId() ? $akapit->getOdlt() : 1,
                'attr' => [
                    'class' => "w-50",
                    'style' => 'margin:0 0 0 19%;padding:0 0 0 3%;',                    
                ],
                'label_attr' => [
                    'style' => 'font-size:0.9em;font-style:italic;line-height:1.3em;color:#7A7A7A;padding-top:5%;'
                ]
            ])            
            ->add('rozt', NumberType::class, [
                'label' => 'Rozm.[em] ',
                'data' => $akapit->getId() ? $akapit->getRozt() : 1.2,
                'attr' => [
                    'class' => "w-50",
                    'style' => 'margin:0 0 0 19%;padding:0 0 0 3%;',                    
                ],
                'label_attr' => [
                    'style' => 'font-size:0.9em;font-style:italic;line-height:1.3em;color:#7A7A7A;padding-top:5%;'
                ]
            ])
            ->add('kolort', TextType::class, [
                'label' => "Kolor #",
                'data' => $akapit->getId() ? $akapit->getKolort() : 'EEE',
                'attr' => [
                    'class' => "w-50",
                    'style' => 'margin:0 0 0 19%;padding:0 0 0 3%;',                    
                ],
                'label_attr' => [
                    'style' => 'font-size:0.9em;font-style:italic;line-height:1.3em;color:#7A7A7A;padding-top:5%;white-space:nowrap;'
                ]
            ])
            ->add('italict', CheckboxType::class, [
                'label' => 'Italic',
                'data' => $akapit->getId() ? $akapit->getItalict() : false,
                'required' => false,
                'attr' => [
                    'class' => "w-75",
                    'style' => 'margin:1% 0 0 0;padding:0 0 0 0;margin-bottom:0px;',                    
                ],
                'label_attr' => [
                    'style' => 'font-size:0.9em;font-style:italic;line-height:0.5em;color:#7A7A7A;margin-bottom:0px;float:left;padding:5% 0 0 0;'
                ]
            ])
            ->add('boldt', CheckboxType::class, [
                'label' => 'Bold',
                'data' => $akapit->getId() ? $akapit->getBoldt() : false,
                'required' => false,
                'attr' => [
                    'class' => "w-75",
                    'style' => 'margin:4% 0 0 14%;padding:0 0 0 0;',                    
                ],
                'label_attr' => [
                    'style' => 'font-size:0.9em;font-style:italic;line-height:0.5em;color:#7A7A7A;'
                ]
            ])
            ->add('odg', NumberType::class, [
                'label' => 'Górna',
                'data' => $akapit->getId() ? $akapit->getOdg() : 1,
                'attr' => [
                    'class' => "w-50",
                    'style' => 'margin:0 0 0 19%;padding:0 0 0 3%;',                    
                ],
                'label_attr' => [
                    'style' => 'font-size:0.9em;font-style:italic;line-height:1.3em;color:#7A7A7A;padding-top:5%;'
                ]
            ])
            ->add('odp', NumberType::class, [
                'label' => 'Prawa',
                'data' => $akapit->getId() ? $akapit->getOdp() : 5,
                'attr' => [
                    'class' => "w-50",
                    'style' => 'margin:0 0 0 19%;padding:0 0 0 3%;',                    
                ],
                'label_attr' => [
                    'style' => 'font-size:0.9em;font-style:italic;line-height:1.3em;color:#7A7A7A;padding-top:5%;'
                ]
            ])
            ->add('odd', NumberType::class, [
                'label' => 'Dolna',
                'data' => $akapit->getId() ? $akapit->getOdd() : 0,
                'attr' => [
                    'class' => "w-50",
                    'style' => 'margin:0 0 0 19%;padding:0 0 0 3%;',                    
                ],
                'label_attr' => [
                    'style' => 'font-size:0.9em;font-style:italic;line-height:1.3em;color:#7A7A7A;padding-top:5%;'
                ]
            ])
            ->add('odl', NumberType::class, [
                'label' => 'Lewa',
                'data' => $akapit->getId() ? $akapit->getOdl() : 5,
                'attr' => [
                    'class' => "w-50",
                    'style' => 'margin:0 0 0 19%;padding:0 0 0 3%;',                    
                ],
                'label_attr' => [
                    'style' => 'font-size:0.9em;font-style:italic;line-height:1.3em;color:#7A7A7A;padding-top:5%;'
                ]
            ])            
            ->add('roz', NumberType::class, [
                'label' => 'Rozm.[em]',                    
                'data' => $akapit->getId() ? $akapit->getRoz() : 0.8,                 //  placeholder                                               
                'attr' => [
                    'class' => "w-50",
                    'style' => 'margin:0 0 0 19%;padding:0 0 0 3%;',                    
                ],
                'label_attr' => [
                    'style' => 'font-size:0.9em;font-style:italic;line-height:1.3em;color:#7A7A7A;padding-top:5%;'
                ]
            ])
            ->add('kolor', TextType::class, [
                'label' => 'Kolor #',
                'data' => $akapit->getId() ? $akapit->getKolor() : 'AFF',
                'attr' => [
                    'class' => "w-50",
                    'style' => 'margin:0 0 0 19%;padding:0 0 0 3%;',                    
                ],
                'label_attr' => [
                    'style' => 'font-size:0.9em;font-style:italic;line-height:1.3em;color:#7A7A7A;padding-top:5%;white-space:nowrap;'
                ]
            ])
            ->add('italic', CheckboxType::class, [
                'label' => 'Italic',
                'data' => $akapit->getId() ? $akapit->getItalic() : false,
                'required' => false,
                'attr' => [
                    'class' => "w-75",
                    'style' => 'margin:1% 0 0 0;padding:0 0 0 0;',                    
                ],
                'label_attr' => [
                    'style' => 'font-size:0.9em;font-style:italic;line-height:0.5em;color:#7A7A7A;margin-bottom:0px;float:left;padding:5% 0 0 0;'
                ]
            ])
            ->add('bold', CheckboxType::class, [
                'label' => 'Bold',
                'data' => $akapit->getId() ? $akapit->getBold() : false,
                'required' => false,
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
            'data_class' => Akapit::class,
            
        ]);
    }
}
