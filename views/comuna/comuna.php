
<?php foreach ($comunas as $com):
  echo  " <option value='". $com->getIdComuna()."'>" . $com->getNomeComuna() ."</option>";
endforeach; ?>
