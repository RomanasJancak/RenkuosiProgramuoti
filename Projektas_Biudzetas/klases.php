<?php
class Produktas{
    private $id = 0;
    private $barkodas =0;
    private $name = 0;
    private $depozitas = 0;
    private $kategorija_I = "";
    private $kategorija_II = "";
    private $kategorija_III = "";
    private static $counter=0;
    public function __construct($barkodas,$name,$depozitas,$kategorija_I,$kategorija_II,$kategorija_III){
        Produktas::$counter++;
        $this->id = $counter;
        $this->barkodas = $barkodas;
        $this->name = $name;
        $this->depozitas =$depozitas;
        $this->kategorija_I = $kategorija_I;
        $this->kategorija_II = $kategorija_II;
        $this->kategorija_III = $kategorija_III;
    }
    //----SETTERS & GETTERS BEGIN
    public function set_barkodas($barkodas){
        //padaryti ateičiai ar teisingas barkodas-
        $this->barkodas = $barkodas;
        return true;}
    public function get_barkodas(){
        return $this->barkodas;}
    public function set_name($name){
        $this->name = $name;}
    public function get_name(){
        return $this->name;}
    public function set_kategorija_I($kategorija_I){
        $this->kategorija_I = $kategorija_I;}
    public function get_kategorija_I(){
        return $this->kategorija_I;}
    public function set_kategorija_II($kategorija_II){
        $this->kategorija_II = $kategorija_II;}
    public function get_kategorija_II(){
        return $this->kategorija_II;}
    public function set_kategorija_III($kategorija_III){
        $this->kategorija_III = $kategorija_III;}
    public function get_kategorija_III(){
        return $this->kategorija_III;}    
    //----SETTERS & GETTERS END
}
class Pirkinys{
    private $id =0;
    private $produktas = null;
    private $kaina_centais = 0;
    private $kiekis = 0;
    private $nuolaida = 0;
    private $depozitas = 0;
    private $suma_centais= 0;
    private $kategorija_proga = "";
    private static $counter=0;
    public function __construct($produktas,$kaina,$kiekis,$nuolaida,$kategorija_proga){
        Pirkinys::$counter++;
        $this->produktas = $produktas;
        $this->set_kaina($kaina);
        $this->set_kiekis($kiekis);
        $this->set_nuolaida($nuolaida);
        $this->set_kategorija_proga($kategorija_proga);
        $this->id = $counter;
    }
    //----SETTERS & GETTERS BEGIN
    /*public function set_barkodas($barkodas){
        //padaryti ateičiai ar teisingas barkodas-
        $this->barkodas = $barkodas;
        return true;}
    */
    public function get_barkodas(){
        return $this->produktas->get_barkodas();}
    public function set_name($name){
        $this->name = $name;}
    public function get_name(){
        return $this->name;}
    public function set_kaina($kaina){
        if(is_float($kaina)){
            $this->kaina_centais = intval($kaina*100);
        }else{
            $this->kaina_centais = $kaina*100;
        }
        $this->suma_centais = ($this->kiekis*$this->kaina_centais)-($this->kiekis*$this->nuolaia)+($this->kiekis*$this->depozitas);}
    public function get_kainaCentais(){
        return $this->kaina_centais;}
    public function get_kaina(){
        return $this->kaina_centais/100;}
    public function set_kiekis($kiekis){
        $this->kiekis=$kiekis;
        $this->suma_centais = ($this->kiekis*$this->kaina_centais)-($this->kiekis*$this->nuolaia)+($this->kiekis*$this->depozitas);}
    public function get_kiekis(){
        return $this->kiekis;}
    public function set_nuolaida($nuolaida){
        if(is_float($nuolaida)){
            $this->nuolaida = intval($nuolaida*100);
        }else{
            $this->nuolaida = $nuolaida*100;
        }
        $this->suma_centais = ($this->kiekis*$this->kaina_centais)-($this->kiekis*$this->nuolaia)+($this->kiekis*$this->depozitas);}
    public function get_nuolaida(){
        return $this->nuolaida/100;}
    public function set_depozitas($depozitas){
        if(is_float($depozitas)){
            $this->depozitas = intval($depozitas*100);
        }else{
            $this->depozitas = $depozitas*100;
        }
        $this->suma_centais = ($this->kiekis*$this->kaina_centais)-($this->kiekis*$this->nuolaia)+($this->kiekis*$this->depozitas);}
    public function get_depozitas(){
        return $this->depozitas;}
    public function get_suma(){
        return $this->suma_centais/100;
    }  
    public function set_kategorija_proga($kategorija_proga){

    }
    }
    //----SETTERS & GETTERS END

class apsipirkimas{
    private $id = 0;
    private $pirkejas = "";
    private $data = "";
    private $tinklas = "";
    private $adresas ="";
    private $pirkiniai = [];
    
    public function __construct(){

    }
}
?>