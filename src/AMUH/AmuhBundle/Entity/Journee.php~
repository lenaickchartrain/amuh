<?php

namespace AMUH\AmuhBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Journee
 *
 * @ORM\Table(name="journee")
 * @ORM\Entity(repositoryClass="AMUH\AmuhBundle\Repository\JourneeRepository")
 */
class Journee
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_journee", type="guid")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="UUID")
     */
    private $idJournee;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="jou_date", type="date")
     */
    private $jouDate;

    /**
     * One journee has many secretaire
     * 
     * @ORM\ManyToMany(targetEntity="Utilisateur")
     * @ORM\JoinTable("journee_secretaires",
     *      joinColumns={@ORM\JoinColumn(name="id_journee", referencedColumnName="id_journee")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="id_utilisateur", referencedColumnName="id_utilisateur")}
     *  )
     */
       
    private $secretaires;
    
    /**
     * Une journée ne peut avoir qu'un seul type de journée
     * 
     * @ORM\ManyToOne(targetEntity="TypeJournee", inversedBy="journees")
     * @ORM\JoinColumn(name="id_type_journee", referencedColumnName="id_type_journee")
     */
    private $typeJournee;

    /**
     * One journee has many medecin
     * 
     * @ORM\ManyToMany(targetEntity="Medecin", inversedBy="journees")
     * @ORM\JoinTable("journee_medecins",
     *  joinColumns={@ORM\JoinColumn(name="id_journee", referencedColumnName="id_journee")},
     *  inverseJoinColumns={@ORM\JoinColumn(name="id_medecin", referencedColumnName="id_medecin")}
     * )
     * 
     */
    private $medecins;

    /**
     * One journee has many consultation
     * 
     * @ORM\ManyToMany(targetEntity="Consultation")
     * @ORM\JoinTable("journee_consultations",
     *      joinColumns={@ORM\JoinColumn(name="id_journee", referencedColumnName="id_journee")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="id_consultation", referencedColumnName="id_consultation", unique=true)}
     *  )
     */
    private $consultations;


    /**
     * Get idJournee
     *
     * @return int
     */
    public function getIdJournee()
    {
        return $this->idJournee;
    }

    /**
     * Set jouDate
     *
     * @param \DateTime $jouDate
     *
     * @return Journee
     */
    public function setJouDate($jouDate)
    {
        $this->jouDate = $jouDate;

        return $this;
    }

    /**
     * Get jouDate
     *
     * @return \DateTime
     */
    public function getJouDate()
    {
        return $this->jouDate;
    }

    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->secretaires = new \Doctrine\Common\Collections\ArrayCollection();
        $this->medecins = new \Doctrine\Common\Collections\ArrayCollection();
        $this->consultations = new \Doctrine\Common\Collections\ArrayCollection();
        $now = date('d/m/Y');
        $this->jouDate = \DateTime::createFromFormat('d/m/Y', $now);
    }

    /**
     * Add secretaire
     *
     * @param \AMUH\AmuhBundle\Entity\Utilisateur $secretaire
     *
     * @return Journee
     */
    public function addSecretaire(\AMUH\AmuhBundle\Entity\Utilisateur $secretaire)
    {
        $this->secretaires[] = $secretaire;

        return $this;
    }

    /**
     * Remove secretaire
     *
     * @param \AMUH\AmuhBundle\Entity\Utilisateur $secretaire
     */
    public function removeSecretaire(\AMUH\AmuhBundle\Entity\Utilisateur $secretaire)
    {
        $this->secretaires->removeElement($secretaire);
    }

    /**
     * Get secretaires
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSecretaires()
    {
        return $this->secretaires;
    }

    /**
     * Add medecin
     *
     * @param \AMUH\AmuhBundle\Entity\Medecin $medecin
     *
     * @return Journee
     */
    public function addMedecin(\AMUH\AmuhBundle\Entity\Medecin $medecin)
    {
        $this->medecins[] = $medecin;

        return $this;
    }

    /**
     * Remove medecin
     *
     * @param \AMUH\AmuhBundle\Entity\Medecin $medecin
     */
    public function removeMedecin(\AMUH\AmuhBundle\Entity\Medecin $medecin)
    {
        $this->medecins->removeElement($medecin);
    }

    /**
     * Get medecins
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMedecins()
    {
        return $this->medecins;
    }

    /**
     * Add consultation
     *
     * @param \AMUH\AmuhBundle\Entity\Consultation $consultation
     *
     * @return Journee
     */
    public function addConsultation(\AMUH\AmuhBundle\Entity\Consultation $consultation)
    {
        $this->consultations[] = $consultation;

        return $this;
    }

    /**
     * Remove consultation
     *
     * @param \AMUH\AmuhBundle\Entity\Consultation $consultation
     */
    public function removeConsultation(\AMUH\AmuhBundle\Entity\Consultation $consultation)
    {
        $this->consultations->removeElement($consultation);
    }

    /**
     * Get consultations
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getConsultations()
    {
        return $this->consultations;
    }

    /**
     * Set typeJournee
     *
     * @param \AMUH\AmuhBundle\Entity\TypeJournee $typeJournee
     *
     * @return Journee
     */
    public function setTypeJournee(\AMUH\AmuhBundle\Entity\TypeJournee $typeJournee = null)
    {
        $this->typeJournee = $typeJournee;

        return $this;
    }

    /**
     * Get typeJournee
     *
     * @return \AMUH\AmuhBundle\Entity\TypeJournee
     */
    public function getTypeJournee()
    {
        return $this->typeJournee;
    }
}
