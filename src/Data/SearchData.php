<?php
namespace App\Model;

use Doctrine\Common\Collections\Collection;


class SearchData{

    // Permet de rentrer un mot clé (q comme query) //

    /** 
     * @var string 
    */
    public string $q='';

    /** 
     * @var Parfum[] 
    */
    public $parfums=[];

    /** 
     * @var Marque[] 
    */
    public $marques=[];

    /** 
     * @var null|integer 
    */
    public $max;

    /** 
     * @var null|integer */
    public $min;

    // /** 
    //  * @var boolean */

    // public $noteTete = false;

    private ?Collection $noteTete = null;

    public function getNoteTete(): ?Collection
    {
        return $this->noteTete;
    }

    public function setNoteTete(?Collection $noteTete): self
    {
        $this->noteTete = $noteTete;

        return $this;
    }






}