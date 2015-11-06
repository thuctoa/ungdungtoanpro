<?php
namespace app\components;
/**
 * Description of Thuvienchung
 *
 * @author thuc
 */
use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;
class Thuvienchung extends Component{

    function __construct() {
       
    }
    //xem cụ thể các phần tử của mảng để phục vụ cho lập trình thuật toán
    public function log($a){
        echo '<pre>';
        print_r ($a);
        echo '    </pre>';
    }
    public function calculate_string( $mathString )    {
        $mathString = trim($mathString);     // trim white spaces
        $mathString = ereg_replace ('[^0-9\+-\*\/\(\) ]', '', $mathString);    // remove any non-numbers chars; exception for math operators
        if($mathString){
            $compute = create_function("", "return (" . $mathString . ");" );
            return 0 + $compute();
        }
        else{
            return $mathString;
        }
    }
    //Phục vụ cho việc nhân hai ma trận bất kỳ với nhau
    public function nhanhaimatran($matrana, $hanga, $cota, $matranb, $hangb, $cotb){
        if($hanga>0&&$cota&&$hangb>0&&$cotb>0){
            if($cota!=$hangb){
                return FALSE;
            }else{
                $matrananhanb=[];
                for($i=0;$i<$hanga;$i++){
                    for($j=0;$j<$cotb;$j++){
                        $matrananhanb[$i][$j]=0;
                        for($k=0;$k<$cota;$k++){
                            $matrananhanb[$i][$j]+=$matrana[$i][$k]*$matranb[$k][$j];
                        }
                    }
                }
                return $matrananhanb;
            }
        }else{
            return FALSE;
        }
    }
    //Phục vụ cho thuật toán bình phương và nhân liên tiếp
    public function binhphuongmatran($matrana, $capmatran){
        return $this->nhanhaimatran($matrana,$capmatran,$capmatran,$matrana,$capmatran,$capmatran);
    }
    //Theo thuật toán bình phương và nhân liên tiếp.
    public function luythuamatran($matrana, $capmatran, $somu){
        if($somu==1){
            return $matrana;
        }
        if($somu>1){//Áp dụng thuật toán bình phương và nhân liên tiếp
            $matranketqua=  $this->matrandonvi($capmatran);//Ban đầu gán với ma trận đơn vị
            $binhphuong=$matrana;
            $dodaibit=$this->dodaibit($somu);//Số bít tối đa phải quét để bình phương ma trận.
            for($i=0;$i<$dodaibit;$i++){
                if(($somu >> $i) & 1==1){//Tách nhị phân số mũ
                    $matranketqua=$this->nhanhaimatran(
                            $matranketqua,$capmatran,$capmatran,
                            $binhphuong,$capmatran,$capmatran);
                }
                $binhphuong=  $this->binhphuongmatran($binhphuong,$capmatran);
            }
            return $matranketqua;
        }
    }
    //Theo thuật toán nhân dồn bình thường.
    public function luythuamatranthuong($matrana, $capmatran, $somu){
        if($somu==1){
            return $matrana;
        }
        if($somu>1){//Áp dụng thuật toán bình phương và nhân liên tiếp
            $matranketqua=  $this->matrandonvi($capmatran);//Ban đầu gán với ma trận đơn vị
            
            for($i=0;$i<$somu;$i++){
                
                    $matranketqua=$this->nhanhaimatran(
                            $matranketqua,$capmatran,$capmatran,
                            $matrana,$capmatran,$capmatran);
                
            }
            return $matranketqua;
        }
    }
    //Tính ma trận nghịch đảo
    public function matrannghichdao($matran, $capmatran){
        if($capmatran>1){
            $khanghich=0;
            $matrannghichdao=  $this->matrandonvi($capmatran);
            
            for($t=1;$t<$capmatran;$t++){
                if($matran[$t-1][$t-1]==0){//hoan doi hang co phan tu troi khac 0
                    $khanghich=0;
                    for($i=$t;$i<$capmatran;$i++){//tim tu hang t tro di co phan tu cung cot t-1 khac 0 la duoc
                        if($matran[$i][$t-1]!=0){//hoan doi hang i va hang t-1
                            $khanghich=1;
                            for($j=0;$j<$capmatran;$j++){
                                //hoan doi a
                                $hoandoi=$matran[$t-1][$j];
                                $matran[$t-1][$j]=$matran[$i][$j];
                                $matran[$i][$j]=$hoandoi;
                                //hoan doi ma tran nghich dao
                                $hoandoi=$matrannghichdao[$t-1][$j];
                                $matrannghichdao[$t-1][$j]=$matrannghichdao[$i][$j];
                                $matrannghichdao[$i][$j]=$hoandoi;
                            }
                            
                            break;
                        }
                    }
                    if($khanghich==0){//he vo nghiem
                        return FALSE;
                    }
                }
                $khanghich=1;
                $duongcheo=$matran[$t-1][$t-1];
                for($i=$t;$i<$capmatran;$i++){
                    $u=$matran[$i][$t-1];
                    
                    for($j=$t-1;$j<$capmatran;$j++){//cong thuc duon cheo troi
                        $matran[$i][$j]=$matran[$i][$j]-$matran[$t-1][$j]*$u/$duongcheo;
                        
                    }
                    for($j=0;$j<$capmatran;$j++){
                        $matrannghichdao[$i][$j]=$matrannghichdao[$i][$j]-$matrannghichdao[$t-1][$j]*$u/$duongcheo;
                    }
                }
            }
            for($i=0;$i<$capmatran;$i++){
                if($matran[$i][$i]==0){
                    return FALSE;
                }
            }
            for($t=$capmatran-2;$t>=0;$t--){
                $duongcheo=$matran[$t+1][$t+1];
                for($i=$t;$i>=0;$i--){//tat ca cac hang tu $t tro ve truoc
                    $u=$matran[$i][$t+1];//a dau dong hang i
                    for($j=$t+1;$j>=0;$j--){//cong thuc duon cheo troi
                        $matran[$i][$j]=$matran[$i][$j]-$matran[$t+1][$j]*$u/$duongcheo;
                        
                    }
                    for($j=0;$j<$capmatran;$j++){
                        $matrannghichdao[$i][$j]=$matrannghichdao[$i][$j]-$matrannghichdao[$t+1][$j]*$u/$duongcheo;
                    }
                }
            }
            for($i=0;$i<$capmatran;$i++){
                $duongcheo=$matran[$i][$i];
                for($j=0;$j<$capmatran;$j++){
                    $matran[$i][$j]=$matran[$i][$j]/$duongcheo;
                    $matrannghichdao[$i][$j]=$matrannghichdao[$i][$j]/$duongcheo;
                }
            }
            return $matrannghichdao;
        }
        if($capmatran==1){
            if($matran[0][0]!=0){
                return 1/$matran[0][0];
            }  else {
                 return FALSE;
            }
        }
        return FALSE;
    }
    //Lấy toàn bộ ma trận con
    public function toanbomatrancon( $matran, $hang, $cot){
        $matrancon=[];
        for($i=0;$i<$hang;$i++){
            for($j=0;$j<$cot;$j++){
                $matrancon[$i][$j]=  $this->matrancon($matran, $hang, $cot, $i, $j);
            }
        }
        return $matrancon;
    }
    //Tìm ma trận liên hợp của ma trận
    public function matranlienhop($matran, $capmatran){
        $dinhthuc=$this->dinhthucthuong($matran, $capmatran);
        if($dinhthuc!=0){
            $matranlienhop=[];
            $matrancon= $this->toanbomatrancon(
                    $this->matranchuyenvi($matran, $capmatran, $capmatran), 
                    $capmatran, 
                    $capmatran
                );
            for($i=0;$i<$capmatran;$i++){
                for($j=0;$j<$capmatran;$j++){
                    $matranlienhop[$i][$j]=  pow(-1, $i+$j)*
                    $this->dinhthucthuong($matrancon[$i][$j], $capmatran-1);
                }
            }
            return $matranlienhop;
        }else{
            return FALSE;
        }
    }
    //Tính định thức ma trận theo cách thường
    public function dinhthucthuong($matran, $capmatran){
        if($capmatran>2){
            $dinhthuc=0;
            for($i=0;$i<$capmatran;$i++){
                $dinhthuc+=pow(-1, $i)*$matran[$i][0]
                        *$this->dinhthucthuong(
                        $this->matrancon($matran, $capmatran, $capmatran, $i, 0), 
                        $capmatran-1);
            }
            return $dinhthuc;
        }else if($capmatran == 2){
            return $matran[0][0]*$matran[1][1]-$matran[0][1]*$matran[1][0];
        }  else if($capmatran==1){
            return $matran[0][0];
        }else{
            return FALSE;
        }
    }
    //Cho ra ma trận luôn vuông
    public function matranvuong($matran ,$hang ,$cot){
        if($hang < $cot){ // bù thêm những hàng có các phần tử bằng 0
            for($i=$hang; $i<$cot;$i++){
                for($j=0;$j<$cot;$j++){
                    $matran[$i][$j] = 0;
                }
            }
        }
        if($hang > $cot){// bù thêm những cột có các phần tử bằng 0
            for($i=0; $i<$hang;$i++){
                for($j=$cot;$j<$hang;$j++){
                    $matran[$i][$j] = 0;
                }
            }
        }
        return $matran;
    }
    public $caphangdequy=0;
    public $hangdequy=[];
    public $tonglap=0;
    public $codau=0;
    public $mindau=0;
    //Tính hạng theo đệ quy
    public function hangdequy($matran, $hang, $cot){
        if($this->codau==0){//chi lay min lan dau
            $this->mindau=$cot;
            if($hang<$cot){
                $this->mindau=$hang;
            }
            $this->codau=1;
        }
        $matran =  $this->matranvuong($matran, $hang, $cot);
        $capmatran= count($matran);
        if($capmatran<=0){
            return [];
        }else{
            $dinhthuc=0;
            if($this->mindau>=$capmatran//Hạng chỉ tối đa là bằng min của hàng và cột
                    &&$this->caphangdequy<$capmatran){//Giảm bớt số lần tính định thức
                //do hạng cùng cấp là như nhau
                $dinhthuc=$this->dinhthucthuong($matran, $capmatran);
                $this->tonglap++;
            }
            if($dinhthuc!=0){
                if($this->caphangdequy<$capmatran){//cap nhật
                    $this->caphangdequy=$capmatran;
                    $this->hangdequy=$matran;//ma trận con có định thức khác 0
                }
                return $matran;
            }else if($capmatran>$this->caphangdequy){//Tìm hạng cao hơn
                 //Quét tất cả các ma trận cấp con hơn 1 cấp.
                $matrancon=  $this->toanbomatrancon($matran, $capmatran, $capmatran);
                for($i=0;$i<$capmatran;$i++){
                    for($j=0;$j<$capmatran;$j++){
                        $this->hangdequy($matrancon[$i][$j], $capmatran-1,$capmatran-1);
                    }
                }
            }
        }
    }
    
