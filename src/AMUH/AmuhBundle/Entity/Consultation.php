<?php

namespace AMUH\AmuhBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Consultation
 *
 * @ORM\Table(name="consultation")
 * @ORM\Entity(repositoryClass="AMUH\AmuhBundle\Repository\ConsultationRepository")
 */
class Consultation
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_consultation", type="guid")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="UUID")
     */
    private $idConsultation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="cst_date_creation", type="datetime")
     */
    private $cstDateCreation;

    /**
     * @var string
     *
     * @ORM\Column(name="cst_etat", type="string", length=7)
     */
    private $cstEtat;

	/**
     * @var text
     *
     * @ORM\Column(name="cst_commentaire", type="text", nullable=true)
     */
    private $cstCommentaire;
	
    /**
     * Many Consultations have one Utilisateur
     * @ORM\ManyToOne(targetEntity="Utilisateur")
     * @ORM\JoinColumn(name="id_utilisateur", referencedColumnName="id_utilisateur") 
     */
    private $utilisateur;
    
    /**
     * Many Consultations have one Medecin
     * @ORM\ManyToOne(targetEntity="Medecin")
     * @ORM\JoinColumn(name="id_medecin", referencedColumnName="id_medecin") 
     */
    private $medecin;

    /**
     * One consultation have many ConsultationData
     * @ORM\OneToMany(targetEntity="ConsultationData", mappedBy="consultation", cascade={"all"})
     */
    private $consultationDatas;
	
    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set cstDateCreation
     *
     * @param \DateTime $cstDateCreation
     *
     * @return Consultation
     */
    public function setCstDateCreation($cstDateCreation)
    {
        $this->cstDateCreation = $cstDateCreation;

        return $this;
    }

    /**
     * Get cstDateCreation
     *
     * @return \DateTime
     */
    public function getCstDateCreation()
    {
        return $this->cstDateCreation;
    }

    /**
     * Set cstEtat
     *
     * @param string $cstEtat
     *
     * @return Consultation
     */
    public function setCstEtat($cstEtat)
    {
        $this->cstEtat = $cstEtat;

        return $this;
    }

    /**
     * Get cstEtat
     *
     * @return string
     */
    public function getCstEtat()
    {
        return $this->cstEtat;
    }

    /**
     * Set utilisateur
     *
     * @param \AMUH\AmuhBundle\Entity\Utilisateur $utilisateur
     *
     * @return Consultation
     */
    public function setUtilisateur(\AMUH\AmuhBundle\Entity\Utilisateur $utilisateur = null)
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    /**
     * Get utilisateur
     *
     * @return \AMUH\AmuhBundle\Entity\Utilisateur
     */
    public function getUtilisateur()
    {
        return $this->utilisateur;
    }

    /**
     * Set medecin
     *
     * @param \AMUH\AmuhBundle\Entity\Medecin $medecin
     *
     * @return Consultation
     */
    public function setMedecin(\AMUH\AmuhBundle\Entity\Medecin $medecin = null)
    {
        $this->medecin = $medecin;

        return $this;
    }

    /**
     * Get medecin
     *
     * @return \AMUH\AmuhBundle\Entity\Medecin
     */
    public function getMedecin()
    {
        return $this->medecin;
    }

    /**
     * Get idConsultation
     *
     * @return guid
     */
    public function getIdConsultation()
    {
        return $this->idConsultation;
    }
    /**
     * Constructor
     */
    public function __construct($medecin=1, $utilisateur=1)
    {
        $this->consultationDatas = new \Doctrine\Common\Collections\ArrayCollection();
        $this->cstDateCreation = new \DateTime("now");		
        $this->utilisateur = $utilisateur;
        $this->medecin = $medecin;
        $this->cstEtat = 'ACTIF';
    }

    /**
     * Add consultationData
     *
     * @param \AMUH\AmuhBundle\Entity\ConsultationData $consultationData
     *
     * @return Consultation
     */
    public function addConsultationData(\AMUH\AmuhBundle\Entity\ConsultationData $consultationData)
    {
        $this->consultationDatas[] = $consultationData;

        return $this;
    }

    /**
     * Remove consultationData
     *
     * @param \AMUH\AmuhBundle\Entity\ConsultationData $consultationData
     */
    public function removeConsultationData(\AMUH\AmuhBundle\Entity\ConsultationData $consultationData)
    {
        $this->consultationDatas->removeElement($consultationData);
    }

    /**
     * Get consultationDatas
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getConsultationDatas()
    {
        return $this->consultationDatas;
    }

    /**
     * Set cstCommentaire
     *
     * @param string $cstCommentaire
     *
     * @return Consultation
     */
    public function setCstCommentaire($cstCommentaire)
    {
        $this->cstCommentaire = $cstCommentaire;

        return $this;
    }

    /**
     * Get cstCommentaire
     *
     * @return string
     */
    public function getCstCommentaire()
    {
        return $this->cstCommentaire;
    }
}
