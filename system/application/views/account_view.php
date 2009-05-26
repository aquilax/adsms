<?php
  $this->load->view('header_view');
  
  function show_table($arr, $if_none){
    if (count($arr) > 0){
      echo "<table>";
      echo "  <tr>";
      echo "    <th>".lang('Date')."</th>";
      echo "    <th>".lang('Sum')." ".lang('BGN')."</th>";
      echo "    <th>".lang('Count')."</th>";
      echo "  </tr>";
      foreach($arr as $row){
        echo "  <tr>";
        echo "    <td>".$row['tdate']."</td>";
        echo "    <td>".$row['tsum']." ".lang('BGN')."</td>";
        echo "    <td>".$row['cntr']."</td>";
        echo "  </tr>";
      }
      echo "</table>";
    } else {
      echo "<h4>$if_none</h4>";
    }
  }

  echo  sprintf('<h2>%s: %01.3f %s</h2>', lang('Available Sum'), $sum, lang('BGN'));
  echo "<h2>".lang('Payments')."</h2>";
  show_table($payments, lang('No payments'));
  echo "<h2>".lang('Impressions')."</h2>";
  show_table($transactions, lang('No Impressions'));
  $this->load->view('footer_view');
?>