    //Định thức của ma trận
    public function dinhthucmatran($matran, $capmatran){
        if($capmatran>0){
            $dinhthuc=1;
            $codinhthuc=1;
            for($t=1;$t<$capmatran;$t++){
                if($matran[$t-1][$t-1]==0){
                    $codinhthuc=0;
                    for($i=$t;$i<$capmatran;$i++){
                        if($matran[$i][$t-1]!=0){
                            $codinhthuc=1;
                            for($j=0;$j<$capmatran;$j++){
                                $hoandoi=$matran[$t-1][$j];
                                $matran[$t-1][$j]=$matran[$i][$j];
                                $matran[$i][$j]=$hoandoi;
                            }
                            $dinhthuc=-1*$dinhthuc;
                            break;
                        }
                    }
                    if($codinhthuc==0){
                        $dinhthuc = 0;
                        break;
                    }
                }
                $codinhthuc=1;
                $duongcheo=$matran[$t-1][$t-1];
                for($i=$t;$i<$capmatran;$i++){
                    $u=$matran[$i][$t-1];
                    for($j=$t-1;$j<$capmatran;$j++){
                        $matran[$i][$j]=$matran[$i][$j]-$matran[$t-1][$j]*$u/$duongcheo;
                    }
                }
            }
            if($codinhthuc==1){
                for($i=0;$i<$capmatran;$i++){
                   $dinhthuc=$dinhthuc*$matran[$i][$i];
                }

            }
            return $dinhthuc;
        }else{
            return FALSE;
        }
    }
    //hiển thị ma trận
    public function hienthimatran($matran,$kieu){
       
        if($matran){
            echo '\\begin{'.$kieu.'}';
            foreach ($matran as $vali){
                $lastElementKey = array_pop(array_keys($vali));//tim key cuoi cua array
                foreach ($vali as $key=>$val){
                    if($lastElementKey != $key){
                        echo $this->sodep($val).' & ';
                    }  else {
                        
                        echo $this->sodep($val).' \\\\ ';
                        
                    }
                }
                
            }
            echo '\\end{'.$kieu.'}';
        }else{
            echo '(0)';
        }
    }
    //Tích ma trận với một số
    public function tichsomatran($so, $matran, $hang, $cot){
        for($i=0;$i<$hang;$i++){
            for($j=0;$j<$cot;$j++){
                $matran[$i][$j]=$so*$matran[$i][$j];
            }
        }
        return $matran;
    }
    //Hạng của ma trận
    public function hangmatran($matran, $hang, $cot){
        if($hang>0&&$cot>0){
            $giamhangmatran=0;
            if($hang>$cot){//Nếu hàng lớn hơn cột ta tính hạng của ma trận
                //chuyển vị, bởi vì hạng như nhau do tính chất.
                $matran=  $this->matranchuyenvi($matran, $hang, $cot);
                $hoandoi=$hang;//Đổi hàng cho cột.
                $hang=$cot;
                $cot=$hoandoi;
            }
            $capmatran=$cot;
            for($i=$hang;$i<$capmatran;$i++){//thêm vào những hàng 0
                for($j=0;$j<$capmatran;$j++){
                    $matran[$i][$j]=0;
                }
            }
            //Ta có được ma trận vuông, và thực hiện tìm hạng của nó.
            if($this->matran0($matran,$hang,$cot)){
                return 0;//Nếu là ma trận 0 thì hạng bằng 0
            }
            $giamhangmatran = $capmatran;
            $giuhang=1;//Giử hạng nếu bằng 0 sẽ giảm hạng.
            for($t=1;$t<$capmatran;$t++){
                $giuhang=1;
                if($matran[$t-1][$t-1]==0){
                    $giuhang=0;
                    for($i=$t;$i<$capmatran;$i++){
                        if($matran[$i][$t-1]!=0){//Phần tử đườn chéo khác 0
                            $giuhang=1;
                            for($j=0;$j<$capmatran;$j++){//Hoán đổi 2 hàng.
                                $hoandoi=$matran[$t-1][$j];
                                $matran[$t-1][$j]=$matran[$i][$j];
                                $matran[$i][$j]=$hoandoi;
                            }
                            break;
                        }
                    }
                    if($giuhang==0){//Thực hiện xóa đi cột đang xét
                        $giamhangmatran--;//Giảm hạng ma trận
                        if($giamhangmatran==1){
                            break;
                        }
                        for($i=0;$i<$capmatran;$i++){
                            for($j=$t-1;$j<$capmatran-1;$j++){
                                $matran[$i][$j]=$matran[$i][$j+1];
                            }
                        }
                        $t--;//Thực hiện tính toán lại cột $t
                    }
                }
                if($giuhang==1){//Biến thành ma trận tam giác trên.
                    $duongcheo=$matran[$t-1][$t-1];
                    for($i=$t;$i<$capmatran;$i++){
                        $u=$matran[$i][$t-1];
                        for($j=$t-1;$j<$capmatran;$j++){
                            $matran[$i][$j]=$matran[$i][$j]-$matran[$t-1][$j]*$u/$duongcheo;
                        }
                    }
                }
            }
            $hangmatran=0;
            for($i=0;$i<$capmatran;$i++){
                if($matran[$i][$i]!=0){
                    $hangmatran++;
                }
            }
            return $hangmatran;
        }  else {
            return FALSE;
        }
        
    }
    //trả về dấu - nếu $x là -, ngược lại trả về không dấu
    public function daudaiso($x){
        if($x<0){
            return "-";
        }else{
            return "";
        }
            
    }
    //Trả về ma trận con bằng cách bỏ đi hàng i và cột j
    public function matrancon($matran, $hang, $cot, $hangi, $cotj){
        $phanbu=[];
        $u=0;
        $v=0;
        for($i=0;$i<$hang;$i++){
            if($hangi!=$i){
                for($j=0;$j<$cot;$j++){
                    if($cotj!=$j){
                        $phanbu[$u][$v]=$matran[$i][$j];
                        $v++;
                    }
                }
                $v=0;
                $u++;
            }
            
        }
        return $phanbu;     
    }
    
