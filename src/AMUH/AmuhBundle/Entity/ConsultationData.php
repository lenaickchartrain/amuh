<?php

namespace AMUH\AmuhBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ConsultationData
 *
 * @ORM\Table(name="consultation_data")
 * @ORM\Entity(repositoryClass="AMUH\AmuhBundle\Repository\ConsultationDataRepository")
 */
class ConsultationData
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_consultation_data", type="guid")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="UUID")
     */
    private $idConsultationData;

    /**
     * @var string
     *
     * @ORM\Column(name="csd_valeur", type="object")
     */
    private $csdValeur;

    /**
     * @var string
     *
     * @ORM\Column(name="csd_etat", type="string", length=7)
     */
    private $csdEtat;

    /**
     * @var string
     *
     * @ORM\Column(name="csd_link", type="guid")
     * @ORM\GeneratedValue(strategy="UUID")
     */
    private $csdLink;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="csd_date_creation", type="datetime")
     */
    private $csdDateCreation;


    /**
     * Many Consultations have one Attribut
     * @ORM\ManyToOne(targetEntity="Attribut")
     * @ORM\JoinColumn(name="id_attribut", referencedColumnName="id_attribut") 
     */
    private $attribut;
    
    /**
     * Many Consultations have one Utilisateur
     * @ORM\ManyToOne(targetEntity="Utilisateur")
     * @ORM\JoinColumn(name="id_utilisateur", referencedColumnName="id_utilisateur") 
     */
    private $utilisateur;
    
    /**
     * Many Consultations have one Consultation
     * @ORM\ManyToOne(targetEntity="Consultation", inversedBy="consultationDatas", cascade={"persist"})
     * @ORM\JoinColumn(name="id_consultation", referencedColumnName="id_consultation") 
     */
    private $consultation;
    
    /**
     * Get id
     *
     * @return guid
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set csdValeur
     *
     * @param string $csdValeur
     *
     * @return ConsultationData
     */
    public function setCsdValeur($csdValeur)
    {
        $this->csdValeur = $csdValeur;

        return $this;
    }

    /**
     * Get csdValeur
     *
     * @return string
     */
    public function getCsdValeur()
    {
        return $this->csdValeur;
    }

    /**
     * Set csdEtat
     *
     * @param string $csdEtat
     *
     * @return ConsultationData
     */
    public function setCsdEtat($csdEtat)
    {
        $this->csdEtat = $csdEtat;

        return $this;
    }

    /**
     * Get csdEtat
     *
     * @return string
     */
    public function getCsdEtat()
    {
        return $this->csdEtat;
    }

    /**
     * Set csdLink
     *
     * @param guid $csdLink
     *
     * @return ConsultationData
     */
    public function setCsdLink($csdLink)
    {
        $this->csdLink = $csdLink;

        return $this;
    }

    /**
     * Get csdLink
     *
     * @return string
     */
    public function getCsdLink()
    {
        return $this->csdLink;
    }

    /**
     * Set csdDateCreation
     *
     * @param \DateTime $csdDateCreation
     *
     * @return ConsultationData
     */
    public function setCsdDateCreation($csdDateCreation)
    {
        $this->csdDateCreation = $csdDateCreation;

        return $this;
    }

    /**
     * Get csdDateCreation
     *
     * @return \DateTime
     */
    public function getCsdDateCreation()
    {
        return $this->csdDateCreation;
    }

    /**
     * Set attribut
     *
     * @param \AMUH\AmuhBundle\Entity\Attribut $attribut
     *
     * @return ConsultationData
     */
    public function setAttribut(\AMUH\AmuhBundle\Entity\Attribut $attribut = null)
    {
        $this->attribut = $attribut;

        return $this;
    }

    /**
     * Get attribut
     *
     * @return \AMUH\AmuhBundle\Entity\Attribut
     */
    public function getAttribut()
    {
        return $this->attribut;
    }

    /**
     * Set utilisateur
     *
     * @param \AMUH\AmuhBundle\Entity\Utilisateur $utilisateur
     *
     * @return ConsultationData
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
     * Set consultation
     *
     * @param \AMUH\AmuhBundle\Entity\Consultation $consultation
     *
     * @return ConsultationData
     */
    public function setConsultation(\AMUH\AmuhBundle\Entity\Consultation $consultation = null)
    {
        $this->consultation = $consultation;

        return $this;
    }

    /**
     * Get consultation
     *
     * @return \AMUH\AmuhBundle\Entity\Consultation
     */
    public function getConsultation()
    {
        return $this->consultation;
    }

    /**
     * Get idConsultationData
     *
     * @return guid
     */
    public function getIdConsultationData()
    {
        return $this->idConsultationData;
    }
	
    /**
     * Constructor
     */
    public function __construct($utilisateur=null){
            $this->csdDateCreation = new \DateTime("now");
            $this->utilisateur = $utilisateur;
            $this->csdEtat = 'ACTIF';
    }
}
