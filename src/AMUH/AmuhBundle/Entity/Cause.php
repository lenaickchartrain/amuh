<?php

namespace AMUH\AmuhBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cause
 *
 * @ORM\Table(name="cause")
 * @ORM\Entity(repositoryClass="AMUH\AmuhBundle\Repository\CauseRepository")
 */
class Cause
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_cause", type="guid")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="UUID")
     */
    private $idCause;

    /**
     * @var string
     *
     * @ORM\Column(name="cau_libelle", type="string", length=30, unique=true)
     */
    private $cauLibelle;

    /**
     * @var string
     *
     * @ORM\Column(name="cau_etat", type="string", length=7)
     */
    private $cauEtat;


    /**
     * Get id
     *
     * @return int
     */
    public function getIdCause()
    {
        return $this->idCause;
    }

    /**
     * Set cauLibelle
     *
     * @param string $cauLibelle
     *
     * @return Cause
     */
    public function setCauLibelle($cauLibelle)
    {
        $this->cauLibelle = $cauLibelle;

        return $this;
    }

    /**
     * Get cauLibelle
     *
     * @return string
     */
    public function getCauLibelle()
    {
        return $this->cauLibelle;
    }

    /**
     * Set cauEtat
     *
     * @param string $cauEtat
     *
     * @return Cause
     */
    public function setCauEtat($cauEtat)
    {
        $this->cauEtat = $cauEtat;

        return $this;
    }

    /**
     * Get cauEtat
     *
     * @return string
     */
    public function getCauEtat()
    {
        return $this->cauEtat;
    }
}
