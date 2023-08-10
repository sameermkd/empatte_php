<?php
    require('fpdf/fpdf.php');
    include('database.php');
    $jobid=$_POST['jobid'];
    $startdate=$_POST['startdate'];
    $enddate=$_POST['enddate'];
    $pdf = new FPDF('P','mm','A4');

    $pdf->AddPage();
    /*output the result*/

    /*set font to arial, bold, 14pt*/
    $pdf->SetFont('Arial','B',20);

    /*Cell(width , height , text , border , end line , [align] )*/
    $pdf->Cell(80 ,2,'Company Name',0,1);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(10 ,20,'Job ID :'.$jobid,0,0);
    $pdf->Cell(150 ,20,'Starting Date :'.$startdate,0,0,'C');
    $pdf->Cell(0 ,20,'Ending Date :'.$enddate,0,0,'R');
    $pdf->Cell(0 ,15,'',0,1);
    $sql = "SELECT *from entry WHERE date between '$startdate' and '$enddate' and jobid='$jobid'";
    $result = mysqli_query($conn, $sql);
    function differenceInHours($startdate,$enddate){
        $starttimestamp = strtotime($startdate);
        $endtimestamp = strtotime($enddate);
        $difference = abs($endtimestamp - $starttimestamp)/3600;
        return $difference;
        }
    $pdf->SetFont('Arial','B',8);
        /*Heading Of the table*/
    $pdf->Cell(12 ,10,'SL NO',1,0,'C');
    $pdf->Cell(12 ,10,'Job ID',1,0,'C');
    $pdf->Cell(40 ,10,'Customer Name',1,0,'C');
    $pdf->Cell(40 ,10,'Job Description',1,0,'C');
    $pdf->Cell(30 ,10,'Emp Name',1,0,'C');
    $pdf->Cell(18 ,10,'Stating Time',1,0,'C');
    $pdf->Cell(18 ,10,'Ending Time',1,0,'C');
    $pdf->Cell(15 ,10,'Total Time',1,1,'C');
    $i=1;
    $totaltime=0;
    // $ot=0;
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
             {
                $pdf->Cell(12 ,10,$i,1,0);
                $pdf->Cell(12 ,10,$row['jobid'],1,0);
                $pdf->Cell(40 ,10,$row['customername'],1,0);
                $pdf->Cell(40 ,10,$row['jobdesc'],1,0);
                $pdf->Cell(30 ,10,$row['empname'],1,0);
                $pdf->Cell(18,10,$new_date_format = date('H:i A', strtotime($row['starttime'])),1,0);
                $pdf->Cell(18 ,10,$new_date_format = date('H:i A', strtotime($row['endtime'])),1,0);
                $totalwork=differenceInHours($row['endtime'],$row['starttime']);
                if($row['lunch']=="Yes")
                    {
                    $totalwork=$totalwork-1;
                    $pdf->Cell(15 ,10,round($totalwork,2),1,1);
                    $totaltime=$totaltime+$totalwork;
                    }
                else
                    {
                    $pdf->Cell(15 ,10,round($totalwork,2),1,1);
                    $totaltime=$totaltime+$totalwork;
                    }
                //     $working=differenceInHours($row['endtime'],$row['starttime']);
                //     $break=$row['lunch'];
                //     $off=$row['hollyday'];
                //     if($working>9 && $break=='Yes' && $off=='No')
                //         {
                //             $pdf->Cell(22 ,10,round($overtime=($working-9)-1,2),1,1);
                //             $ot=$ot+$overtime;
                //         }
                //     if($working>9 && $break=='No' && $off=='No')
                //         {
                //             $pdf->Cell(22 ,10,round($overtime=($working-9),2),1,1);
                //             $ot=$ot+$overtime;
                //         }
                //     if($off=='Yes' && $break=='Yes')
                //         {
                //             $pdf->Cell(22 ,10,round($overtime=$working-1,2),1,1);
                //             $ot=$ot+$overtime;
                //         }
                //     if($off=='Yes' && $break=='No')
                //         {
                //             $overtime1=$working;
                //             $pdf->Cell(22 ,10,round($overtime1,2),1,1);
                //             $ot=$ot+$overtime;
                //         }
                }
                $i++;
            }
            $pdf->Cell(185 ,10,"Total Time :".round($totaltime,2),1,0);

    }
    $pdf->Output();
?>