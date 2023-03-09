<?php

    class calendary 
    {
        private $month, $year;

        public function __constructor($month, $year) 
        { 
            $this->month = $month; 
            $this->year = $year; 
        }

        public function getMonth() 
        { 
            return $this->month; 
        } 
   
        public function getYear() 
        { 
            return $this->year; 
        } 
   
        public function setMonth($month) 
        {  
           $this->month = $month; 
        } 
   
        public function setYear($year) 
        {  
           $this->year = $year; 
        }

        public function printTable()
        {
            $table = "<table cellspacing='10'><thead>";
            $days = array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");

            $months = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");

            $table .= "<tr>";

            $table .= "<td colspan='7'  class='cells'>".$months[$this->month - 1]."&nbsp;&nbsp;&nbsp;".$this->year."</td>";

            $table .= "</tr>";

            $table .= "<tr>";

            for ($i = 0; $i < count($days); $i++) 
            {
                $table .= "<td class='cells'>".$days[$i]."</td>";
            }

            $table .= "</tr>";

            $dayCounter = cal_days_in_month(CAL_GREGORIAN,$this->month,$this->year);

            $actualMonth = date('m');
            $Month = "";
            $Year = "";

            $Month = $this->month - $actualMonth; 

            if ($this->year != date('Y'))
            {
                $Year = $this->year - date('Y');
                $Month = $Month + 12 * $Year;
            }

            $firstDayOfMonth = date('D', strtotime(date('Y-m-1').' '.$Month.' MONTH'));

            $lastDayOfMonth = date('D', strtotime(date('Y-m-'.$dayCounter.'').' '.$Month.' MONTH'));


            $blankSquares = [
                "Mon" => "1",
                "Tue" => "2",
                "Wed" => "3",
                "Thu" => "4",
                "Fri" => "5",
                "Sat" => "6",
                "Sun" => "0",
            ];

           $counter = 1;

            $table .= "<tr>";

            for ($i = 1; $i <= $blankSquares[$firstDayOfMonth]; $i++)
            {
                $table .= "<td class='cells'>"."&nbsp;"."</td>";
                $counter++;
            }

            if ($this->month == date('m') && $this->year == date('Y'))
            {
                for ($i = 1; $i <= $dayCounter; $i++)
                {
                    if ($counter != 7) 
                    {   
                        $table .= "<td class='cells' id='$i'>".$i."</td>";
                        $counter++;
                    }

                    else if ($counter == 7)
                    {
                        {   
                            $table .= "<td class='cells' id='$i'>".$i."</td></tr><tr>";
                            $counter = 1;
                        }
                    }
                }
            }

            else
            {
                for ($i = 1; $i <= $dayCounter; $i++)
                {
                    if ($counter != 7) 
                    {   
                        $table .= "<td class='cells'>".$i."</td>";
                        $counter++;
                    }

                    else if ($counter == 7)
                    {
                        {   
                            $table .= "<td class='cells'>".$i."</td></tr><tr>";
                            $counter = 1;
                        }
                    }
                }
            }

            for ($i = 1; $i <= (6 - $blankSquares[$lastDayOfMonth]); $i++)
            {
                $table .= "<td class='cells'>"."&nbsp;"."</td>";
            }

            $table .= "</tr>";

            $table .= "</thead>";

            return $table;
        }
    }
?>