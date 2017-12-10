<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entreprise
 *
 * @ORM\Table(name="entreprise")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EntrepriseRepository")
 */
class Entreprise
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
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=255)
     */
    private $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="type_voie", type="string", length=255)
     */
    private $typeVoie;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_voie", type="string", length=255)
     */
    private $nomVoie;

    /**
     * @var int
     *
     * @ORM\Column(name="num_voie", type="integer")
     */
    private $numVoie;

    /**
     * @var int
     *
     * @ORM\Column(name="code_postal", type="integer")
     */
    private $codePostal;

    /**
     * @var int
     *
     * @ORM\Column(name="siret", type="integer")
     */
    private $siret;


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
     * Set nom
     *
     * @param string $nom
     *
     * @return Entreprise
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set ville
     *
     * @param string $ville
     *
     * @return Entreprise
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set typeVoie
     *
     * @param string $typeVoie
     *
     * @return Entreprise
     */
    public function setTypeVoie($typeVoie)
    {
        $this->typeVoie = $typeVoie;

        return $this;
    }

    /**
     * Get typeVoie
     *
     * @return string
     */
    public function getTypeVoie()
    {
        return $this->typeVoie;
    }

    /**
     * Set nomVoie
     *
     * @param string $nomVoie
     *
     * @return Entreprise
     */
    public function setNomVoie($nomVoie)
    {
        $this->nomVoie = $nomVoie;

        return $this;
    }

    /**
     * Get nomVoie
     *
     * @return string
     */
    public function getNomVoie()
    {
        return $this->nomVoie;
    }

    /**
     * Set numVoie
     *
     * @param integer $numVoie
     *
     * @return Entreprise
     */
    public function setNumVoie($numVoie)
    {
        $this->numVoie = $numVoie;

        return $this;
    }

    /**
     * Get numVoie
     *
     * @return int
     */
    public function getNumVoie()
    {
        return $this->numVoie;
    }

    /**
     * Set codePostal
     *
     * @param integer $codePostal
     *
     * @return Entreprise
     */
    public function setCodePostal($codePostal)
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    /**
     * Get codePostal
     *
     * @return int
     */
    public function getCodePostal()
    {
        return $this->codePostal;
    }

    /**
     * Set siret
     *
     * @param integer $siret
     *
     * @return Entreprise
     */
    public function setSiret($siret)
    {
        $this->siret = $siret;

        return $this;
    }

    /**
     * Get siret
     *
     * @return int
     */
    public function getSiret()
    {
        return $this->siret;
    }
}

