<?php

namespace AMUH\AmuhBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use AMUH\AmuhBundle\Entity\Enum\EtatEnum;

class MedecinType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
		$etats = EtatEnum::getLibelleConstants();
		
        $builder
			->add('prsNom', TextType::class)
            ->add('prsNomJeuneFille', TextType::class, ['required' => false])
            ->add('prsPrenom', TextType::class)
            ->add('prsTelephone', TextType::class)
			->add('medRue', TextType::class)
			->add('medComplementAdresse', TextType::class, ['required' => false])
			->add('medCodePostal', TextType::class)
			->add('medVille', TextType::class)
			->add('medEtat', ChoiceType::class,      ['choices' => $etats])
            ->add('save', SubmitType::class);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AMUH\AmuhBundle\Entity\Medecin'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'amuh_amuhbundle_medecin';
    }


}
