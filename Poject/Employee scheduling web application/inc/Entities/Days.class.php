<?php
class Days{

    private $DayId;
    private $DateOfWork;
    
    
    public function setDayId(int $DayId){
        
        $this->DayId= $DayId;
    }
public function setDateOfWork(string $DateOfWork){
    $this->DateOfWork=$DateOfWork;


}

    
public function getDayId():int{
        
    return $this->DayId;
}
public function getDateOfWork():string{
return $this->DateOfWork;

}







}
