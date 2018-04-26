<?php

namespace AMUH\AmuhBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CategorieAttribut
 *
 * @ORM\Table(name="categorie_attribut")
 * @ORM\Entity(repositoryClass="AMUH\AmuhBundle\Repository\CategorieAttributRepository")
 */
class CategorieAttribut
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_categorie_attribut", type="guid")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="UUID")
     */
    private $idCategorieAttribut;

    /**
     * @var string
     *
     * @ORM\Column(name="cat_libelle", type="string", length=20)
     */
    private $catLibelle;

    /**
     * @var string
     *
     * @ORM\Column(name="cat_etat", type="string", length=7)
     */
    private $catEtat;


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
     * Set catLibelle
     *
     * @param string $catLibelle
     *
     * @return CategorieAttribut
     */
    public function setCatLibelle($catLibelle)
    {
        $this->catLibelle = $catLibelle;

        return $this;
    }

    /**
     * Get catLibelle
     *
     * @return string
     */
    public function getCatLibelle()
    {
        return $this->catLibelle;
    }

    /**
     * Set catEtat
     *
     * @param string $catEtat
     *
     * @return CategorieAttribut
     */
    public function setCatEtat($catEtat)
    {
        $this->catEtat = $catEtat;

        return $this;
    }

    /**
     * Get catEtat
     *
     * @return string
     */
    public function getCatEtat()
    {
        return $this->catEtat;
    }

    /**
     * Get idCategorieAttribut
     *
     * @return guid
     */
    public function getIdCategorieAttribut()
    {
        return $this->idCategorieAttribut;
    }
}
