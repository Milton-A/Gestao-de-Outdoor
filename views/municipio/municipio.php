
<?php foreach ($municipios as $com): 
    echo "<option value='" . $com->getIdMunicipio(). "'> ". $com->getNome() . "</option>";
 endforeach; ?>