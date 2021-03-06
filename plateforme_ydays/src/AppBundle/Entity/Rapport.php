<?php
/**
 @author Groupe 5 <https://github.com/ErwannGui/plateforme-Ydays>
 @copyright 2017 Groupe 5
 @version 1.0
*/
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * rapport
 *
 * @ORM\Table(name="rapport")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\rapportRepository")
 */

class Rapport
{   
    //génération de la classe Rapport et de ses guetters/setters ce qui permet de créer des objets rapports et de les utiliser dans notre application
        
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
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu", type="text")
     */
    private $contenu;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     */

    private $date;
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
     * Set titre
     *
     * @param string $titre
     *
     * @return rapport
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set contenu
     *
     * @param string $contenu
     *
     * @return rapport
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get contenu
     *
     * @return string
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Set dtae
     *
     * @param \DateTime $dtae
     *
     * @return rapport
     */
    public function setDtae($dtae)
    {
        $this->dtae = $dtae;

        return $this;
    }

    /**
     * Get dtae
     *
     * @return \DateTime
     */
    public function getDtae()
    {
        return $this->dtae;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return rapport
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set chien
     *
     * @param string $chien
     *
     * @return Rapport
     */
    public function setChien($chien)
    {
        $this->chien = $chien;
    
        return $this;
    }

    /**
     * Get chien
     *
     * @return string
     */
    public function getChien()
    {
        return $this->chien;
    }

    /**
     * Set utilisateur
     *
     * @param \AppBundle\Entity\Utilisateur $utilisateur
     *
     * @return Rapport
     */
    public function setUtilisateur(\AppBundle\Entity\Utilisateur $utilisateur)
    {
        $this->utilisateur = $utilisateur;
    
        return $this;
    }

    /**
     * Get utilisateur
     *
     * @return \AppBundle\Entity\Utilisateur
     */
    public function getUtilisateur()
    {
        return $this->utilisateur;
    }
}
