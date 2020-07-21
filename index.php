<?php 
//initalize file 
$str = file_get_contents('example.json');
$json = json_decode($str, true);
$new_rray = $json['events'];
$os = array();
$osss = array();
$anything = 0;

//get all customer & check condition
foreach($new_rray as $key=>$value){
	
	if($value['action'] == 'new_customer'){
		
		$anme = $value['name'];
		if (in_array($anme, $os)) {
			
		}else{
			
			 array_push($os,$anme);
		}
	
	}else{
		
		
		$timestamp = $value['timestamp'];
		$finaltime = date("h:i a", strtotime($timestamp));
		
		$current_time = $finaltime;
		$sunrise = "12:00 pm";
		$sunset = "1:00 pm";
		$date1 = $current_time;
		$date2 = $sunrise;
		$date3 = $sunset;
		
		if ($date1 > $date2 && $date1 < $date3)
		{
		  $anything = 1;	
		  $point_final =  $value['amount']*1/3;
		  $osss[] = array('customer'=>$value['customer'],'amount'=>$value['amount'],'points'=>$points,'time'=>$date1,'contion'=>'contion1');
		}
		
		$condi23 = "11:00 am";
		$condi24 = "12:00 pm";
		$condi25 = "1:00 pm";
		$condi26 = "2:00 pm";
		
	  if ($date1 > $condi23 && $date1 < $condi24  || $date1 > $condi25 && $date1 < $condi26)
		{
		  $anything = 1;	
		 $point_final =  $value['amount']*1/2;	
		  $osss[] = array('customer'=>$value['customer'],'amount'=>$value['amount'],'points'=>$points,'time'=>$date1,'contion'=>'contion2');
		}
		
		
		$condi33 = "10:00 am";
		$condi34 = "11:00 am";
		$condi35 = "1:00 pm";
		$condi36 = "3:00 pm";
		
	   if ($date1 > $condi33 && $date1 < $condi34  || $date1 > $condi35 && $date1 < $condi36)
		{
		  $anything = 1;	
		 $point_final =  $value['amount']*1/1;
		  $osss[] = array('customer'=>$value['customer'],'amount'=>$value['amount'],'points'=>$points,'time'=>$date1,'contion'=>'contion3');
		}
		
		
		
	  if($anything == 0){
		   
		  $point_final =  $value['amount']*0.25/1;
		  $osss[] = array('customer'=>$value['customer'],'amount'=>$value['amount'],'points'=>$point_final,'time'=>$date1,'contion'=>'contion4');
			
		}
		
		
		
	}
}

 // count points
foreach($os as $hfghf){
	$pointd = 0;
	$ordercount = 0;
	 foreach($osss as $key=>$jhgss){
		 
		if($hfghf == $jhgss['customer']) {
			
			$ordercount = $ordercount + 1;
			$pointd = $pointd + $jhgss['points']; 
		  
		}
	
	 }
	 
	 $arrayhd[] = array('customer'=>$hfghf,'points'=>$pointd,'ordercount'=>$ordercount);	
	
} 


  // final result

 foreach ($arrayhd as $key => $hdjkfd){
	 
	 if($hdjkfd['points'] != 0){
	 echo $hdjkfd['customer']; 
	 echo ":  ";
	 echo round($hdjkfd['points']); 
	 echo "  points with  ";
	 echo  round($hdjkfd['points'] / $hdjkfd['ordercount']);
	 echo "  points per order.";
	 echo "</br>";
	 } else{
		 echo $hdjkfd['customer']; 
		  echo ":  ";
		 echo "  No orders.";
		 echo "</br>";
	 
	 }
	 
 }



?>
