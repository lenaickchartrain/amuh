<?php

namespace AMUH\AmuhBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TypeJournee
 *
 * @ORM\Table(name="type_journee")
 * @ORM\Entity(repositoryClass="AMUH\AmuhBundle\Repository\TypeJourneeRepository")
 */
class TypeJournee
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_type_journee", type="guid")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="UUID")
     */
    private $idTypeJournee;

    /**
     * @var string
     *
     * @ORM\Column(name="tpj_libelle", type="string", length=30)
     */
    private $tpjLibelle;

    /**
     * @var int
     *
     * @ORM\Column(name="tpj_nb_secretaire", type="integer")
     */
    private $tpjNbSecretaire;

    /**
     * @var int
     *
     * @ORM\Column(name="tpj_nb_medecin", type="integer")
     */
    private $tpjNbMedecin;

    /**
     * @var string
     *
     * @ORM\Column(name="tpj_etat", type="string", length=7)
     */
    private $tpjEtat;
    
    /**
     * Plusieurs type de journée peuvent avoir une journée
     * 
     * @ORM\OneToMany(targetEntity="Journee", mappedBy="typeJournee")
     */
    private $journees;

    /**
     * Get id
     *
     * @return int
     */
    public function getIdTypeJournee()
    {
        return $this->idTypeJournee;
    }

    /**
     * Set tpjLibelle
     *
     * @param string $tpjLibelle
     *
     * @return TypeJournee
     */
    public function setTpjLibelle($tpjLibelle)
    {
        $this->tpjLibelle = $tpjLibelle;

        return $this;
    }

    /**
     * Get tpjLibelle
     *
     * @return string
     */
    public function getTpjLibelle()
    {
        return $this->tpjLibelle;
    }

    /**
     * Set tpjNbSecretaire
     *
     * @param integer $tpjNbSecretaire
     *
     * @return TypeJournee
     */
    public function setTpjNbSecretaire($tpjNbSecretaire)
    {
        $this->tpjNbSecretaire = $tpjNbSecretaire;

        return $this;
    }

    /**
     * Get tpjNbSecretaire
     *
     * @return int
     */
    public function getTpjNbSecretaire()
    {
        return $this->tpjNbSecretaire;
    }

    /**
     * Set tpjNbMedecin
     *
     * @param integer $tpjNbMedecin
     *
     * @return TypeJournee
     */
    public function setTpjNbMedecin($tpjNbMedecin)
    {
        $this->tpjNbMedecin = $tpjNbMedecin;

        return $this;
    }

    /**
     * Get tpjNbMedecin
     *
     * @return int
     */
    public function getTpjNbMedecin()
    {
        return $this->tpjNbMedecin;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->journees = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add journee
     *
     * @param \AMUH\AmuhBundle\Entity\Journee $journee
     *
     * @return TypeJournee
     */
    public function addJournee(\AMUH\AmuhBundle\Entity\Journee $journee)
    {
        $this->journees[] = $journee;

        return $this;
    }

    /**
     * Remove journee
     *
     * @param \AMUH\AmuhBundle\Entity\Journee $journee
     */
    public function removeJournee(\AMUH\AmuhBundle\Entity\Journee $journee)
    {
        $this->journees->removeElement($journee);
    }

    /**
     * Get journees
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getJournees()
    {
        return $this->journees;
    }

    /**
     * Set tpjEtat
     *
     * @param string $tpjEtat
     *
     * @return TypeJournee
     */
    public function setTpjEtat($tpjEtat)
    {
        $this->tpjEtat = $tpjEtat;

        return $this;
    }

    /**
     * Get tpjEtat
     *
     * @return string
     */
    public function getTpjEtat()
    {
        return $this->tpjEtat;
    }
}
