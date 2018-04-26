<?php

namespace AMUH\AmuhBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ModaliteReglement
 *
 * @ORM\Table(name="modalite_reglement")
 * @ORM\Entity(repositoryClass="AMUH\AmuhBundle\Repository\ModaliteReglementRepository")
 */
class ModaliteReglement
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_modalite_reglement", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idModaliteReglement;

    /**
     * @var string
     *
     * @ORM\Column(name="more_libelle", type="string", length=30, unique=true)
     */
    private $moreLibelle;

    /**
     * @var string
     *
     * @ORM\Column(name="more_etat", type="string", length=7)
     */
    private $moreEtat;


    /**
     * Get id
     *
     * @return int
     */
    public function getIdModaliteReglement()
    {
        return $this->idModaliteReglement;
    }

    /**
     * Set moreLibelle
     *
     * @param string $moreLibelle
     *
     * @return ModaliteReglement
     */
    public function setMoreLibelle($moreLibelle)
    {
        $this->moreLibelle = $moreLibelle;

        return $this;
    }

    /**
     * Get moreLibelle
     *
     * @return string
     */
    public function getMoreLibelle()
    {
        return $this->moreLibelle;
    }

    /**
     * Set moreEtat
     *
     * @param string $moreEtat
     *
     * @return ModaliteReglement
     */
    public function setMoreEtat($moreEtat)
    {
        $this->moreEtat = $moreEtat;

        return $this;
    }

    /**
     * Get moreEtat
     *
     * @return string
     */
    public function getMoreEtat()
    {
        return $this->moreEtat;
    }
}
