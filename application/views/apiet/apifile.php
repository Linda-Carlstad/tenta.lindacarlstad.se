<?php foreach ($tentor as $tenta) :  ?>
  <tr>

      <td><?php echo $tenta["id"]; ?></td>

      <td class="resultat">Resultat <span class="glyphicon glyphicon-eye-open"></span></td>

      <td><?php echo $tenta["namn"]; ?></td>

      <td><a href="uploads/<?php echo $tenta["namn"]; ?>" target="_blank">View</a></td>

      <td><a href="uploads/<?php echo $tenta["namn"]; ?>" download>Download</td>

  </tr>


<?php endforeach;?>
