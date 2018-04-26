<?php

namespace AMUH\AmuhBundle\Twig;

use AMUH\AmuhBundle\Entity\Orientation;
use AMUH\AmuhBundle\Entity\Cause;
use AMUH\AmuhBundle\Entity\ModaliteReglement;

class AmuhExtension extends \Twig_Extension {
    //put your code here
    public function getTests(){
        return[
            new \Twig_SimpleTest('orientation', function($orientation){ return $orientation instanceof Orientation;}),
            new \Twig_SimpleTest('cause', function($cause){ return $cause instanceof Cause;}),
            new \Twig_SimpleTest('modalitereglement', function($modaliteReglement){ return $modaliteReglement instanceof ModaliteReglement;})
        ];
    }

    public function getName() {
        return 'twigext';
    }

}
