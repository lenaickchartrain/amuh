<?php

namespace AMUH\AmuhBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Attribut
 *
 * @ORM\Table(name="attribut")
 * @ORM\Entity(repositoryClass="AMUH\AmuhBundle\Repository\AttributRepository")
 */
class Attribut
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_attribut", type="guid")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="UUID")
     */
    private $idAttribut;

    /**
     * @var string
     *
     * @ORM\Column(name="atb_libelle", type="string", length=30)
     */
    private $atbLibelle;

    /**
     * @var string
     *
     * @ORM\Column(name="atb_etat", type="string", length=7)
     */
    private $atbEtat;
    
    /**
     * Many Attribut have one CategorieAttribut
     * @ORM\ManyToOne(targetEntity="AMUH\AmuhBundle\Entity\CategorieAttribut")
     * @ORM\JoinColumn(name="id_categorie_attribut", referencedColumnName="id_categorie_attribut") 
     */
    private $categorieAttribut;


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
     * Set atbLibelle
     *
     * @param string $atbLibelle
     *
     * @return Attribut
     */
    public function setAtbLibelle($atbLibelle)
    {
        $this->atbLibelle = $atbLibelle;

        return $this;
    }

    /**
     * Get atbLibelle
     *
     * @return string
     */
    public function getAtbLibelle()
    {
        return $this->atbLibelle;
    }

    /**
     * Set atbEtat
     *
     * @param string $atbEtat
     *
     * @return Attribut
     */
    public function setAtbEtat($atbEtat)
    {
        $this->atbEtat = $atbEtat;

        return $this;
    }

    /**
     * Get atbEtat
     *
     * @return string
     */
    public function getAtbEtat()
    {
        return $this->atbEtat;
    }

    /**
     * Set categorieAttribut
     *
     * @param \AMUH\AmuhBundle\Entity\CategorieAttribut $categorieAttribut
     *
     * @return Attribut
     */
    public function setCategorieAttribut(\AMUH\AmuhBundle\Entity\CategorieAttribut $categorieAttribut = null)
    {
        $this->categorieAttribut = $categorieAttribut;

        return $this;
    }

    /**
     * Get categorieAttribut
     *
     * @return \AMUH\AmuhBundle\Entity\CategorieAttribut
     */
    public function getCategorieAttribut()
    {
        return $this->categorieAttribut;
    }

    /**
     * Get idAttribut
     *
     * @return guid
     */
    public function getIdAttribut()
    {
        return $this->idAttribut;
    }
}
