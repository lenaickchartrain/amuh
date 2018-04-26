<?php

namespace AMUH\AmuhBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use AMUH\AmuhBundle\Form\ConsultationDataType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;
use AMUH\AmuhBundle\Repository\MedecinRepository;

class ConsultationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('cstCommentaire', TextareaType::class, ['required' => false])
            ->add('consultationDatas', CollectionType::class, 
                [
                    'entry_type' => ConsultationDataType::class,
                    'allow_add'    => true,
                    'allow_delete' => true 
                ]
            )
            ->add('save', SubmitType::class);
        
        $builder->addEventListener(FormEvents::PRE_SET_DATA, function(FormEvent $event){
            $consultation = $event->getData();
            
            if($consultation === NULL){
                return;
            }
            
            //if($consultation->getIdConsultation() === NULL){
                $event->getForm()->add('medecin', EntityType::class, [
                        'class' => 'AmuhBundle:Medecin',
                        'choice_label' => 'nomPrenom',
                        'query_builder' => function(MedecinRepository $medecinRepository){
                            return $medecinRepository->getMedecinsTodayQueryBuilder();
                        },
                        'required' => false
                    ]);
            //}
        });
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AMUH\AmuhBundle\Entity\Consultation',
			'attributs' => null
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'amuh_amuhbundle_consultation';
    }


}
