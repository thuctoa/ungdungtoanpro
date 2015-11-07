<?php
namespace app\components;
use app\components\Thuvienchung;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Matran
 *
 * @author thuc
 */
//neu co tien to kt_ co nghia la kiem tra
//tien to td_ co nghia la thay doi thuoc tinh cua chinh no
//Không được đặt tên cùng với lớp cha khi dùng con trỏ $this
class Matran extends Thuvienchung{
    public $hang;
    public $cot;
    public $matran;
    //khoi tao rong ban dau
    function __construct() {
        $this->hang='';
        $this->cot='';
        $this->matran=[];
        
        //nap chong nhieu bien vao
        //so bien bang i
        $a = func_get_args(); 
        $i = func_num_args(); 
        if (method_exists($this,$f='__construct'.$i)) { 
            call_user_func_array(array($this,$f),$a); 
        } 
    }
    //khoi tao ma tran rong voi hang va cot
    function __construct1( $matran){
        $this->hang= count($matran);
        $this->cot=  count($matran[0]);
        $this->matran=$matran;
    }
    //khoi tao ma tran rong voi hang va cot
    function __construct2( $hang, $cot){
        $this->hang=$hang;
        $this->cot=$cot;
        $this->matran=[];
        for($i=0;$i<$hang;$i++){
            for($j=0;$j<$cot;$j++){
                $this->matran[$i][$j]=0;
            }
        }
    }
    //khoi tao ma tran day du
    function __construct3($matran, $hang, $cot){
        $this->hang=$hang;
        $this->cot=$cot;
        $this->matran=$matran;
    }
    //Thay doi thanh khoi tao ma tran don vi
    public function td_donvi($capmatran){
        $this->hang=$this->cot=$capmatran;
        $this->matran= parent::matrandonvi($capmatran);
    } 
    //kiem tra ma tran 0
    public function kt_matran0(){
        return parent::matran0($this->matran, $this->hang, $this->cot);
    }
    //Thay doi thanh Ma tran chuyen vi
    public function td_chuyenvi() {
        $this->matran=parent::matranchuyenvi($this->matran, $this->hang, $this->cot);
        //hoan doi hang cho cot
        $this->hang=$this->hang+$this->cot;
        $this->cot=$this->hang-$this->cot;
        $this->hang=$this->hang-$this->cot;
    }
    //tra ve Ma tran chuyen vi
    public function chuyenvi() {
        return parent::matranchuyenvi($this->matran, $this->hang, $this->cot);
    }
    //Ma tran con
    public function con($hangi, $cotj){
        return parent::matrancon($this->matran, $this->hang, $this->cot, $hangi, $cotj);
    }
    //Rank 
    public function rankG(){
        return parent::hangmatran( $this->matran, $this->hang, $this->cot);
    }
    public function rank(){
        if($this->kt_matran0()){
            $this->caphangdequy=0;
            $this->hangdequy=[];
            $this->tonglap=0;
            return [];
        }
        return parent::hangdequy($this->matran, $this->hang, $this->cot);
    }
    
    
    public function subrank($capn){
        parent::matranvuongcon($this->matran, $this->hang, $this->cot, $capn);
    }

    //Tich ma tran voi mot so
    public function tichso($so){
        return parent::tichsomatran($so, $this->matran, $this->hang, $this->cot);
    }
    //Det de lam viec nay phai kiem tra nghiem ngat xem hang ==cot? moi duoc tinh
    public function det(){
        return parent::dinhthucthuong($this->matran, $this->hang);
    }
    //kiem tra ma tran vuong hay khong
    public function kt_vuong(){
        if($this->hang==$this->cot){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    //Ma tran lien hop
    public function lienhop(){
        return parent::matranlienhop($this->matran, $this->hang);
    }
    //Tra ve toan bo ma tran con
    public function toanbocon(){
        return parent::toanbomatrancon( $this->matran, $this->hang, $this->cot);
    }
    //Tra ve ma tran nghich dao
    public function nghichdao(){
        return parent::matrannghichdao($this->matran, $this->hang);
    }
    //Tra ve luy thua ma tran
    public function luythua($somu){
        return parent::luythuamatran($this->matran, $this->hang, $somu);
    }
    public function hienthi($kieu){
        parent::hienthimatran( $this->matran, $kieu);
    }
    public function hienthinguyenmau($kieu){
        parent::hienthimatrannguenmau( $this->matran, $kieu);
    }
}
