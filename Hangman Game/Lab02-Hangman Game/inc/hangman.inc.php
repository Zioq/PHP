<?php

//This function prints out the hangman in its masked form.
function printMasked(& $hangman)  {

    for($i=0; $i<count($hangman); $i++) {
    
        if($hangman[$i][1])
        {
            echo strtoupper($hangman[$i][0]);
        }
        else 
        {
            echo "*";
        }
    }
    echo "\n";
   
}

//This function handles the user guessing a character
function guessChar(& $hangman, $userChar)   
{   
    
    for($i=0; $i<count($hangman); $i++)
    {
        if($hangman[$i][0]==$userChar)
        {
            $hangman[$i][1] = true;
        }
    }
}

//This function checks to see if the user has entered all the correct characters, if true it contratulates the user and exists.
function checkStatus(&$hangman)    {
    
    $complete = true;
    foreach($hangman as $latterArray)
    {
        if($latterArray[1]==false)
        {
            $complete = false;
        }
    }
    
    if($complete)
    {
        print "Good job you done! "."\n";
        exit;
    }

}


//This function prompts the user for input and then creatds the datastructure for the game;
function getWord()  {


    //Here are the random pizza types, you may not use this array or modify it in the program, you may only pick a value from it!.
    $pizzaTypes = ['Marinara', 
        'Margherita', 
        'Chicago', 
        'Tomato', 
        'Sicilian', 
        'Greek', 
        'California'];
    
    //Shuffle the array, pull one from the top or find the length of the array and select a random number.
    $rand_keys = array_rand($pizzaTypes,2);
    $randPizzaType = strtolower($pizzaTypes[$rand_keys[0]]);
    return $randPizzaType;
}

function getArray($word)    {
    //Get the datastructure we are going to use for the rest of the program based on the word that was randomly selected.
    
    $hangman =str_split($word);
    
    for($i=0; $i< strlen($word); $i++)
    {
        $hangman[$i] = array($hangman[$i],false);
    }
    
    return $hangman;

}

//Thus function returns the number of tries that the user should get based on the word that was selected.
function getTries(& $word)    {
    //Remember you want 2x the number of letters in the word

    $chosenStringLength = strlen($word);
    $numTry = $chosenStringLength * 2;
    return $numTry;   
}

?>