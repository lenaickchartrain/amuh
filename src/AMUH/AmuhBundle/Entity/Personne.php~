<?php

namespace AMUH\AmuhBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Personne
 * 
 * @ORM\MappedSuperclass
 */
abstract class Personne
{
    /**
     * @var string
     *
     * @ORM\Column(name="prs_nom", type="string", length=20)
     */
    protected $prsNom;

    /**
     * @var string
     *
     * @ORM\Column(name="prs_nom_jeune_fille", type="string", length=20, nullable=true)
     */
    protected $prsNomJeuneFille;

    /**
     * @var string
     *
     * @ORM\Column(name="prs_prenom", type="string", length=20)
     */
    protected $prsPrenom;

    /**
     * @var string
     *
     * @ORM\Column(name="prs_telephone", type="string", length=14, nullable=true)
     */
    protected $prsTelephone;
	
	/**
	 * @OneToOne(targetEntity=
	 */

    /**
     * Set prsNom
     *
     * @param string $prsNom
     *
     * @return Personne
     */
    public function setPrsNom($prsNom)
    {
        $this->prsNom = $prsNom;

        return $this;
    }

    /**
     * Get prsNom
     *
     * @return string
     */
    public function getPrsNom()
    {
        return $this->prsNom;
    }

    /**
     * Set prsNomJeuneFille
     *
     * @param string $prsNomJeuneFille
     *
     * @return Personne
     */
    public function setPrsNomJeuneFille($prsNomJeuneFille)
    {
        $this->prsNomJeuneFille = $prsNomJeuneFille;

        return $this;
    }

    /**
     * Get prsNomJeuneFille
     *
     * @return string
     */
    public function getPrsNomJeuneFille()
    {
        return $this->prsNomJeuneFille;
    }

    /**
     * Set prsPrenom
     *
     * @param string $prsPrenom
     *
     * @return Personne
     */
    public function setPrsPrenom($prsPrenom)
    {
        $this->prsPrenom = $prsPrenom;

        return $this;
    }

    /**
     * Get prsPrenom
     *
     * @return string
     */
    public function getPrsPrenom()
    {
        return $this->prsPrenom;
    }

    /**
     * Set prsTelephone
     *
     * @param string $prsTelephone
     *
     * @return Personne
     */
    public function setPrsTelephone($prsTelephone)
    {
        $this->prsTelephone = $prsTelephone;

        return $this;
    }

    /**
     * Get prsTelephone
     *
     * @return string
     */
    public function getPrsTelephone()
    {
        return $this->prsTelephone;
    }
    
    public function getPrsNomPrenom(){
        return $this->prsNom . ' ' . $this->prsPrenom;
    }
}
