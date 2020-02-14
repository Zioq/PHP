A Simple hangman game console app
----------------------------------------------
'Code Structure'
1) 'inc': This folder has a php file involves functions.
2) 'Lab02 Hangman Game.php':This file is a main frame and executes functions. 

'Functions'
1) printMasked() – Pass the hangman variable and print the masked version of the word 
2) guessChar() – Pass the character that the user guessed and set the appropriate data in the hangman, 
   this function can take the character that the user inputted
3) checkStatus() – This checks if the user has guessed all the characters in the word, 
   if they have then it congratulates them and exits
4) getWord() – This function returns a random word from the array provided of Pizza Types. 
5) getArray() - This function builds the "hangman" array and returns it.
6) getTries() - This function returns the number of tries based on the word that was randomly selected (noOfCharacters * 2)
