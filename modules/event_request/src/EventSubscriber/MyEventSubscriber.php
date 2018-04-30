<?php
 namespace Drupal\event_request\EventSubscriber;

 use Symfony\Component\HttpKernel\KernelEvents;
 use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
 use Symfony\Component\HttpKernel\Event\GetResponseEvent;
 use Symfony\Component\EventDispatcher\EventSubscriberInterface;
 use Symfony\Component\HttpFoundation\RedirectResponse;



 class MyEventSubscriber implements EventSubscriberInterface {

   public function redirectAnonymousUser(GetResponseEvent $event) {

      global $base_url;
       //  $var1=\Drupal::currentUser()->isAnonymous();
       //  $var = \Drupal::routeMatch()->getRouteName();
       // kint($var);
       // kint($var1);

        if ( \Drupal::currentUser()->isAnonymous() &&
          \Drupal::routeMatch()->getRouteName() == 'event_routing.content')
      {
       $response = new RedirectResponse($base_url, 301);
       $event->setResponse($response);
       $event->stopPropagation();
       return;
     }

}
   public static function getSubscribedEvents() {
     $events[KernelEvents::REQUEST][] = array('redirectAnonymousUser');
     return $events;

   }

 }

