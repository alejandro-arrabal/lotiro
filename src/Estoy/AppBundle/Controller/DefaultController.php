<?php

namespace Estoy\AppBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Estoy\AppBundle\Entity\Evento;
use Estoy\AppBundle\Form\EventoType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use JMS\Payment\CoreBundle\Entity\ExtendedData;
use JMS\Payment\CoreBundle\Entity\Payment;
use JMS\Payment\CoreBundle\PluginController\Result;
use JMS\Payment\CoreBundle\Plugin\Exception\ActionRequiredException;
use JMS\Payment\CoreBundle\Plugin\Exception\Action\VisitUrl;
use JMS\Payment\CoreBundle\Entity\PaymentInstruction;
use JMS\Payment\CoreBundle\JMSPaymentCoreBundle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use JMS\DiExtraBundle\Annotation as DI;

class DefaultController extends Controller
{
    /** @DI\LookupMethod("form.factory") */
    protected function getFormFactory() { }

    /**
     * Creates a new Evento entity.
     *
     * @Route("/", name="panel_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $form=$this->createCreateForm(new Evento())->createView();
        $em = $this->getDoctrine()->getManager();
        $events = $em->getRepository('EstoyAppBundle:Evento')->findAll();
        return $this->render('EstoyAppBundle:Default:index.html.twig',array('form'=>$form,'events'=>$events));
    }

    /**
     * Creates a new Evento entity.
     *
     * @Route("/conocenos", name="conocenos")
     * @Method("GET")
     */
    public function conocenosAction()
    {
        return $this->render('EstoyAppBundle:Default:conocenos.html.twig');
    }
    /**
     * Creates a new Evento entity.
     *
     * @Route("/contacto", name="contacto")
     * @Method("GET")
     */
    public function contactoAction()
    {
        return $this->render('EstoyAppBundle:Default:contacto.html.twig');
    }
    /**
     * Creates a form to create a Evento entity.
     *
     * @param Evento $evento The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Evento $evento)
    {
        $form = $this->createForm(new EventoType(), $evento, array(
            'action' => $this->generateUrl('panel_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }


    /**
     * Creates a new Evento entity.
     *
     * @Route("/create", name="panel_create")
     * @Method("POST")
     */
    public function createAction(Request $request)
    {
        $evento = new Evento();
        $form = $this->createCreateForm($evento);
        $form->handleRequest($request);
        $em = $this->getDoctrine()->getManager();

        if ($form) {
            $em->persist($evento);
            $em->flush();
        }
        return $this->redirect($this->generateUrl('panel_index'));
    }

    /**
     * Edits an existing Evento entity.
     *
     * @Route("/{id}/edit", name="panel_event_update")
     * @Method("PUT")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $evento = $em->getRepository('EstoyAppBundle:Evento')->find($id);

        if (!$evento) {
            throw $this->createNotFoundException('Unable to find Event entity.');
        }

        $editForm = $this->createEditForm($evento);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->persist($evento);
            $em->flush();
            return $this->redirect($this->generateUrl('panel_index', array('id' => $id)));
        }

        return $this->redirect($this->generateUrl('panel_index'));
    }
    /**
     * Edits an existing Evento entity.
     *
     * @Route("/paypal", name="panel_paypal")
     * @Method("GET")
     */
    public function getPaymentForm(){
        $price=$this->get('request')->get('amount');
        $form = $this->getFormFactory()->create('jms_choose_payment_method', null, array(
            'amount'   => $price,
            'currency' => 'EUR',
            'default_method' => 'payment_paypal', // Optional
            'predefined_data' => array(
                'paypal_express_checkout' => array(
                    'return_url' => $this->get('router')->generate('payment_complete', array(
                        'orderNumber' => rand(10000,10000000),
                    ), true)
                ),
                'checkout_params' => array(
                    'L_PAYMENTREQUEST_0_AMT0' => $price,
                    'PAYMENTREQUEST_0_AMT' => $price, // The total cost of the transaction to the buyer
                    'L_PAYMENTREQUEST_0_NAME0' => "articulo",
                    'L_PAYMENTREQUEST_0_QTY0' => 1, // Item quantity.
                )
            ),
        ));
        $form->add('save', 'button', array(
            'attr' => array('type'=>'submit','class' => 'save'),
        ));
        return $this->render(
            'EstoyAppBundle:Form:form.html.twig',
            array('form' => $form->createView())
        );
    }


}
