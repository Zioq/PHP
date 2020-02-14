<?php

//Declare requires
require('inc/hangman.inc.php');

//Return the word for the user, return the only array we are going ot use!
$word = getWord();

//Get the number of tries we should allow the user (2x the number of characters from the returned pizza type.)
$tries = getTries($word);

//Construct the array we are going to use for the rest of the program based on the Word.
$hangman = getArray($word);

//While the user has tries...
while($tries !=0)
{
    //Display the masked version to the user on first instance.
    if($tries == getTries($word))
    {   

        echo "Game Start! Please guess the letter words "."\n";
        //Function for the masked answer   
        printMasked($hangman);
    }

    //Prompt the user for a letter
    echo "Please enter a guess: ";
    $userChar = strtolower(stream_get_line(STDIN,1024,PHP_EOL));
    guessChar($hangman,$userChar); 

    //Display a masked version of the name according to the attributes in the Array
    printMasked($hangman);

    //Check the game status!
    checkStatus($hangman);

    //Tell the user how many tries they have left.
    $tries--;
    echo "You have $tries left!"."\n";
}
//If the counter is at zero then prompt the user that their number of tries is over and exit the program.
echo "you tries over. Gameover...."."\n";

?>