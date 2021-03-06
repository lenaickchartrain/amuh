<?php

namespace AMUH\AmuhBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Role
 *
 * @ORM\Table(name="role")
 * @ORM\Entity(repositoryClass="AMUH\AmuhBundle\Repository\RoleRepository")
 */
class Role
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_role", type="guid")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="UUID")
     */
    private $idRole;

    /**
     * @var string
     *
     * @ORM\Column(name="rol_libelle", type="string", length=20)
     */
    private $rolLibelle;

    /**
     * @var string
     *
     * @ORM\Column(name="rol_etat", type="string", length=7)
     */
    private $rolEtat;


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
     * Set rolLibelle
     *
     * @param string $rolLibelle
     *
     * @return Role
     */
    public function setRolLibelle($rolLibelle)
    {
        $this->rolLibelle = $rolLibelle;

        return $this;
    }

    /**
     * Get rolLibelle
     *
     * @return string
     */
    public function getRolLibelle()
    {
        return $this->rolLibelle;
    }

    /**
     * Set rolEtat
     *
     * @param string $rolEtat
     *
     * @return Role
     */
    public function setRolEtat($rolEtat)
    {
        $this->rolEtat = $rolEtat;

        return $this;
    }

    /**
     * Get rolEtat
     *
     * @return string
     */
    public function getRolEtat()
    {
        return $this->rolEtat;
    }

    /**
     * Get idRole
     *
     * @return guid
     */
    public function getIdRole()
    {
        return $this->idRole;
    }
}
