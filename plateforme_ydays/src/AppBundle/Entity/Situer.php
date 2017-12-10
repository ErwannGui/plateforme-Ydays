<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Situer
 *
 * @ORM\Table(name="situer")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SituerRepository")
 */
class Situer
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
     * @ORM\Column(name="id_projet", type="integer")
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Projet", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $idProjet;

    /**
     * @var int
     *
     * @ORM\Column(name="id_salles", type="integer")
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Salle", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $idSalles;


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
     * Set idProjet
     *
     * @param integer $idProjet
     *
     * @return Situer
     */
    public function setIdProjet($idProjet)
    {
        $this->idProjet = $idProjet;

        return $this;
    }

    /**
     * Get idProjet
     *
     * @return int
     */
    public function getIdProjet()
    {
        return $this->idProjet;
    }

    /**
     * Set idSalles
     *
     * @param integer $idSalles
     *
     * @return Situer
     */
    public function setIdSalles($idSalles)
    {
        $this->idSalles = $idSalles;

        return $this;
    }

    /**
     * Get idSalles
     *
     * @return int
     */
    public function getIdSalles()
    {
        return $this->idSalles;
    }
}

