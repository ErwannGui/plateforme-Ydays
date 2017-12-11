<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Appartenir
 *
 * @ORM\Table(name="appartenir")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AppartenirRepository")
 */
class Appartenir
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="id_user", type="integer")
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Utilisateur", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $idUser;

    /**
     * @var int
     *
     * @ORM\Column(name="id_entreprise", type="integer")
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Entreprise", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $idEntreprise;


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
     * Set idUser
     *
     * @param integer $idUser
     *
     * @return Appartenir
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Get idUser
     *
     * @return int
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Set idEntreprise
     *
     * @param integer $idEntreprise
     *
     * @return Appartenir
     */
    public function setIdEntreprise($idEntreprise)
    {
        $this->idEntreprise = $idEntreprise;

        return $this;
    }

    /**
     * Get idEntreprise
     *
     * @return int
     */
    public function getIdEntreprise()
    {
        return $this->idEntreprise;
    }
}

