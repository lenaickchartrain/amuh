<?php

namespace AMUH\AmuhBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use AMUH\AmuhBundle\Entity\Enum\EtatEnum;

class UtilisateurType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $etats = EtatEnum::getLibelleConstants();
        
        //parent::buildForm($builder, $options);
        
        $builder
            ->add('prsNom', TextType::class)
            ->add('prsNomJeuneFille', TextType::class, ['required' => false])
            ->add('prsPrenom', TextType::class)
            ->add('prsTelephone', TextType::class, ['required' => false])
            ->add('usrEmail', TextType::class)
            ->add('usrPassword', PasswordType::class)
            ->add('usrEtat', ChoiceType::class,      ['choices' => $etats])
            ->add('roles', EntityType::class,      ['class' => 'AmuhBundle:Role','choice_label' => 'rolLibelle', 'multiple' => true])
            ->add('save', SubmitType::class);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AMUH\AmuhBundle\Entity\Utilisateur'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'amuh_amuhbundle_utilisateur';
    }


}
