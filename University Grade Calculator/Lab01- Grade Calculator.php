<?php

//Keep the total number of points
$totalPoints = 0;

//Keep the total score
$totalScore = 0;

//Keep the total number of missed points
$yesMissed =0;


//Keep a variable for the report output
$assessment = "";
$assessmentPoints = 0;
$absent ="";
$assessmentScore = 0;
$weightedAverage = 0;
$missedPercentage = 0;
$outcome ="";
$countSubmit = 0;
$FinalweightedAverage = 0;
$FinalmissedPercentage = 0;
$sentinel ="";
$report ="";



//Go into a loop until the user exits
while (true)    
{
    //Prompt the user
    echo "Please enter your command in the form of (a, r, q)";
   
    //Read in the command
    $command = stream_get_line(STDIN,1024,PHP_EOL);

    //If the command is ....
        if($command == "q"){
        //If quit then quit.
            exit();
        }
        //Prompt the user for assessment details
         elseif($command == "a") 
        {   
            //Enter the name of the assessment
            echo "Please enter the name of the assessment: ";
            $assessment = stream_get_line(STDIN,1024,PHP_EOL);

            //Enter the number of points for the assessment
            echo "Please enter the number of points for the assessment: ";
            $assessmentPoints = stream_get_line(STDIN,1024,PHP_EOL);

            //Check if the user was absent, keep asking until the user enters a y or a n.
            
            //Another while loop
            while ($sentinel == false) {
                //Was the user absent?
                echo "Was the sudent absent? (y/n): ";
                $absent = stream_get_line(STDIN,1024,PHP_EOL);
                
                //If the user entered a y or a n then exit
                if ($absent == 'y'|| $absent =='n')
                {
                    $countSubmit ++;
                    break;
                }
                else 
                {
                    echo "Enter only 'y' or 'n'\n";
                    
                }
            }
            //If the student was absent
            if ($absent == "y")    
            {
                
                //Write a message to the console
                echo "The student has been maked absent for this assignment.\n";
                //add the missed points to the total
                $totalPoints +=0;
                //Set the score to zero
                $assessmentScore = 0;
                $yesMissed++;
                

            
            } 
            else 
            {

                echo "Please enter the student's score for the assessment: ";
                $assessmentScore = stream_get_line(STDIN,1024,PHP_EOL);

            }
        
            //Update the totals (Points and Score)
            $totalPoints += $assessmentPoints;
            $totalScore += $assessmentScore;
    
            //Start the Report we have all the data we need
            //print seperator
            $report .= sprintf("%'-80s\n",'');
            $report .= sprintf(sprintf("%20s","Assigemnt:"));
            $report .= sprintf(sprintf("%40s",$assessment))."\n";
            $report .= sprintf(sprintf("%20s","Total Points:"));
            $report .= sprintf(sprintf("%40s",$assessmentPoints))."\n";
            $report .= sprintf(sprintf("%20s","Total Score:"));
            $report .= sprintf(sprintf("%40s",$assessmentScore))."\n";
            $report .= sprintf(sprintf("%20s","Missed:"));
            $report .= sprintf(sprintf("%40s",$absent))."\n";
            

    }   
    //If print the report.
    elseif($command == "r")     
    {
             //Compile the final Report
            
             //Calculated the weighted average
            $weightedAverage = $totalScore/$totalPoints;
            $FinalweightedAverage = number_format($weightedAverage,2,',','');
             //Calculate the missed percentage
            $missedPercentage =$yesMissed/$countSubmit;
            $FinalmissedPercentage = number_format($missedPercentage,2,',','');

             
             //Whas it a UN?
            if($missedPercentage>0.3)
            {
            $outcome ="UN";
            }
            //if not 
            //PASS
            elseif($missedPercentage<=0.3 && $weightedAverage >=0.5)
            {
                
            $outcome ="PASS";
            }
            //FAIL
            elseif($missedPercentage<=0.3 && $weightedAverage<0.5)
            {
            $outcome ="FAIL";
            }


            //Print seperator
            $finalReport = sprintf("%'-80s\n",'');
            
            $finalReport .= sprintf("%40s","FINAL REPORT")."\n";
            //Print the weighted average
            $finalReport .= sprintf(sprintf("%20s","Weighted average:"));
            $finalReport .= sprintf(sprintf("%40s",$FinalweightedAverage))."%\n";
            //Print the missed percentage
            $finalReport .= sprintf(sprintf("%20s","Missed percentage:"));
            $finalReport .= sprintf(sprintf("%40s",$FinalmissedPercentage))."%\n";
            //Print outcome final outcome
            $finalReport .= sprintf(sprintf("%20s","Outcome:"));
            $finalReport .= sprintf(sprintf("%40s",$outcome))."\n";
            //Print seperator
            $finalReport .= sprintf("%'-80s\n",'');
            
             
             echo $report;
             echo $finalReport;

    }
            //Hit the default? Cant recognize the command?

    elseif($command!='a'||$command!='r'||$command!='q')
    {
             echo "Please enter a valid command\n";
        
    }
}


?>