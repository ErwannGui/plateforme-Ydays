<?php
/**
 @author Groupe 5 <https://github.com/ErwannGui/plateforme-Ydays>
 @copyright 2017 Groupe 5
 @version 1.0
*/
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * entreprise
 *
 * @ORM\Table(name="entreprise")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\entrepriseRepository")
 */
class Entreprise
{
    //génération de la classe Entreprise et de ses guetters/setters ce qui permet de créer des objets entreprise et de les utiliser dans notre application
    
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
     * @var int
     *
     * @ORM\Column(name="numero_voie", type="integer")
     */
    private $numeroVoie;

    /**
     * @var string
     *
     * @ORM\Column(name="voie", type="string", length=255)
     */
    private $voie;

    /**
     * @var int
     *
     * @ORM\Column(name="cp", type="integer")
     */
    private $cp;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=255)
     */
    private $ville;

    /**
     * @var bigint
     *
     * @ORM\Column(name="siret", type="integer")
     */
    private $siret;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="domaine", type="string", length=255)
     */
    private $domaine;

    /**
     * @var string
     *
     * @ORM\Column(name="secteur", type="string", length=255)
     */
    private $secteur;


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
     * @return entreprise
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
     * Set numeroVoie
     *
     * @param integer $numeroVoie
     *
     * @return entreprise
     */
    public function setNumeroVoie($numeroVoie)
    {
        $this->numeroVoie = $numeroVoie;

        return $this;
    }

    /**
     * Get numeroVoie
     *
     * @return int
     */
    public function getNumeroVoie()
    {
        return $this->numeroVoie;
    }

    /**
     * Set voie
     *
     * @param integer $voie
     *
     * @return entreprise
     */
    public function setVoie($voie)
    {
        $this->voie = $voie;

        return $this;
    }

    /**
     * Get voie
     *
     * @return int
     */
    public function getVoie()
    {
        return $this->voie;
    }

    /**
     * Set cp
     *
     * @param integer $cp
     *
     * @return entreprise
     */
    public function setCp($cp)
    {
        $this->cp = $cp;

        return $this;
    }

    /**
     * Get cp
     *
     * @return int
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * Set ville
     *
     * @param string $ville
     *
     * @return entreprise
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
     * Set siret
     *
     * @param integer $siret
     *
     * @return entreprise
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

    /**
     * Set type
     *
     * @param string $type
     *
     * @return entreprise
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set domaine
     *
     * @param string $domaine
     *
     * @return entreprise
     */
    public function setDomaine($domaine)
    {
        $this->domaine = $domaine;

        return $this;
    }

    /**
     * Get domaine
     *
     * @return string
     */
    public function getDomaine()
    {
        return $this->domaine;
    }

    /**
     * Set secteur
     *
     * @param string $secteur
     *
     * @return entreprise
     */
    public function setSecteur($secteur)
    {
        $this->secteur = $secteur;

        return $this;
    }

    /**
     * Get secteur
     *
     * @return string
     */
    public function getSecteur()
    {
        return $this->secteur;
    }
}
