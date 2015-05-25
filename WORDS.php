<?php
  #include dictionary file
  include("string.php");
  $word = str_replace("\n","<br>",$string);
  $words = explode("<br>",$word);
  for($a=0;$a<=count($words)-1;$a++)
  {
    $individual[$a] = explode("`",$words[$a]);
    $try = substr($_GET['word'],0,-3);
    if($individual[$a][1]==$try)
    {
      #filter nouns
      if($individual[$a][2]=="N")
      {
        echo "Noun<br>";
      }
      #filter verbs
      else if($individual[$a][4]=="V")
      { 
        #Filter Conjugations
        if($individual[$a][5]=="1")
        {
          $root = $individual[$a][1];
          echo "<h2>".$root."are</h1>";
          $ind[0] = $root."o";
          $ind[1] = $root."as";
          $ind[2] = $root."at";
          $ind[3] = $root."amus";
          $ind[4] = $root."atis";
          $ind[5] = $root."ant";
          $sub[0] = $root."em";
          $sub[1] = $root."es";
          $sub[2] = $root."et";
          $sub[3] = $root."emus";
          $sub[4] = $root."etis";
          $sub[5] = $root."ent";
          if($individual[$a][2]!="zzz")
          {
            $indpass[0] = $root."or";
            $indpass[1] = $root."aris";
            $indpass[2] = $root."atur";
            $indpass[3] = $root."amur";
            $indpass[4] = $root."amini";
            $indpass[5] = $root."antur";
            $subpass[0] = $root."er";
            $subpass[1] = $root."eris";
            $subpass[2] = $root."etur";
            $subpass[3] = $root."emur";
            $subpass[4] = $root."emini";
            $subpass[5] = $root."entur";
          }
        }
        echo "<h3>Present Indicative Active</h3>";
        for($a=0;$a<=5;$a++)
        {
          echo $ind[$a]."<br>";
        }
        echo "<h3>Present Indicative Passive</h3>";
        for($a=0;$a<=5;$a++)
        {
          echo $indpass[$a]."<br>";
        }
        echo "<h3>Present Subjunctive Active</h3>";
        for($a=0;$a<=5;$a++)
        {
          echo $sub[$a]."<br>";
        }
        echo "<h3>Present Subjunctive Passive</h3>";
        for($a=0;$a<=5;$a++)
        {
          echo $subpass[$a]."<br>";
        }
        $tojson = array();
        for($a=0;$a<=15;$a++)
        {
          for($i=0;$i<=5;$i++)
          {
            if($a==0)
            {
              $tojson[$a][$i] = $ind[$i];
            }
            if($a==1)
            {
              $tojson[$a][$i] = $indpass[$i];
            }
            if($a==2)
            {
              $tojson[$a][$i] = $sub[$i];
            }
            if($a==3)
            {
              $tojson[$a][$i] = $subpass[$i];
            }
          }
        }
        $json = json_encode($tojson);
        echo $json;
      }
      break;
    }
  }