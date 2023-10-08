<?php 
    require "../../includes/api.php";

    $user = $_SESSION['user'];
    $cat = $_POST['cat'];
    $quest = $_POST['quest'];
    $answers = $_POST['answers'];
    $inputnum = $_POST['inputnum'];
    $prox = $quest + 1;
    $q = json_decode($answers);
    $n = count($q);
    
    echo 'o quanto que tem é: ' . $n . 'o quanto que falaram que tem é:' . $inputnum . "<br>";
    if ($inputnum > $n) {
        for($perg = 0; $perg <= $inputnum; $perg++) {
            echo $q[0]->name;
            if (isset($q[$perg]->name)) {
                $perga = $q[$perg]->name;
                $numperg = strpbrk($perga, '0123456789');
                echo 'o numero do loop é: ' . $perg . '............o numero dessa string é:' . $numperg;
                $pergname = 'perg' . $perg;
                $newObject = (object) ['name' => $pergname, 'value' => 'off'];

                // Define the position where you want to insert the new object
                $position = $perg; // This will insert the new object after the first element (index 1)

                // Split the array into two parts
                $part1 = array_slice($q, 0, $position + 1);
                $part2 = array_slice($q, $position + 1);

                // Add the new object at the specified position
                $objects = array_merge($part1, [$newObject], $part2);
            }else {
                if ($numperg != $perg){
                    $pergname = 'perg' . $perg;
                    $newObject = (object) ['name' => $pergname, 'value' => 'off'];
    
                    // Define the position where you want to insert the new object
                    $position = $perg + 1; // This will insert the new object after the first element (index 1)
    
                    // Split the array into two parts
                    $part1 = array_slice($q, 0, $position + 1);
                    $part2 = array_slice($q, $position + 1);
    
                    // Add the new object at the specified position
                    $q = array_merge($part1, [$newObject], $part2);
                }
            }
            

            
        }
        print_r($q);
    }


    $db->svquests("$user", "$cat", "$quest", "$answers");
    $db->updateongquest($user, $prox);
    //header("Location: ../quests.php?per=" . $prox . "&cat=" . $cat);
?>
