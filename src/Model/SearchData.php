<?php
namespace App\Model;

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

    /** 
     * @var boolean */

    public $notetete = false;






}