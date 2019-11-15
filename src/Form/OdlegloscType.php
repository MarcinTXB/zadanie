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

class OdlegloscType extends AbstractType
{   
    public function getParent()
    {
        return NumberType::class;
    }
        
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'attr' => [
                'class' => "w-50",
                'style' => 'margin:0 0 0 19%;padding:0 0 0 3%;',
            ],
            'label_attr' => [
                'style' => 'font-size:0.9em;font-style:italic;line-height:1.3em;color:#7A7A7A;padding-top:5%;'
            ]
        ]);
    }
    
     
}
