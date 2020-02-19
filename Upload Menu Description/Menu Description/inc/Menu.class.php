<?php

 class Menu {

    //
    public $menuItems = array();

    //Build an array for each class type for all the classes.
    public $pizzas = array();
    public $drinks = array();

    //This function returns a flat array of objects and puts them to $this->menuItems
    function parseMenuData($fileContents)  {

        //Lines
        $lines = explode("\n",$fileContents);
        //Walk the lines
        for($x=1; $x< count($lines); $x++) {
            try{
                //Pull the columns
                $columns = explode("|",$lines[$x]);
                if(count($columns)!=4) {
                    throw new Exception ("There was a problem parsing the file on line $x");
                }
                //If the class is Pizza
                if ($columns[0] == "pizza") {
                    //Pare the diffent kinds of pizza
                    switch($columns[1]) {

                        case "Basics":
                        // Make a new pizza
                        $i = new Basics();
                        $i->setItem($columns[2]);
                        $i->setDescription($columns[3]);
                        break;

                        case "Chicken":
                        // Make a new pizza
                        $i = new Chicken();
                        $i->setItem($columns[2]);
                        $i->setDescription($columns[3]);
                        break;

                        case "Meat":
                        // Make a new pizza
                        $i = new Meat();
                        $i->setItem($columns[2]);
                        $i->setDescription($columns[3]);
                        break;

                        case "Veggie":
                        // Make a new pizza
                        $i = new Veggie();
                        $i->setItem($columns[2]);
                        $i->setDescription($columns[3]);
                        break;
                        
                        //Add the item
                       
                    }
                    $this->menuItems[] = $i;
                }
                //If the class is Drink
                if ($columns[0] == "drink") {

                    //Parse the different kinds of drinks
                    switch ($columns[1])    {
                        
                        case "Juice":
                        // Make a new drink
                        $i = new Juice();
                        $i->setItem($columns[2]);
                        $i->setDescription($columns[3]);
                        break;

                        case "Pop":
                        //Make a new drink
                        $i = new Pop();
                        $i->setItem($columns[2]);
                        $i->setDescription($columns[3]);
                        break;

                    }
                    //Add the item
                    $this->menuItems[] = $i;
                }

            
            } catch (Exception $ex )
            {
                echo $ex->getMessage();
            }       

        }
        
    }

    /* Build the menu into specific categories based on the subclass and the class name
    * Pizzas should go in the pizzas array
    * Drinks should go in the drinks array
    */

    function buildMenu() {

        //Walk through the entire menu, put each item in its respective array by class and type. HINT use is_subclass_of
        foreach($this->menuItems as $item)
        {
            if(is_subclass_of($item,"pizza"))
            {
                //Check what type. Hint Use gettype
                switch (get_class($item))
                {
                    case "Basics":
                    //Add to the pizzas array with the "basics" key
                    $this->pizzas["basics"][] = $item;
                    break;

                    case "Chicken":
                    //Add to the pizzas array with the "chicken" key
                    $this->pizzas["chicken"][] =$item;
                    break;

                    case "Meat":
                    //Add to the pizzas array with the "meat" key
                    $this->pizzas["meat"][] = $item;
                    break;

                    case "Veggie":
                    //Add to the pizzas array with the "basics" key
                    $this->pizzas["veggie"][] = $item;
                    break;
                    
                    default:
                    Page::notify(array("Problem we dont know where to put this Pizza". get_class($item)));
                    break;

                }
            
            }

            //If ths a drink (Check is_subclass_of)
            if(is_subclass_of($item, "drink"))
            {
                //Check waht type.Hin use gettype
                //If its Pop
                //Use getClass
                switch (get_class($item))
                {
                    case "Pop":
                    //Add to the drinks array with the key "pop"
                    $this->drinks["Pop"][] = $item;
                    break;

                    //Add to the drinks array with the key "juice"
                    case "Juice":
                    $this->drinks["Juice"][] = $item;
                    break;

                    default:
                    Page::notify(array("Problem we dont know where to put this drink!"));
                    break;
                }

            }
           


        }

        //Sort the arrays

    }

}

 ?>