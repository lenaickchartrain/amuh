<?php

namespace AMUH\AmuhBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use AMUH\AmuhBundle\Entity\Enum\EtatEnum;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class TypeJourneeType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $etats = EtatEnum::getLibelleConstants();
        
        $builder
                ->add('tpjLibelle', TextType::class)
                ->add('tpjNbSecretaire', TextType::class)
                ->add('tpjNbMedecin', TextType::class)
                ->add('tpjEtat', ChoiceType::class,      ['choices' => $etats])
                ->add('save', SubmitType::class);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AMUH\AmuhBundle\Entity\TypeJournee'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'amuh_amuhbundle_typejournee';
    }


}
