<?php date_default_timezone_set("Asia/Kolkata");
                            $first  = new DateTime($jobDetails['jobPostedDate'] );
                            $t=time();

                            // $second =strtotime(date("Y-m-d h:i:s",$t));
                            $second = new DateTime();
                            // $second = date('Y-m-d H:i:s');
                            // $second= $now->format('Y-m-d H:i:s');    
                           
                            $diff = $first->diff( $second );
                            // echo round((int)$diff->format('%Y'));
                            $duration='';
                             if($diff->format( '%Y')>0){
                            
                                $duration .= round((int)$diff->format('%Y')) ; 
                                if($diff->format( '%Y')==1){
                                    $duration .= ' Year';
                                }else{
                                    $duration .= ' Years';
                                } 
                            } else if($diff->format( '%M')>0){
                                $duration .= round((int)$diff->format('%M')); 
                                if($diff->format( '%M')==1){
                                    $duration .= ' Month';
                                }else{
                                    $duration .= ' Months';
                                } 
                            }else if($diff->format( '%D')>0){
                                $duration .= round((int)$diff->format('%D')); 
                                if($diff->format( '%D')==1){
                                    $duration .= ' Day';
                                }else{
                                    $duration .= ' Days';
                                } 
                            }else if($diff->format( '%H')>0){
                                $duration .= round((int)$diff->format('%H')); 
                                if($diff->format( '%H')==1){
                                    $duration .= ' Hour';
                                }else{
                                    $duration .= ' Hours';
                                } 
                            }else if($diff->format( '%I')>0){
                                $duration .= round((int)$diff->format('%I')); 
                                if($diff->format( '%I')==1){
                                    $duration .= ' Minute';
                                }else{
                                    $duration .= ' Minutes';
                                } 
                            }else{
                                $duration .= 'Few Seconds';
                            }
                            $duration .= ' ago';
                            echo $duration;
                            ?>