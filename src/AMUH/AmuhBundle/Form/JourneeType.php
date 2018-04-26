<?php

namespace AMUH\AmuhBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class JourneeType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('jouDate',        DateType::class)
                ->add('typeJournee',    EntityType::class,      ['class' => 'AmuhBundle:TypeJournee','choice_label' => 'tpjLibelle', 'multiple' => FALSE])
                ->add('secretaires',    EntityType::class,      ['class' => 'AmuhBundle:Utilisateur','choice_label' => 'prsNomPrenom', 'multiple' => true])
                ->add('medecins',       EntityType::class,      ['class' => 'AmuhBundle:Medecin','choice_label' => 'prsNomPrenom', 'multiple' => true])
                ->add('save',           SubmitType::class);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AMUH\AmuhBundle\Entity\Journee'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'amuh_amuhbundle_journee';
    }


}
