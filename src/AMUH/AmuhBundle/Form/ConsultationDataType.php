<?php

namespace AMUH\AmuhBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class ConsultationDataType extends AbstractType
{
	
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
        $builder->addEventListener(FormEvents::PRE_SET_DATA, function(FormEvent $event){
            
            $consultationData = $event->getData();
            //var_dump($consultationData);
            if($consultationData === null){
                return;
            }
            switch($consultationData->getAttribut()->getAtbLibelle()){
                case 'Genre':
                    $event->getForm()->add('csdValeur', ChoiceType::class, ['choices' => ['M.' => 'H', 'Mme' => 'F']]);
                    break;
                case 'Nom':
                    $event->getForm()->add('csdValeur', TextType::class);
                    break;
                case 'Prenom':
                    $event->getForm()->add('csdValeur', TextType::class);
                    break;
                case 'Age':
                    $event->getForm()->add('csdValeur', TextType::class);
                    break;
                case 'Régulé':
                    $event->getForm()->add('csdValeur', EntityType::class, [
                        'required' => false,
                        'class' => 'AmuhBundle:Orientation',
                        'choice_label' => 'oriLibelle',
                        'choice_value' => 'oriLibelle'
                    ]);
                    break;
                case 'Cause':
                    $event->getForm()->add('csdValeur', EntityType::class, [
                        'class' => 'AmuhBundle:Cause',
                        'choice_label' => 'cauLibelle',
                        'choice_value' => 'cauLibelle'
                    ]);
                    break;
                case 'Code Postal':
                    $event->getForm()->add('csdValeur', TextType::class);
                    break;
                case 'Ville':
                    $event->getForm()->add('csdValeur', TextType::class);
                    break;
                case 'Montant':
                    $event->getForm()->add('csdValeur', TextType::class, ['required' => false]);
                    break;
                case 'Modalité de règlement':
                    $event->getForm()->add('csdValeur', EntityType::class, [
                        'class' => 'AmuhBundle:ModaliteReglement',
                        'choice_label' => 'moreLibelle',
                        'choice_value' => 'moreLibelle',
                        'required' => false
                    ]);
                    break;
                default :
                    $event->getForm()->add('csdValeur', TextType::class);
                    break;
            }
            /*if($consultationData->getAttribut()->getAtbLibelle() == 'Genre'){
                $event->getForm()->add('csdValeur', ChoiceType::class, ['choices' => ['M.' => 'H', 'Mme' => 'F']]);
            }
            else{
                $event->getForm()->add('csdValeur', TextType::class);
            }*/
            
        });
        
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AMUH\AmuhBundle\Entity\ConsultationData'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'amuh_amuhbundle_consultationdata';
    }
}
