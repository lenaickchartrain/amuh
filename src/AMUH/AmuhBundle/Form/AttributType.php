<?php

namespace AMUH\AmuhBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use AMUH\AmuhBundle\Entity\Enum\EtatEnum;
//use AMUH\AmuhBundle\Entity\CategorieAttribut;

class AttributType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $etats = EtatEnum::getLibelleConstants();
        $builder
                ->add('atbLibelle', TextType::class, ['required' => true])
                ->add('atbEtat', ChoiceType::class,      ['choices' => $etats])
                ->add('categorieAttribut', EntityType::class, ['class' => 'AmuhBundle:CategorieAttribut', 'choice_label' => 'catLibelle'])
                ->add('save', SubmitType::class);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AMUH\AmuhBundle\Entity\Attribut'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'amuh_amuhbundle_attribut';
    }


}
