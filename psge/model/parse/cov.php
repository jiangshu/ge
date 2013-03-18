<?php

$project = $_GET["project"];
$project = str_replace("-","_",$project);
$xmlFile = "/home/work/repos/".$project."_dev_quick/reports/clover-coverage.xml";

function getCov($xmlFile=""){
    if(file_exists($xmlFile)){
        $doc = new DOMDocument();
        $doc->load($xmlFile);
        $xpath = new DOMXPath($doc);
        $nodes = $xpath->evaluate('/coverage/project/metrics');
        $statements = $nodes-> item(0)-> getAttribute( 'statements');
        $coveredstatements = $nodes-> item(0)-> getAttribute( 'coveredstatements');
        $coverage = $coveredstatements/$statements*100;
        $coverage = number_format($coverage, 1, '.', '');
        return $coverage;
    }
    return 0;
}

echo getCov($xmlFile);
