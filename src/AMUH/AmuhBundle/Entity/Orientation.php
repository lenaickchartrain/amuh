<?php

namespace AMUH\AmuhBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Orientation
 *
 * @ORM\Table(name="orientation")
 * @ORM\Entity(repositoryClass="AMUH\AmuhBundle\Repository\OrientationRepository")
 */
class Orientation
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_orientation", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idOrientation;

    /**
     * @var string
     *
     * @ORM\Column(name="ori_libelle", type="string", length=30, unique=true)
     */
    private $oriLibelle;

    /**
     * @var string
     *
     * @ORM\Column(name="ori_etat", type="string", length=7)
     */
    private $oriEtat;


    /**
     * Get id
     *
     * @return int
     */
    public function getIdOrientation()
    {
        return $this->idOrientation;
    }

    /**
     * Set oriLibelle
     *
     * @param string $oriLibelle
     *
     * @return Orientation
     */
    public function setOriLibelle($oriLibelle)
    {
        $this->oriLibelle = $oriLibelle;

        return $this;
    }

    /**
     * Get oriLibelle
     *
     * @return string
     */
    public function getOriLibelle()
    {
        return $this->oriLibelle;
    }

    /**
     * Set oriEtat
     *
     * @param string $oriEtat
     *
     * @return Orientation
     */
    public function setOriEtat($oriEtat)
    {
        $this->oriEtat = $oriEtat;

        return $this;
    }

    /**
     * Get oriEtat
     *
     * @return string
     */
    public function getOriEtat()
    {
        return $this->oriEtat;
    }
}
