<?php
include_once ROOT. '/cabinet/bank/models/Analysis.php';

class AnalysisController{
    //Оцінка платоспроможності
    public function actionGetSolvency(){
        $Solvency=Analysis::getForm();
        for ($x=14; $x<=16; $x++){
            for ($t=1; $t<=7; $t++){
                $analysis[$t][$x]=0;
                $analysis['color'][$t][$x]=3;
            }
            $min=$x-1;
            $year_min='e'.$min;
            if($min==13) $year_min='s14';
            $analysis[1][$x]=$Solvency[1195]['e'.$x]-$Solvency[1695]['e'.$x];
            if($Solvency[1695]['e'.$x]!=0)$analysis[2][$x]=$Solvency[1195]['e'.$x]/$Solvency[1695]['e'.$x];
            if($Solvency[1695]['e'.$x]!=0)$analysis[3][$x]=($Solvency[1195]['e'.$x]-$Solvency[1100]['e'.$x])/$Solvency[1695]['e'.$x];
            if($Solvency[1695]['e'.$x]!=0)$analysis[4][$x]=$Solvency[1165]['e'.$x]/$Solvency[1695]['e'.$x];
            if($Solvency[2000]['e'.$x]!=0)$analysis[5][$x]=($Solvency[2190]['e'.$x]/$Solvency[2000]['e'.$x])*100;
            if(($Solvency[1495]['e'.$x]+$Solvency[1495][$year_min])!=0)$analysis[6][$x]=($Solvency[2350]['e'.$x]/(($Solvency[1495]['e'.$x]+$Solvency[1495][$year_min])/2))*100;
            if(($Solvency[1300]['e'.$x]+$Solvency[1300][$year_min])!=0)$analysis[7][$x]=($Solvency[2350]['e'.$x]/(($Solvency[1300]['e'.$x]+$Solvency[1300][$year_min])/2))*100;

            if($analysis[1][$x]>($Solvency[1300]['e'.$x]*0.30)) $analysis['color'][1][$x]=1;
            if($analysis[1][$x]<($Solvency[1300]['e'.$x]*0.30)) $analysis['color'][1][$x]=3;

            if($analysis[2][$x]>2) $analysis['color'][2][$x]=1;
            if(1>$analysis[2][$x] and $analysis[2][$x]>2) $analysis['color'][2][$x]=2;
            if($analysis[2][$x]<1) $analysis['color'][2][$x]=3;

            if($analysis[3][$x]>1) $analysis['color'][3][$x]=1;
            if(0.6>$analysis[3][$x] and $analysis[3][$x]>1) $analysis['color'][3][$x]=2;
            if($analysis[3][$x]<0.6) $analysis['color'][3][$x]=3;

            if($analysis[4][$x]>0.3) $analysis['color'][4][$x]=1;
            if(0.2>$analysis[4][$x] and $analysis[4][$x]>0.3) $analysis['color'][4][$x]=2;
            if($analysis[4][$x]<0.2) $analysis['color'][4][$x]=3;

            if($analysis[5][$x]>0.1) $analysis['color'][5][$x]=1;
            if(0.05>$analysis[5][$x] and $analysis[5][$x]>0.1) $analysis['color'][5][$x]=2;
            if($analysis[5][$x]<0.05) $analysis['color'][5][$x]=3;

            if($analysis[6][$x]>20) $analysis['color'][6][$x]=1;
            if(20>$analysis[6][$x] and $analysis[6][$x]>10) $analysis['color'][6][$x]=2;
            if($analysis[6][$x]<10) $analysis['color'][6][$x]=3;

            if($analysis[7][$x]>14) $analysis['color'][7][$x]=1;
            if(14>$analysis[7][$x] and $analysis[7][$x]>10) $analysis['color'][7][$x]=2;
            if($analysis[7][$x]<10) $analysis['color'][7][$x]=3;


        }
        $analysis['sidebar_menu']='on';
        SRC::template('bank', 'panel', 'analysisSolvency', $analysis);
        return true;
    }

}

