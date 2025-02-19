<?php
if($weight_type=='UNDERWEIGHT')
{
  echo '<thead>
  
                <tr>
                    <th></th>
                    <th>Items</th>
                    <th>Calories(g)</th>
                    <th class="text-center">Carbs(g)</th>
                    <th>Protein(gms)</th> 
                    <th>Fat(g)</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Breakfast</td>
                    <td>Milk</br>GreenTea</br>EggsBoiled</td>
                    <td class="text-center">150-160</br>0-5</br>78-80</td>
                    <td class="text-center">12-15</br>8</br>1</td>
                    <td class="text-center">8</br>1</br>6</td>
                    <td class="text-center">8-9</br>6</br>5</td>
                </tr>
                <tr>
                    <td>Sub Total</td>
                    <td></td>
                    <td class="text-center">145</td>
                    <td class="text-center">24</td>
                    <td class="text-center">15</td>
                    <td class="text-center">20</td>
                </tr>
                <tr>
                    <td>Lunch</td>
                    <td>Mushrooms</br>GreenBeans</br>Cucumbers</td>
                    <td class="text-center">15-20</br>30-35</br>15-20</td>
                    <td class="text-center">2-4</br>7-8</br>2-3</td>
                    <td class="text-center">2-3</br>1-2</br>0.5</td>
                    <td class="text-center">1</br>1</br>1</td>
                </tr>
                <tr>
                    <td>Sub Total</td>
                    <td></td>
                    <td class="text-center">75</td>
                    <td class="text-center">15</td>
                    <td class="text-center">5.0</td>
                    <td class="text-center">3</td>
               </tr>
                <tr>
                    <td>Snack</td>
                    <td>BabyCarrots</br>Radishes</br>CelerySticks</td>
                    <td class="text-center">30</br>1</br>6</td>
                    <td class="text-center">6</br>1</br>1</td>
                    <td class="text-center">0.6</br>0.8</br>0.3</td>
                    <td class="text-center">0.1</br>0.1</br>0.1</td>
                </tr>
                <tr>
                    <td>Sub Total</td>
                    <td></td>
                    <td class="text-center">37</td>
                    <td class="text-center">8</td>
                    <td class="text-center">1.7</td>
                    <td class="text-center">0.3</td>
               </tr>
                <tr>
                    <td>Dinner</td>
                    <td>Dal</br>Roti</br>Chawal</td>
                    <td class="text-center">100-120 </br>80-100</br>100-130</td>
                    <td class="text-center">20-25</br>15-20</br>20-25</td>
                    <td class="text-center">8-10</br>3-4</br>2-3</td>
                    <td class="text-center">1-2</br>1-2</br>0-1</td>
                </tr>
                <tr>
                    <td>Sub Total</td>
                    <td></td>
                    <td class="text-center">450</td>
                    <td class="text-center">70</td>
                    <td class="text-center">17</td>
                    <td class="text-center">5</td>
                </tr>
         </tbody>';
}
else if($weight_type=='NORMAL WEIGHT')
{
     echo '<thead>
            <tr>
                <th></th>
                <th>Items</th>
                <th>Calories(g)</th>
                <th class="text-center">Carbs(g)</th>
                <th>Protein(gms)</th> 
                <th>Fat(g)</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Breakfast</td>
                <td>Milk</br>GreenTea</br>EggsBoiled</td>
                <td class="text-center">150-160</br>0-5</br>70-80</td>
                <td class="text-center">12-15</br>8</br>1</td>
                <td class="text-center">8</br>1</br>6</td>
                <td class="text-center">8-9</br>6</br>5</td>
            </tr>
            <tr>
                    <td>Sub Total</td>
                    <td></td>
                    <td class="text-center">145</td>
                    <td class="text-center">24</td>
                    <td class="text-center">15</td>
                    <td class="text-center">20</td>
            </tr>
            <tr>
                <td>Lunch</td>
                <td>Mushrooms</br>GreenBeans</br>Cucumbers</td>
                <td class="text-center">15-20</br>30-35</br>15-20</td>
                <td class="text-center">2-4</br>7-8</br>2-3</td>
                <td class="text-center">2-3</br>1-2</br>0.5</td>
                <td class="text-center">1</br>1</br>1</td>
            </tr>
            <tr>
                <td>Sub Total</td>
                <td></td>
                <td class="text-center">75</td>
                <td class="text-center">15</td>
                <td class="text-center">5.5</td>
                <td class="text-center">3</td>
           </tr>
            <tr>
                <td>Snack</td>
                <td>BabyCarrots</br>Radishes</br>CelerySticks</td>
                <td class="text-center">30</br>1</br>6</td>
                <td class="text-center">6</br>1</br>1</td>
                <td class="text-center">0.6</br>0.8</br>0.3</td>
                <td class="text-center">0.1</br>0.1</br>0.1</td>
            </tr>
            <tr>
                <td>Sub Total</td>
                <td></td>
                <td class="text-center">37</td>
                <td class="text-center">8</td>
                <td class="text-center">1.7</td>
                <td class="text-center">0.3</td>
            </tr>
            <tr>
                <td>Dinner</td>
                <td>Dal</br>Roti</br>Chawal</td>
                <td class="text-center">100-120</br>80-100</br>100-130</td>
                <td class="text-center">20-25</br>15-20</br>20-25</td>
                <td class="text-center">8-10</br>3-4</br>2-3</td>
                <td class="text-center">1-2</br>1-2</br>1</td>
            </tr>
            <tr>
                <td>Sub Total</td>
                <td></td>
                <td class="text-center">350</td>
                <td class="text-center">70</td>
                <td class="text-center">17</td>
                <td class="text-center">5</td>
            </tr>
        </tbody>';
}
else if($weight_type=='OVERWEIGHT')
{
    echo '<thead>
                <tr>
                    <th></th>
                    <th>Items</th>
                    <th>Calories(g)</th>
                    <th class="text-center">Carbs(g)</th>
                    <th>Protein(gms)</th> 
                    <th>Fat(g)</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Breakfast</td>
                    <td>Milk</br>GreenTea</br>EggsBoiled</td>
                    <td class="text-center">150-160</br>0</br>70-80</td>
                    <td>12-13</br>1</br>0.6</td>
                    <td>8</br>1</br>6</td>
                    <td>8</br>1</br>5</td>
                </tr>
                <tr>
                <td>Sub Total</td>
                    <td></td>
                    <td class="text-center">140</td>
                    <td class="text-center">14.6</td>
                    <td class="text-center">15</td>
                    <td class="text-center">14</td>
                </tr>
                <tr>
                    <td>Lunch</td>
                    <td>Mushrooms</br>GreenBeans</br>Cucumbers</td>
                    <td class="text-center">15-20</br>30-35</br>15-20</td>
                    <td>2-4</br>7-8</br>2-3</td>
                    <td>2-3</br>1-2</br>0.5</td>
                    <td>1</br>1</br>1</td>
                </tr>
                <tr>
                    <td>Sub Total</td>
                    <td></td>
                    <td class="text-center">75</td>
                    <td class="text-center">15</td>
                    <td class="text-center">5.5</td>
                    <td class="text-center">3</td>
                </tr>
                <tr>
                    <td>Snack</td>
                    <td>BabyCarrots</br>Radishes</br>CelerySticks</td>
                    <td class="text-center">30</br>1</br>6</td>
                    <td>6</br>1</br>1</td>
                    <td>0.6</br>0.8</br>0.3</td>
                    <td>0.1</br>0.1</br>0.1</td>
                </tr>
                <tr>
                    <td>Sub Total</td>
                    <td></td>
                    <td class="text-center">37</td>
                    <td class="text-center">8</td>
                    <td class="text-center">1.7</td>
                    <td class="text-center">0.3</td>
                </tr>
                <tr>
                    <td>Dinner</td>
                    <td>Dal</br>Roti</br>Chawal</td>
                    <td class="text-center">100-120</br>80-100</br>100-130</td>
                    <td>20-25</br>15-20</br>20-25</td>
                    <td>8-10</br>3-4</br>2-3</td>
                    <td>1-2</br>1-2</br>1</td>
                </tr>
                <tr>
                    <td>Sub Total</td>
                    <td></td>
                    <td class="text-center">350</td>
                    <td class="text-center">70</td>
                    <td class="text-center">17</td>
                    <td class="text-center">5</td>
                </tr>
            </tbody>';
}
else if($weight_type=='OBESE')
{
    echo '<thead>
                <tr>
                    <th></th>
                    <th>Items</th>
                    <th>Calories(g)</th>
                    <th class="text-center">Carbs(g)</th>
                    <th>Protein(gms)</th> 
                    <th>Fat(g)</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Breakfast</td>
                    <td>Milk</br>GreenTea</br>EggsBoiled</td>
                    <td class="text-center">150-160</br>0</br>70-80</td>
                    <td>12-13</br>1</br>0.6</td>
                    <td>8</br>1</br>6</td>
                    <td>8</br>1</br>5</td>
                </tr>
                <tr>
                    <td>Sub Total</td>
                    <td></td>
                    <td class="text-center">140</td>
                    <td class="text-center">14.6</td>
                    <td class="text-center">15</td>
                    <td class="text-center">14</td>
                </tr>
                <tr>
                    <td>Lunch</td>
                    <td>Mushrooms</br>GreenBeans</br>Cucumbers</td>
                    <td class="text-center">15-20</br>30-35</br>15-20</td>
                    <td>2-4</br>7-8</br>2-3</td>
                    <td>2-3</br>1-2</br>0.5</td>
                    <td>1</br>1</br>1</td>
                </tr>
                <tr>
                    <td>Sub Total</td>
                    <td></td>
                    <td class="text-center">75</td>
                    <td class="text-center">15</td>
                    <td class="text-center">5.5</td>
                    <td class="text-center">3</td>
                </tr>
                <tr>
                    <td>Snack</td>
                    <td>BabyCarrots</br>Radishes</br>CelerySticks</td>
                    <td class="text-center">30-35</br>15-20</br>10-15</td>
                    <td>7-8</br>2-3</br>2-3</td>
                    <td>0.6</br>0.7</br>0.7</td>
                    <td>1</br>1</br>1</td>
                </tr>
                <tr>
                    <td>Sub Total</td>
                    <td></td>
                    <td class="text-center">70</td>
                    <td class="text-center">14</td>
                    <td class="text-center">2.0</td>
                    <td class="text-center">3</td>
                </tr>
                <tr>
                    <td>Dinner</td>
                    <td>Dal</br>Roti</br>Chawal</td>
                    <td class="text-center">100-120</br>80-100</br>130-150</td>
                    <td>20-25</br>15-20</br>28-30</td>
                    <td>7-9</br>3-4</br>2-3</td>
                    <td>1-2</br>2-4</br>1</td>
                </tr>
                <tr>
                    <td>Sub Total</td>
                    <td></td>
                    <td class="text-center">370</td>
                    <td class="text-center">75</td>
                    <td class="text-center">16</td>
                    <td class="text-center">7</td>
                </tr>
            </tbody>';
}
?>