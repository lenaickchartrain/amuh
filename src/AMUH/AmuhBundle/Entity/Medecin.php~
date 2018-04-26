<?php

namespace AMUH\AmuhBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Medecin
 *
 * @ORM\Entity(repositoryClass="AMUH\AmuhBundle\Repository\MedecinRepository")
 */
class Medecin extends Personne{
    //put your code here
	/**
     * @var int
     *
     * @ORM\Column(name="id_medecin", type="guid")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="UUID")
     */
    private $idMedecin;
	
	/**
     * @var string
     *
     * @ORM\Column(name="med_rue", type="string", length=30)
     */
    private $medRue;
	
	/**
     * @var string
     *
     * @ORM\Column(name="med_complement_adresse", type="string", length=30, nullable=true)
     */
    private $medComplementAdresse;
	
	/**
     * @var string
     *
     * @ORM\Column(name="med_code_postal", type="string", length=5)
     */
    private $medCodePostal;
	
	/**
     * @var string
     *
     * @ORM\Column(name="med_ville", type="string", length=30)
     */
    private $medVille;
	
    /**
     * @var string
     *
     * @ORM\Column(name="med_etat", type="string", length=7)
     */
    private $medEtat;
    
    /**
     * @ORM\ManyToMany(targetEntity="Journee", mappedBy="medecins")
     */
    private $journees;

    /**
     * Set medEtat
     *
     * @param string $medEtat
     *
     * @return Medecin
     */
    public function setMedEtat($medEtat)
    {
        $this->medEtat = $medEtat;

        return $this;
    }

    /**
     * Get medEtat
     *
     * @return string
     */
    public function getMedEtat()
    {
        return $this->medEtat;
    }

    /**
     * Set medRue
     *
     * @param string $medRue
     *
     * @return Medecin
     */
    public function setMedRue($medRue)
    {
        $this->medRue = $medRue;

        return $this;
    }

    /**
     * Get medRue
     *
     * @return string
     */
    public function getMedRue()
    {
        return $this->medRue;
    }

    /**
     * Set medComplementAdresse
     *
     * @param string $medComplementAdresse
     *
     * @return Medecin
     */
    public function setMedComplementAdresse($medComplementAdresse)
    {
        $this->medComplementAdresse = $medComplementAdresse;

        return $this;
    }

    /**
     * Get medComplementAdresse
     *
     * @return string
     */
    public function getMedComplementAdresse()
    {
        return $this->medComplementAdresse;
    }

    /**
     * Set medCodePostal
     *
     * @param string $medCodePostal
     *
     * @return Medecin
     */
    public function setMedCodePostal($medCodePostal)
    {
        $this->medCodePostal = $medCodePostal;

        return $this;
    }

    /**
     * Get medCodePostal
     *
     * @return string
     */
    public function getMedCodePostal()
    {
        return $this->medCodePostal;
    }

    /**
     * Set medVille
     *
     * @param string $medVille
     *
     * @return Medecin
     */
    public function setMedVille($medVille)
    {
        $this->medVille = $medVille;

        return $this;
    }

    /**
     * Get medVille
     *
     * @return string
     */
    public function getMedVille()
    {
        return $this->medVille;
    }

    /**
     * Get idMedecin
     *
     * @return guid
     */
    public function getIdMedecin()
    {
        return $this->idMedecin;
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
     * @return Medecin
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
    
    public function getNomPrenom(){
        return $this->getPrsNom() . ' ' . $this->getPrsPrenom();
    }
}