    //Chuyển vị ma trận
    public function matranchuyenvi($matran, $hang, $cot){
        if($hang>0&&$cot>0){
            $matranT=[];
            for($i=0;$i<$cot;$i++){
                $matranT[$i]=[];
            }
            for($i=0;$i<$hang;$i++){
                for($j=0;$j<$cot;$j++){
                    $matranT[$j][$i]=$matran[$i][$j];
                }
            }
            return $matranT;
        }  else {
            return FALSE;
        }
    }
    //Kiểm tra ma trận có là ma trận 0?
    public function matran0($matran, $hang, $cot){
        for($i=0;$i<$hang;$i++){
            for($j=0;$j<$cot;$j++){
                if($matran[$i][$j]!=0){
                    return FALSE;
                }
            }
        }
        return TRUE;
    }

    //Tạo ma trận đơn vị theo cấp 
    public function matrandonvi($capmatran){
        $matran=[];
        for($i=0;$i<$capmatran;$i++){
            for($j=0;$j<$capmatran;$j++){
                if($i==$j){
                    $matran[$i][$j]=1;
                }else{
                    $matran[$i][$j]=0;
                }
            }
        }
        return $matran;
    }

    public function dodaibit($x){
        $dodai=0;
        for($i=31;$i>=0;$i--){
            if((($x >> $i) & 1)==1){
                $dodai=$i+1;
                break;
            }
        }
        return $dodai;
    }
    
    //Quy đổi số đẹp không có dạng E mà có dạng 10^, bỏ số -0 thành số 0
    public function sodep($x){
        if($x=="-0"){
            return 0;
        }
        //$x=  round($x,10);
        if(strpos($x, "E")){
            $x=  str_replace("+","",$x);
            $x=  str_replace("E","\cdot 10^{",$x);
            $x=$x."}";
        }
        return $x;
    }
    
}
