<?php

namespace Estoy\AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EventoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titulo',null,array(
                'attr'=>array('class' => 'form-control'),
            ))
            ->add('fecha_fin')
            ->add('precio_minimo',null,array(
                'attr'=>array('class' => 'form-control'),
                ))
            ->add('precio_inicial',null,array(
                'attr' => array('class' => 'form-control')))
            ->add('localizacion',null,array(
                'attr' => array('class' => 'form-control')))
            ->add('nombre',null,array(
        'attr'=>array('class' => 'form-control')))
            ->add('email',null,array(
        'attr'=>array('class' => 'form-control')))
            ->add('telefono',null,array(
        'attr'=>array('class' => 'form-control')))
            ->add('tipo', 'choice', array(
                'choices'   => array(
                    'ticket tren'   => 'ticket tren',
                    'entrada concierto' => 'entrada concierto',
                    'entrada de teatro'   => 'entrada de teatro',
                    'otro' => 'otro'
                ),
                'attr'=>array('class' => 'form-control')
            ))        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Estoy\AppBundle\Entity\Evento'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'estoy_appbundle_evento';
    }
}
